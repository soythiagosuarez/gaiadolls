/* ====== Hamburguesa (≤1019): overlay fullscreen y barras ↔ X ====== */
const header = document.getElementById('siteHeader');
const hamburger = document.getElementById('hamburger');
const menu = document.getElementById('main-menu');

if (hamburger && menu && header) {
  const icon = hamburger.querySelector('i');

  function toggleMenu() {
    const open = menu.classList.toggle('open');
    hamburger.setAttribute('aria-expanded', open ? 'true' : 'false');
    menu.setAttribute('aria-hidden', open ? 'false' : 'true');
    if (icon) { icon.classList.toggle('fa-bars', !open); icon.classList.toggle('fa-xmark', open); }
    header.classList.toggle('menu-open', open);
    document.body.style.overflow = open ? 'hidden' : '';
  }

  hamburger.addEventListener('click', toggleMenu);
  menu.querySelectorAll('a').forEach(a => a.addEventListener('click', () => {
    if (menu.classList.contains('open')) toggleMenu();
  }));
}

/* ====== Header: sólido en "Sobre nosotros", transparente->sólido en Home ====== */
(() => {
  const header = document.getElementById('siteHeader');

  /* ====== Header transparente -> sólido al hacer scroll 500px ====== */
  function applyHeaderState() {
    if (!header) return;

    // 👉 Si el header tiene data-force-solid, lo dejamos SIEMPRE sólido y salimos
    if (header.dataset.forceSolid === '1') {
      header.classList.add('header-solid');
      header.classList.remove('on-hero');
      return;
    }

    // Home (u otras páginas) con comportamiento normal
    if (window.scrollY >= 500) {
      header.classList.add('header-solid');
      header.classList.remove('on-hero');
    } else {
      header.classList.remove('header-solid');
      header.classList.add('on-hero');
    }
  }

  window.addEventListener('scroll', applyHeaderState, { passive: true });
  window.addEventListener('load', applyHeaderState);
  window.addEventListener('resize', applyHeaderState);
  applyHeaderState();
})();

/* ========= Carrusel Productos (infinito real, 1 clic) ========= */
(function () {
  const wrap = document.querySelector('.products-carousel');
  if (!wrap) return;

  const track = wrap.querySelector('.carousel-track');
  const prev = wrap.querySelector('.carousel-btn.prev');
  const next = wrap.querySelector('.carousel-btn.next');
  const cards = Array.from(track.querySelectorAll('.product-card'));
  if (!cards.length) return;

  let index = 0;           // índice del ítem alineado a la izquierda
  let gap = 16, cardW = 0, visible = 1, t;

  const measure = () => {
    const s = getComputedStyle(track);
    gap = parseInt(s.columnGap || s.gap || '16', 10) || 16;
    cardW = cards[0].getBoundingClientRect().width;
    // cuántos ítems entran completos en el ancho del carril
    visible = Math.max(1, Math.floor((track.clientWidth + gap) / (cardW + gap)));
  };

  const lastLeftIndex = () => Math.max(0, cards.length - visible);

  const snapTo = (i, behavior = 'smooth') => {
    index = Math.min(Math.max(0, i), lastLeftIndex()); // clamp a página válida
    track.scrollTo({ left: cards[index].offsetLeft, behavior });
  };

  // al soltar el scroll/drag, toma el ítem más a la izquierda visible
  const onScrollEnd = () => {
    const sl = track.scrollLeft + 1; // margen
    let leftMost = 0;
    for (let i = 0; i < cards.length; i++) {
      if (cards[i].offsetLeft <= sl) leftMost = i; else break;
    }
    index = Math.min(leftMost, lastLeftIndex());
  };

  const onScroll = () => { clearTimeout(t); t = setTimeout(onScrollEnd, 80); };

  // Botones con wrap inmediato
  prev.addEventListener('click', () => {
    measure();
    if (index <= 0) snapTo(lastLeftIndex()); else snapTo(index - 1);
  });
  next.addEventListener('click', () => {
    measure();
    if (index >= lastLeftIndex()) snapTo(0); else snapTo(index + 1);
  });

  // Teclado (cuando el carril tiene foco)
  track.addEventListener('keydown', e => {
    if (e.key === 'ArrowLeft') { e.preventDefault(); prev.click(); }
    if (e.key === 'ArrowRight') { e.preventDefault(); next.click(); }
  });

  track.addEventListener('scroll', onScroll);
  window.addEventListener('resize', () => { measure(); snapTo(index, 'auto'); });

  measure();
  snapTo(0, 'auto');
})();

/* ============ Carrusel: TAMAÑOS ============ */
(function () {
  const view = document.getElementById('sizesView');
  const rail = document.getElementById('sizesRail');
  if (!view || !rail) return;

  const prev = view.querySelector('.sizes-arrow.prev');
  const next = view.querySelector('.sizes-arrow.next');
  const total = rail.children.length;
  let index = 0;

  const perView = () => {
    const w = window.innerWidth;
    if (w <= 420) return 1;
    if (w <= 899) return 2;
    if (w <= 1019) return 3;
    return 5; // desktop (sin carrusel real)
  };

  const isSlider = () => window.innerWidth <= 1019;

  function updateArrows() {
    if (!isSlider()) {
      prev.setAttribute('disabled', '');
      next.setAttribute('disabled', '');
      return;
    }
    const max = Math.max(0, total - perView());
    prev.toggleAttribute('disabled', index === 0);
    next.toggleAttribute('disabled', index >= max);
  }

  function apply() {
    if (!isSlider()) {
      rail.style.setProperty('--x', '0%');
      index = 0;
      updateArrows();
      return;
    }
    const per = perView();
    const max = Math.max(0, total - per);
    index = Math.min(index, max);
    const shift = -(index * (100 / per));
    rail.style.setProperty('--x', shift + '%');
    updateArrows();
  }

  function go(dir) {
    if (!isSlider()) return;
    const per = perView();
    const max = Math.max(0, total - per);
    index = Math.min(Math.max(0, index + dir), max);  // paso de 1 en 1
    const shift = -(index * (100 / per));
    rail.style.setProperty('--x', shift + '%');
    updateArrows();
  }

  prev.addEventListener('click', () => go(-1));
  next.addEventListener('click', () => go(1));

  let rAF;
  window.addEventListener('resize', () => {
    cancelAnimationFrame(rAF);
    rAF = requestAnimationFrame(apply);
  });

  apply();
})();

// ================= FAQS (accordion con una abierta a la vez) =================
(function () {
  const items = document.querySelectorAll('.faq-item');

  function closeItem(it) {
    if (!it) return;
    it.classList.remove('open');
    const head = it.querySelector('.faq-head');
    const body = it.querySelector('.faq-body');
    if (head) head.setAttribute('aria-expanded', 'false');
    if (body) {
      body.style.maxHeight = 0;
    }
  }

  function openItem(it) {
    if (!it) return;
    it.classList.add('open');
    const head = it.querySelector('.faq-head');
    const body = it.querySelector('.faq-body');
    if (head) head.setAttribute('aria-expanded', 'true');
    if (body) {
      // altura exacta para animar
      body.style.maxHeight = body.scrollHeight + 'px';
    }
  }

  items.forEach((item) => {
    const btn = item.querySelector('.faq-head');
    const body = item.querySelector('.faq-body');

    // estado inicial seguro
    if (body) { body.style.maxHeight = 0; }

    btn.addEventListener('click', () => {
      const isOpen = item.classList.contains('open');

      // cerrar todos
      items.forEach(closeItem);

      // abrir el actual si estaba cerrado
      if (!isOpen) openItem(item);
    });

    // recalcular altura al redimensionar (si hay abierto)
    window.addEventListener('resize', () => {
      if (item.classList.contains('open') && body) {
        body.style.maxHeight = body.scrollHeight + 'px';
      }
    });
  });
})();

/* ===== SOBRE NOSOTROS ===== */

/* Counters al entrar en vista */
(() => {
  const box = document.getElementById('about-metrics');
  if (!box) return;

  const nums = box.querySelectorAll('.metric-num');

  const animate = (el) => {
    if (el.dataset.done) return;
    el.dataset.done = '1';

    const end = +el.dataset.target || 0;
    const dur = 1200;
    const start = performance.now();

    const tick = (t) => {
      const p = Math.min(1, (t - start) / dur);
      const val = Math.floor(p * end);
      el.textContent = val.toLocaleString('es-AR');
      if (p < 1) requestAnimationFrame(tick);
      else el.textContent = end.toLocaleString('es-AR');
    };
    requestAnimationFrame(tick);
  };

  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        nums.forEach(animate);
        io.disconnect();
      }
    });
  }, { threshold: 0.35 });

  io.observe(box);
})();

/* Team overlay en dispositivos táctiles (tap para mostrar/ocultar) */
(() => {
  const team = document.querySelector('.about-team');
  if (!team) return;

  const isTouch = matchMedia('(hover: none)').matches;
  if (!isTouch) return;

  team.querySelectorAll('.member').forEach(card => {
    card.addEventListener('click', () => {
      card.classList.toggle('show');
    }, { passive: true });
  });
})();

// Overlay en mobile por "tap"
document.querySelectorAll('.member').forEach(card => {
  card.addEventListener('click', () => card.classList.toggle('show'));
});

/* ================== PERSONALIZA TU DOLL (front) ================== */

// Fuerza header sólido aquí, sin romper el inicio
document.addEventListener('DOMContentLoaded', () => {
  if (document.body.classList.contains('form-page')) {
    const header = document.getElementById('siteHeader') || document.querySelector('.site-header');
    if (header) {
      header.classList.add('header-solid');
      header.classList.remove('on-hero');
    }
  }

  const form = document.getElementById('personalizaForm');
  if (!form) return;

  const msg = document.getElementById('formMsg');

  form.addEventListener('submit', (e) => {
    // Si hay campos inválidos, mostramos los errores nativos
    if (!form.checkValidity()) {
      e.preventDefault();
      // form.reportValidity();   // <- dispara los mensajes de cada campo
      return;
    }

    // Sin backend todavía: simulamos éxito
    // msg.textContent = '¡Gracias! Recibimos tu consulta.';
    // msg.className = 'form-msg ok';
    // msg.style.display = 'block';
  });

  // // (opcional) limitar caracteres del teléfono
  // const tel = document.getElementById('telefono');
  // if (tel) {
  //   tel.addEventListener('input', () => {
  //     tel.value = tel.value.replace(/[^\d+\s()-]/g, '');
  //   });
  // }
});

// ====== INICIO DE SESIÓN ======
document.addEventListener('DOMContentLoaded', () => {
  const loginForm = document.getElementById('loginForm');

  console.log("loginform ", loginForm);

  if (loginForm) {
    loginForm.addEventListener('submit', (e) => {
      if (!loginForm.checkValidity()) {
        e.preventDefault();
        loginForm.reportValidity();
        return;
      }
    });
  }

});

/* ===== Auth forms: toggle password + submit flow ===== */
document.addEventListener('DOMContentLoaded', () => {
  // --- Toggle mostrar/ocultar contraseña (sirve para cualquier .pw-toggle del sitio)
  document.querySelectorAll('.pw-toggle').forEach(btn => {
    btn.addEventListener('click', () => {
      const wrap = btn.closest('.field-wrap');
      if (!wrap) return;
      const input = wrap.querySelector('input[type="password"], input[type="text"]');
      if (!input) return;

      const showing = input.type === 'text';
      input.type = showing ? 'password' : 'text';
      btn.setAttribute('aria-pressed', String(!showing));
      btn.innerHTML = showing
        ? '<i class="fa-solid fa-eye-slash"></i>'
        : '<i class="fa-solid fa-eye"></i>';
      input.focus({ preventScroll: true });
    });
  });

  // --- Login & Signup: mostrar mensaje, limpiar y redirigir
  const authForms = ['loginForm', 'signupForm']
    .map(id => document.getElementById(id))
    .filter(Boolean);

  authForms.forEach(form => {
    // Busca mensaje dentro del form: #loginMsg / #formMsg / .form-msg
    const msg = form.querySelector('#loginMsg, #formMsg, .form-msg') ||
      document.getElementById(form.id === 'loginForm' ? 'loginMsg' : 'formMsg');
    if (form) {
      form.addEventListener('submit', (e) => {
        if (!form.checkValidity()) {
          e.preventDefault();
          form.reportValidity();
          return;
        }
        console.log()
      });
    }

  });
});

(function () {
  // Contenedor y links de filtros
  var cont = document.getElementById('filtros-categorias');
  if (!cont) return;
  var links = cont.querySelectorAll('.opcion-categoria-productos');
  if (!links.length) return;

  // Leer cat de la URL; si no hay, 'todos'
  var params = new URLSearchParams(window.location.search);
  var active = (params.get('cat') && params.get('cat').trim() !== '') ? params.get('cat') : 'todos';
  active = active.toLowerCase(); // normalizamos

  // Marcar como activo el que coincida con data-cat (también normalizado)
  links.forEach(function (a) {
    var val = (a.dataset.cat || '').toLowerCase();
    a.classList.toggle('is-active', val === active);
  });
})();
