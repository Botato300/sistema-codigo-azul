<!DOCTYPE html>
<html lang="es">

<head>
	<?php require_once("views/includes/head.php"); ?>

	<script defer src="assets/js/main.js"></script>

	<title>Inicio</title>
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
					

					<ul class="nav nav-pills">
						  <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
						  <li><a data-toggle="tab" href="#seccion">Zonas</a></li>
						  <li><a data-toggle="tab" href="#contacto">Enfermeros</a></li>
						<li><a data-toggle="tab" href="#contacto">Pacientes</a></li>
					</ul>
					</div>
				</div>
			</div>
		</nav>
	</header>

	<main role="main">
		<div class="container">
			<ol class="breadcrumb">
				<li><a href="login">Login</a></li>
				<li class="active">Inicio</li>
			</ol>

			<section>
				<article class="content_format row">
					<div class="col-md-8 col-md-offset-2">

						<h1>Sistema de gestion - Codigo Azul</h1>
						<div class="row">
							<div class="section-actions col-md-7 social-share">
							</div>
						</div>

						<div class="row numbers">

							<div class="col-md-2">
								<div class="h2 text-danger"><span id="count">1</span>
									<small>de 4</small>
								</div>
									<p class="lead">Quirofanos ocupados</p>
							</div>

							<div class="col-md-2">
								<div class="icons">
									<i class="fa fa-user-circle-o text-danger"></i>
									<p class="text-muted">Ariel Fernandez</p>
							</div>

							<div class="col-md-2">
									<i class="fa fa-user-circle-o"></i>
							</div>
							<div class="col-md-2">
									<i class="fa fa-user-circle-o"></i>
							</div>
							<div class="col-md-2">
									<i class="fa fa-user-circle-o"></i>
								</div>
							</div>
						</div>

						<div class="downloads">
							<hr>
							<h4>Descargas</h4>

							<div class="row row-flex">
								<div class="col-xs-12 col-sm-6">
									<p class="text-muted m-b-1">Descargar Reporte (3.3 Mb) </p>
									<a class="btn btn-primary btn-sm"><i class="fa fa-download"></i>&nbsp; PDF</a>
								</div>
								<div class="col-xs-12 col-sm-6">
									<p class="text-muted m-b-1">Descargar Reporte (3.3 Mb)</p>
									<a class="btn btn-primary btn-sm"><i class="fa fa-download"></i>&nbsp; CSV</a>
								</div>
							</div>
						</div>
					</div>

				</article>
			</section>
		</div>
	</main>

	<?php require_once("views/includes/footer.php"); ?>
</body>

</html>