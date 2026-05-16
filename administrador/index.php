<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Gaia Dolls — administrador</title>
  <link rel="shortcut icon" href="../img/favicon.png">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../estilos.css">
  <script defer src="script.js"></script>
</head>

<body class="admin-page">

  <!-- HEADER -->
  <header class="site-header header-solid" id="siteHeader" data-force-solid="1">
    <div class="header-container">
      <a class="logo" href="../index.php" aria-label="Gaia Dolls">
        <img src="../img/logo-gaia-dolls.png" alt="Gaia Dolls" />
      </a>

      <nav class="nav" aria-label="Principal">
        <button class="hamburger" id="hamburger" aria-controls="main-menu" aria-expanded="false">
          <i class="fa-solid fa-bars"></i>
        </button>
        <ul class="menu" id="main-menu">
          <li><a href="../index.php">Ir al sitio web</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <section class="form-administrador">
        <div class="form-admin-container">
            <header class="form-head-admin">
                <h1>Administrador de productos</h1>
                <p>En este formulario cargas los productos del sitio web</p>
            </header>

            <div class="form-card">
                <form id="administradorForm" action="cargar_productos.php" method="POST" enctype="multipart/form-data">
                    <div class="grid-3">
                      <div class="cell">
                        <input class="field" type="number" name="id" placeholder="id" class="form-control">
                      </div>

                      <div class="cell">
                        <input class="field" type="text" name="nombre" placeholder="Nombre" class="form-control">
                      </div>

                      <div class="cell">
                        <div class="select-wrap">
                          <select name="categoria" class="form-select" value="seleccionar categoria">
                            <option value="">Seleccionar categoria</option>
                            <option value="deportes">Deportes</option>
                            <option value="gaming">Gaming</option>
                            <option value="animales">Animales</option>
                            <option value="peliculas/series">Peliculas/series</option>
                            <option value=musica>Musica</option>
                          </select>
                        </div>
                      </div>

                      <div class="cell">
                        <div class="select-wrap">
                          <select name="tamanopersonaje" class="form-select">
                            <option value="">Seleccionar tamaño</option>
                            <option value="20/24CM">20/24CM</option>
                            <option value="18/20CM">18/20CM</option>
                            <option value="15/18CM">15/18CM</option>
                            <option value="15CM">15CM</option>
                            <option value="9/10CM">9/10CM</option>
                          </select>
                        </div>
                      </div>

                      <div class="cell">
                        <input class="field" type="number" name="precio" placeholder="Precio" class="form-control">
                      </div>

                      <div class="cell">
                      <input class="field" type="file" name="imagen" class="form-control">
                      </div>

                      <div class="actions">
                        <input class="btn" type="submit" value="Cargar productos" class="btn btn-warning">
                      </div>
                    </div>
                </form>
                <?php
                if(isset($_GET['ok_carga'])) {
                    echo '<p>Producto cargado</p>';
                }
                if(isset($_GET['error_formato'])) {
                    echo "<p>La imagen tiene que ser .jpg, .gif o .png</p>";
                }
                if(isset($_GET['error_peso'])) {
                    echo "<p>La imagen no puede superar los 195KB</p>";
                }
                ?>
            </div>
        </div>
    </section>
  </main>

</body>
</html>