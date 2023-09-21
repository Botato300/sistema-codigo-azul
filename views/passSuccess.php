<!DOCTYPE html>
<html lang="es">

<head>
   <?php require_once("includes/head.php"); ?>

   <script defer src="assets/js/passSuccess.js"></script>

   <title>Contraseña enviada</title>
</head>

<body>
   <header>
      <nav class="navbar navbar-top navbar-default bg-celeste-argentina">
         <div class="container">
            <div>
               <div class="navbar-header">
                  <a class="navbar-brand" href="/sistema-codigo-azul">
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
            <div class="row">
               <div class="col-md-6 col-md-offset-3">
                  <h4 class="activities-sidbar">Revisá tu correo electrónico</h4>
                  <p>Te va a llegar un correo electrónico a <b id="email"></b> con instrucciones para poder recuperar
                     tu contraseña.</p>
               </div>
            </div>

            <div class="row  m-t-3 m-b-3">
               <div class="col-md-6 col-md-offset-3">

                  <div class="row">
                     <div class="col-xs-12">
                        <a href="ingreso" class="btn btn-link">VOLVER A INICIO</a>
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