<!DOCTYPE html>
<html lang="es">

<head>
	<?php require_once("views/includes/head.php"); ?>

	<script defer src="assets/js/index.js"></script>

	<title>Inicio</title>
</head>

<body>
	<header>
		<nav class="navbar navbar-top navbar-default bg-celeste-argentina">
			<div class="container">
				<div>
					<div class="navbar-header">
						<a class="navbar-brand" href="/sistema-codigo-azul">
							<img alt="Logo de la pagina web" src="/sistema-codigo-azul/assets/images/logo.webp" height="50">
						</a>
					</div>

					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#home">Home</a></li>
						<li><a data-toggle="tab" href="#seccion">Zonas</a></li>
						<li><a data-toggle="tab" href="#contacto">Enfermeros</a></li>
						<li><a data-toggle="tab" href="#contacto">Pacientes</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>

	<main>
		<div class="container">
			<ol class="breadcrumb">
				<li><a href="ingreso">Login</a></li>
				<li class="active">Inicio</li>
			</ol>

			<article class="content_format row">
				<div class="col-md-8 col-md-offset-2">
					<h1>Sistema de gestion - Codigo Azul</h1>
					<div class="section-actions col-md-7 social-share"></div>

					<div class="row numbers">
						<div class="col-md-6">
							<div class="h2 text-danger">
								<span id="count">0</span>
								<small>de 4</small>
							</div>
							<p class="lead">Quirofanos ocupados</p>
						</div>

						<div id="rooms__container" class="col-md-4"></div>
					</div>

					<hr>

					<div class="text-center downloads">
						<h4>Descargas</h4>

						<div class="row row-flex" id="downloads__container">
							<div class=" col-xs-12 col-sm-6">
								<p class="text-muted m-b-1">Descargar Reporte (3.3 MB) </p>
								<button data-filetype="pdf" class="btn btn-primary btn-sm"><i class="fa fa-download"></i>&nbsp; PDF</button>
							</div>
<<<<<<< HEAD

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
=======
							<div class="col-xs-12 col-sm-6">
								<p class="text-muted m-b-1">Descargar Reporte (3.3 MB)</p>
								<button data-filetype="csv" class="btn btn-primary btn-sm"><i class="fa fa-download"></i>&nbsp; CSV</button>
>>>>>>> bd22287d4bce19c14c8889d1bfec1dad60eb7f23
							</div>
						</div>
					</div>
			</article>
		</div>
	</main>

	<?php require_once("views/includes/footer.php"); ?>
</body>

</html>