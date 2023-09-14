<!DOCTYPE html>
<html lang="es">

<head>
	<?php require_once("head.php") ?>;

	<script defer src="assets/js/main.js"></script>

	<title>Inicio</title>
</head>

<body>
	<header>
		<nav class="navbar navbar-top navbar-default bg-celeste-argentina" role="navigation">
			<div class="container">
				<div>
					<div class="navbar-header">
						<a class="navbar-brand" href="index.html" aria-label="Argentina.gob.ar Presidencia de la Nación">
							<img alt="" src="assets/images/logo.webp" height="50">
						</a>
						<a class="btn btn-mi-argentina btn-login visible-xs" href="index.html">
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
						<hr>

						<div class="row numbers">
							<div class="col-md-8">
								<div class="h2 text-danger">1
									<small>de 4</small>
								</div>
								<p class="lead">Quirofanos ocupados</p>
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

	<?php require_once("includes/footer.php"); ?>
</body>

</html>