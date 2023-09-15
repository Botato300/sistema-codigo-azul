<!DOCTYPE html>
<html lang="es">

<head>
	<?php require_once("includes/head.php"); ?>

	<script defer src="assets/js/login.js"></script>

	<title>Iniciar Sesion</title>
</head>

<body>
	<header>
		<nav class="navbar navbar-top navbar-default bg-celeste-argentina">
			<div class="container">
				<div>
					<div class="navbar-header">
						<a class="navbar-brand" href="index.php" aria-label="Argentina.gob.ar Presidencia de la Nación">
							<img alt="Logo de la pagina web" src="assets/images/logo.webp" height="50">
						</a>
					</div>
					<div class="nav navbar-nav navbar-right hidden-xs">
						<a href="#" class="btn btn-mi-argentina visible-xs">
							<i class="fa fa-times"></i>
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
						<h4 class="activities-sidbar">Sistema de Gestion de Codigo Azul</h4>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div id="errorContainer" aria-live="polite" class="alert alert-danger hidden">
							<h5>Se ha producido el siguiente error:</h5>
							<ul id="errorList"></ul>
						</div>

						<form method="post">
							<div class="row">
								<div class="col-md-10 form-group item-form">
									<label for="username">Usuario</label>
									<input type="text" id="username" name="username" class="form-control" required="" aria-required="true">
									<p class="help-block error hidden">Ingresá tu usuario</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-10 form-group item-form">
									<label for="password">Contraseña</label>
									<input id="password" type="password" class="form-control" name="password">
									<p class="help-block error">Ingresá tu contraseña</p>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<button type="button" id="btnSubmit" class="btn btn-success">INGRESAR</button>
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
								<p><a href="#">Recuperar mi contraseña</a></p>
								<p><a href="#">Crear una nueva cuenta para ingresar</a></p>
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