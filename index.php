<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Gaia Dolls — Inicio</title>
  <link rel="shortcut icon" href="img/favicon.png">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./estilos.css">
  <script defer src="script.js"></script>
</head>
<body>

  <!-- HEADER -->
  <header class="site-header" id="siteHeader">
    <div class="header-container">
      <a class="logo" href="index.php" aria-label="Gaia Dolls">
        <img src="img/logo-gaia-dolls.png" alt="Gaia Dolls" />
      </a>

      <nav class="nav" aria-label="Principal">
        <button class="hamburger" id="hamburger" aria-controls="main-menu" aria-expanded="false">
          <i class="fa-solid fa-bars"></i>
        </button>
        <ul class="menu" id="main-menu">
          <li><a href="index.php" class="active" aria-current="page">Inicio</a></li>
          <li><a href="productos.php">Productos</a></li>
          <li><a href="sobrenosotros.php">Sobre nosotras</a></li>
          <li><a href="personaliza.php">Personalizar tu doll</a></li>
          <?php if(isset($_SESSION['clientes'])) { ?>
            <a href="componentes/salir.php">Cerrar sesión</a>
          <?php } else { ?>
            <a class="login" href="ingreso.php">Inicia sesión o registrate</a>
          <?php } ?>
        </ul>
      </nav>
    </div>
  </header>

  <main>

    <!-- HERO (full-bleed con copy inferior) -->
    <section class="section-hero">
      <div class="section-container-hero">
        <div class="hero-box" style="background-image:url('img/hero-banner.png');">
          <div class="hero-bottom">
            <h1 class="hero-title">Muñecos de crochet hechos a mano</h1>
            <p class="hero-text">Personalizamos a tu personaje favorito con hilos suaves, mucho detalle y amor.</p>
            <div class="hero-cta">
              <a class="btn btn-primary" href="personaliza.php">Personaliza tu doll</a>
              <a class="btn btn-secondary" href="productos.php">Ver productos</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Trigger para pintar el header cuando pasás el hero -->
    <div id="after-hero-trigger" aria-hidden="true"></div>

    <!-- CATEGORÍAS -->
    <section class="section-categories" id="categorias">
      <div class="section-container-categories">
        <h2 class="section-title">Categorías</h2>

        <div class="categories-grid">
          <a class="cat-card" href="#">
            <figure class="thumb">
              <img src="img/categoria-deportes.png" alt="Deportes">
            </figure>
            <h3>Deportes</h3>
          </a>

          <a class="cat-card" href="#">
            <figure class="thumb">
              <img src="img/categoria-gaming.png" alt="Gaming">
            </figure>
            <h3>Gaming</h3>
          </a>

          <a class="cat-card" href="#">
            <figure class="thumb">
              <img src="img/categoria-animales.png" alt="Animales">
            </figure>
            <h3>Animales</h3>
          </a>

          <a class="cat-card" href="#">
            <figure class="thumb">
              <img src="img/categoria-peliseries.png" alt="Películas y series">
            </figure>
            <h3>Películas/series</h3>
          </a>

          <a class="cat-card" href="#">
            <figure class="thumb">
              <img src="img/categoria-musica.png" alt="Música">
            </figure>
            <h3>Música</h3>
          </a>
        </div>
      </div>
    </section>

    <!-- ABOUT / Breve historia de la marca -->
    <section class="section-about" id="about">
      <div class="section-container-about">
        <div class="about-media">
          <!-- Reemplazar por tu imagen final -->
          <img class="about-photo" src="img/taller.png" alt="Breve historia de Gaia Dolls">
        </div>

        <div class="about-content">
          <h2 class="section-title">Hecho a mano, con amor</h2>
          <p>
            Nacimos tejiendo para amistades y familia. La pasión por el amigurumi,
            los hilos suaves y el detalle nos llevó a crear <strong>Gaia Dolls</strong>:
            piezas hechas a mano que capturan a tus personajes favoritos con mucho amor.
          </p>
          <ul class="about-list">
            <li>Personalización total</li>
            <li>Materiales de calidad</li>
            <li>Ideal para regalar</li>
          </ul>
        </div>
      </div>
    </section>

    <!-- PRODUCTOS PRINCIPALES -->
    <section class="section-products" id="productos">
      <div class="section-container-products">
        <h2 class="section-title">Productos principales</h2>

        <div class="products-carousel">
          <button class="carousel-btn prev" aria-label="Ver anterior">
            <i class="fa-solid fa-chevron-left"></i>
          </button>

          <div class="carousel-track" tabindex="0">
            <!-- 8 ítems: imagen cuadrada + título + precio + CTA -->
            <article class="product-card">
              <div class="product-thumb">
                <img src="img/prod-01.png" alt="Nombre de producto 01">
              </div>
              <h3 class="product-title">El ninja blanco</h3>
              <p class="product-price">$23.000</p>
              <a href="productos.php" class="btn-buy">Comprar</a>
            </article>

            <article class="product-card">
              <div class="product-thumb">
                <img src="img/prod-02.png" alt="Nombre de producto 02">
              </div>
              <h3 class="product-title">Anakin Skywalker</h3>
              <p class="product-price">$40.000</p>
              <a href="productos.php" class="btn-buy">Comprar</a>
            </article>

            <article class="product-card">
              <div class="product-thumb">
                <img src="img/prod-03.png" alt="Nombre de producto 03">
              </div>
              <h3 class="product-title">Franco Colapinto</h3>
              <p class="product-price">$18.000</p>
              <a href="productos.php" class="btn-buy">Comprar</a>
            </article>

            <article class="product-card">
              <div class="product-thumb">
                <img src="img/prod-04.png" alt="Nombre de producto 04">
              </div>
              <h3 class="product-title">El brujo animado</h3>
              <p class="product-price">$25.000</p>
              <a href="productos.php" class="btn-buy">Comprar</a>
            </article>

            <article class="product-card">
              <div class="product-thumb">
                <img src="img/prod-05.png" alt="Nombre de producto 05">
              </div>
              <h3 class="product-title">El eternauta</h3>
              <p class="product-price">$25.000</p>
              <a href="productos.php" class="btn-buy">Comprar</a>
            </article>

            <article class="product-card">
              <div class="product-thumb">
                <img src="img/prod-06.png" alt="Nombre de producto 06">
              </div>
              <h3 class="product-title">Ninja girl</h3>
              <p class="product-price">$15.000</p>
              <a href="productos.php" class="btn-buy">Comprar</a>
            </article>

            <article class="product-card">
              <div class="product-thumb">
                <img src="img/prod-07.png" alt="Nombre de producto 07">
              </div>
              <h3 class="product-title">Paul McCartney</h3>
              <p class="product-price">$23.000</p>
              <a href="productos.php" class="btn-buy">Comprar</a>
            </article>

            <article class="product-card">
              <div class="product-thumb">
                <img src="img/prod-08.png" alt="Nombre de producto 08">
              </div>
              <h3 class="product-title">Stich</h3>
              <p class="product-price">$22.000</p>
              <a href="productos.php" class="btn-buy">Comprar</a>
            </article>
          </div>

          <button class="carousel-btn next" aria-label="Ver siguiente">
            <i class="fa-solid fa-chevron-right"></i>
          </button>
        </div>
      </div>
    </section>

    <!-- ¿CÓMO LO HACEMOS? -->
    <section class="section-how" id="como-lo-hacemos">
      <div class="section-container-how">
        <h2 class="section-title">¿Cómo lo hacemos?</h2>

        <div class="how-grid">
        <!-- 1) Diseño -->
          <article class="how-card">
            <div class="how-icon" aria-hidden="true">
              <i class="fa-solid fa-pen-ruler"></i>
            </div>
            <h3 class="how-title">Diseño</h3>
            <p class="how-text">
              Tomamos tus referencias y bocetamos el look del personaje.
            </p>
          </article>

          <!-- 2) Materiales -->
          <article class="how-card">
            <div class="how-icon" aria-hidden="true">
              <i class="fa-solid fa-cubes"></i>
            </div>
            <h3 class="how-title">Materiales</h3>
            <p class="how-text">
              Hilados suaves, colores fieles y relleno hipoalergénico.
            </p>
          </article>

          <!-- 3) Tiempos y entrega -->
          <article class="how-card">
            <div class="how-icon" aria-hidden="true">
              <i class="fa-solid fa-truck"></i>
            </div>
            <h3 class="how-title">Tiempos y entrega</h3>
            <p class="how-text">
              Producción entre 7 y 15 días. Envíos a todo el país.
            </p>
          </article>
        </div>
      </div>
    </section>

    <!-- ============== TAMAÑOS ============== -->
    <section id="sizes" class="section-sizes">
      <div class="section-container-sizes">
        <h2 class="section-title">Tamaños</h2>
    
        <div class="sizes-view" id="sizesView">
          <button class="sizes-arrow prev" aria-label="Anterior" disabled>
            <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
          </button>
    
          <div class="sizes-rail" id="sizesRail">
            <!-- XL -->
            <article class="size-card size-xl">
              <img src="img/size-xl.png" alt="Muñeco 20/24 cm">
              <p class="size-caption">20/24CM</p>
            </article>
            <!-- LG -->
            <article class="size-card size-lg">
              <img src="img/size-lg.png" alt="Muñeco 18/20 cm">
              <p class="size-caption">18/20CM</p>
            </article>
            <!-- MD -->
            <article class="size-card size-md">
              <img src="img/size-md.png" alt="Muñeco 15/18 cm">
              <p class="size-caption">15/18CM</p>
            </article>
            <!-- SM -->
            <article class="size-card size-sm">
              <img src="img/size-sm.png" alt="Muñeco 15 cm">
              <p class="size-caption">15CM</p>
            </article>
            <!-- XS -->
            <article class="size-card size-xs">
              <img src="img/size-xs.png" alt="Muñeco 9/10 cm">
              <p class="size-caption">9/10CM</p>
            </article>
          </div>
    
          <button class="sizes-arrow next" aria-label="Siguiente">
            <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
          </button>
        </div>
      </div>
    </section>
    
    <!-- ================== SCOPE / QUE HAGO Y QUE NO ================== -->
    <section id="scope" class="section-scope">
      <div class="section-container-scope scope-grid">

        <!-- Bloque: Qué NO hago -->
        <div class="scope-block">
          <h2 class="scope-heading">
            ¿Qué <span class="scope-accent">NO</span> hago?
          </h2>
          <article class="scope-card is-no">
            <ul class="scope-list">
              <li><span class="scope-icon"><i class="fa-solid fa-xmark"></i></span><span>Souvenirs</span></li>
              <li><span class="scope-icon"><i class="fa-solid fa-xmark"></i></span><span>Ajuares para bebés</span></li>
              <li><span class="scope-icon"><i class="fa-solid fa-xmark"></i></span><span>Prendas</span></li>
              <li><span class="scope-icon"><i class="fa-solid fa-xmark"></i></span><span>Personalizados de personas (novios, abuelas, etc)</span></li>
              <li><span class="scope-icon"><i class="fa-solid fa-xmark"></i></span><span>Modelos sacados “a ojo” de otros diseñadores</span></li>
              <li><span class="scope-icon"><i class="fa-solid fa-xmark"></i></span><span>Eróticos</span></li>
            </ul>
          </article>
        </div>
    
        <!-- Bloque: Qué hago -->
        <div class="scope-block">
          <h2 class="scope-heading">¿Qué hago?</h2>
          <article class="scope-card is-yes">
            <ul class="scope-list">
              <li><span class="scope-icon"><i class="fa-solid fa-check"></i></span><span>Fan Art de series, películas, cómics, cartoons, etc.</span></li>
              <li><span class="scope-icon"><i class="fa-solid fa-check"></i></span><span>Personajes de animé, manga e ilustraciones</span></li>
              <li><span class="scope-icon"><i class="fa-solid fa-check"></i></span><span>Fandom de videojuegos</span></li>
              <li><span class="scope-icon"><i class="fa-solid fa-check"></i></span><span>Animales en general</span></li>
              <li><span class="scope-icon"><i class="fa-solid fa-check"></i></span><span>Muñecas</span></li>
              <li><span class="scope-icon"><i class="fa-solid fa-check"></i></span><span>Personalizados de mascotas</span></li>
            </ul>
          </article>
        </div>
    
      </div>
    </section>
    
    <!-- ================== COMO LO HACEMOS ================== -->
    <section id="steps" class="section-steps">
      <div class="section-container-steps">
        <h2>¿Cómo lo hacemos?</h2>
    
        <ol class="steps">
          <li class="step">
            <span class="step-badge">1</span>
            <h3>Contanos tu idea</h3>
            <p>
              Completá el formulario de la sección de “personaliza tu doll” en nuestra web con todos los
              detalles: tamaño, colores y características del personaje o diseño que quieras. Coordinamos
              juntos los detalles y un presupuesto aproximado.
            </p>
          </li>
    
          <li class="step">
            <span class="step-badge">2</span>
            <h3>Reservá tu lugar</h3>
            <p>
              Para comenzar necesitamos una seña del 50% del valor total. Este paso asegura tu lugar en la
              agenda y nos permite agendar tu pedido. (No se inician pedidos sin seña).
            </p>
          </li>
    
          <li class="step">
            <span class="step-badge">3</span>
            <h3>Producción personalizada</h3>
            <p>
              Cada doll se realiza de manera 100% artesanal. El tiempo de entrega depende de la cantidad de
              pedidos en curso, por eso recomendamos anticipar tu pedido con al menos 1 mes de anticipación.
            </p>
          </li>
    
          <li class="step">
            <span class="step-badge">4</span>
            <h3>Recibí tu pedido</h3>
            <p>
              Coordinamos el método de entrega: motomensajería, Correo Argentino, envío a domicilio o retiro
              por nuestro taller en Saavedra, CABA. Siempre te mantendremos informado en caso de cualquier demora.
            </p>
          </li>
        </ol>
    
        <div class="steps-cta">
          <a class="btn btn-primary" href="personaliza.php">Personalizá tu doll</a>
        </div>
      </div>
    </section>

    <!-- ================== FAQS ================== -->
    <section class="section-faqs" id="faqs">
      <div class="section-container-faqs">
        <h2>Preguntas frecuentes</h2>
    
        <div class="faqs-list" role="tablist" aria-label="Preguntas frecuentes">
          <!-- FAQ 1 -->
          <article class="faq-item">
            <button class="faq-head" aria-expanded="false">
              <span class="faq-icon" aria-hidden="true">
                <i class="fa-solid fa-chevron-down"></i>
              </span>
              <span class="faq-q">¿Cuánto tarda un pedido?</span>
            </button>
            <div class="faq-body" role="region">
              <p>
                La producción suele demorar entre 7 y 15 días, según la complejidad
                del personaje y la agenda activa. Te avisamos el estado en cada
                etapa.
              </p>
              <a href="personaliza.php" class="faq-cta">
                Personaliza tu doll <i class="fa-solid fa-arrow-right-long"></i>
              </a>
            </div>
          </article>
    
          <!-- FAQ 2 -->
          <article class="faq-item">
            <button class="faq-head" aria-expanded="false">
              <span class="faq-icon" aria-hidden="true">
                <i class="fa-solid fa-chevron-down"></i>
              </span>
              <span class="faq-q">¿Hacen envíos?</span>
            </button>
            <div class="faq-body" role="region">
              <p>
                Sí. Enviamos a todo el país por motomensajería o correo. También
                podés retirar por nuestro taller en Saavedra, CABA.
              </p>
              <a href="personaliza.php" class="faq-cta">
                Personaliza tu doll <i class="fa-solid fa-arrow-right-long"></i>
              </a>
            </div>
          </article>
    
          <!-- FAQ 3 -->
          <article class="faq-item">
            <button class="faq-head" aria-expanded="false">
              <span class="faq-icon" aria-hidden="true">
                <i class="fa-solid fa-chevron-down"></i>
              </span>
              <span class="faq-q">¿Cómo se paga?</span>
            </button>
            <div class="faq-body" role="region">
              <p>
                Trabajamos con un 50% de seña para reservar y el 50% restante al
                entregar. Aceptamos transferencia, efectivo y billeteras virtuales.
              </p>
              <a href="personaliza.php" class="faq-cta">
                Personaliza tu doll <i class="fa-solid fa-arrow-right-long"></i>
              </a>
            </div>
          </article>
    
          <!-- FAQ 4 -->
          <article class="faq-item">
            <button class="faq-head" aria-expanded="false">
              <span class="faq-icon" aria-hidden="true">
                <i class="fa-solid fa-chevron-down"></i>
              </span>
              <span class="faq-q">¿Puedo pedir cambios?</span>
            </button>
            <div class="faq-body" role="region">
              <p>
                Claro. Durante el proceso te compartimos avances para ajustar
                detalles (colores, accesorios, etc.) antes del cierre de la pieza.
              </p>
              <a href="personaliza.php" class="faq-cta">
                Personaliza tu doll <i class="fa-solid fa-arrow-right-long"></i>
              </a>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- ================== BANNER PROMOCIONAL ================== -->
    <section class="section-banner">
      <div class="section-container-banner">
        <div class="promo-banner">
          <h2 class="promo-title">¿Listx para tejer tu idea?</h2>
          <p class="promo-sub">Escribinos con tu personaje y tamaño, ¡y te cotizamos!</p>
          <a href="personaliza.php" class="btn btn-primary promo-cta">Personaliza tu doll ahora</a>
        </div>
      </div>
    </section>

  </main>

  <!-- ================== FOOTER ================== -->
  <section class="site-footer" id="footer">
    <div class="footer-container">

      <!-- fila superior -->
      <div class="footer-top">
        <a class="footer-logo" href="./index.php" aria-label="Gaia Dolls">
          <img src="img/logo-footer.png" alt="gaiadolls – muñecos de colección" />
        </a>
  
        <nav class="footer-nav" aria-label="Footer">
          <a href="./index.php">Inicio</a>
          <a href="./productos.php">Productos</a>
          <a href="./sobrenosotros.php">Sobre nosotros</a>
          <a href="./personaliza.php">Personalizar tu doll</a>
        </nav>
  
        <div class="footer-social">
          <span class="footer-social-label">Seguinos en</span>
          <div class="redes">
            <a class="social-ico" href="https://instagram.com" aria-label="Instagram">
              <i class="fa-brands fa-instagram"></i>
            </a>
            <a class="social-ico" href="https://tiktok.com" aria-label="TikTok">
              <i class="fa-brands fa-tiktok"></i>
            </a>
          </div>
        </div>
      </div>
  
      <hr class="footer-divider"/>
  
      <!-- fila inferior -->
      <div class="footer-bottom">
        <div class="footer-contact">
          <a href="mailto:contact@gaiadolls.com" class="footer-mail">
            <i class="fa-regular fa-envelope"></i>
            contact@gaiadolls.com
          </a>
          <a href="https://wa.me/5491133948693" class="footer-phone">
            <i class="fa-solid fa-phone"></i>
            +54 9 11 3394-8693
          </a>
        </div>
  
        <p class="footer-copy">
          © 2024 Gaia Dolls. Todos los derechos de copyright reservados.
        </p>
      </div>
  
    </div>
  </section>

</body>
</html>