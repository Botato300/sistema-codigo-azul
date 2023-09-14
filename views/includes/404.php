<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("head.php"); ?>
    <title>Document</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-top navbar-default bg-celeste-argentina" role="navigation">
            <div class="container">
                <div>
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php" aria-label="Argentina.gob.ar Presidencia de la Nación">
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

    <main role="main">
        <div class="container">
            <h1>No se encontró la pagina.</h1>
        </div>
    </main>

    <?php require_once("footer.php"); ?>
</body>

</html>