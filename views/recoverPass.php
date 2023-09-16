<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("includes/head.php"); ?>

    <script defer src="assets/js/recoveryPass.js"></script>

    <title>Recuperar Contraseña</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-top navbar-default bg-celeste-argentina">
            <div class="container">
                <div>
                    <div class="navbar-header">
                        <a class="navbar-brand" href="">
                            <img alt="Logo de la pagina web" src="assets/images/logo.webp" height="50">
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section>
            <div class="container">
                <div class="row m-b-2">
                    <div class="col-md-6 col-md-offset-3">
                        <h4 class="activities-sidbar">Recuperá tu contraseña</h4>
                        <p>Ingresando tu correo electrónico registrado vas a poder recuperar tu contraseña.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div id="errores" aria-live="polite" class="alert alert-danger hidden">
                            <h5>Se han producido los siguientes errores:</h5>
                            <ol>
                                <li>Ingresá tu correo electrónico</li>

                            </ol>
                        </div>
                        <form action="getPass.php" method="post">
                            <div class="row">
                                <div class="col-md-10 form-group item-form">
                                    <label for="email">Correo electrónico</label>
                                    <input type="email" name="txtcorreo" placeholder="Ingresá tu correo electrónico" class="form-control" id="email" aria-required="true">
                                    <p class="help-block error hidden">Ingresá un correo electrónico <br> El correo
                                        electrónico tiene un formato no válido</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3">
                                    <button type="button" value="Enviar" class="btn btn-success" onclick="javascript: return confirm('¿Deseas enviar tu contraseña a tu correo?');">ENVIAR</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-10">
                                    <hr>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col-xs-12">
                                <p><a href="ingreso">Volver al Inicio</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php require_once("includes/footer.php"); ?>
</body>

</html>