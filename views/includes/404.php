<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("head.php"); ?>
    <title>Pagina no encontrada</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-top navbar-default bg-celeste-argentina">
            <div class="container">
                <div>
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php">
                            <img alt="" src="assets/images/logo.webp" height="50">
                        </a>
                        <a class="btn btn-mi-argentina btn-login visible-xs" href="index.php">
                            <i class="icono-arg-mi-argentina fa-fw"></i>
                        </a>
                        <a class="btn bg-white btn-login visible-xs" href="#" onclick="$('.navbar.navbar-top').addClass('state-search');">
                            <span class="fa fa-search fa-fw"></span>
                        </a>
                    </div>
                    <div class="nav navbar-nav navbar-right hidden-xs">
                        <a href="#" onclick="$('.navbar.navbar-top').removeClass('state-search');" class="btn btn-mi-argentina visible-xs">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="main__container">
        <div class="main__content">
            <h1>No se encontró la pagina.</h1>
            <a href="index" class="btn btn-primary">Ir al Inicio</a>
        </div>
    </main>

    <?php require_once("footer.php"); ?>
</body>

</html>