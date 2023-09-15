<!DOCTYPE html>
<html lang="es">

<head>
	<?php require_once("includes/head.php"); ?>

	<script defer src="assets/js/login.js"></script>

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
                    <p>Con tu correo electrónico vas a poder recuperar tu contraseña</p>
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
                    <form method="post">
                        <div class="row">
                            <div class="col-md-10 form-group item-form">
                                <label for="email">Ingresá tu correo electrónico</label>
                                <input type="email" name="txtcorreo" class="form-control" id="email" required=""
                                    aria-required="true">
                                    <p class="help-block error hidden">Ingresá un correo electrónico <br> El correo
                                    electrónico tiene un formato no válido</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <button type="button" class="btn btn-success">ENVIAR</button>
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
                            <p><a href="login">Volver al Inicio</a></p>
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