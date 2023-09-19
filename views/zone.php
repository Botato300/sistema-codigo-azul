<!DOCTYPE html>
<html lang="es">

<head>
   <?php require_once("includes/head.php"); ?>

   <script defer type="module" src="assets/js/zonas.js"></script>

   <title>Zonas</title>
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
                  <li><a data-toggle="tab" href="/sistema-codigo-azul">Home</a></li>
                  <li class="active"><a data-toggle="tab" href="zonas">Zonas</a></li>
                  <li><a data-toggle="tab" href="enfermeros">Enfermeros</a></li>
                  <li><a data-toggle="tab" href="pacientes">Pacientes</a></li>
               </ul>
            </div>
         </div>
      </nav>
   </header>

   <dialog id="dialog" class="dialog">
      <section>
         <div class="row">
            <button id="btnclose" class="btnclose"><i class="fa fa-close text-danger"></i></button>

            <div class="col-md-8 col-md-offset-2">
               <h1>Cargar Zonas</h1>
               <hr>
               <form onsubmit="return false;">
                  <fieldset>
                     <legend>
                        <h3>Datos de la zona</h3>
                     </legend>
                     <div class="row">
                        <div class="col-md-6 form-group item-form">
                           <label for="zone">Numero de Zona</label>
                           <input type="number" class="form-control" id="zoneNumber" required aria-required="true"
                              max="10" min="1">
                           <p class="help-block error hidden">
                              Ingresá el numero
                              <br>
                              El numero tiene un formato no válido
                           </p>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-8 form-group item-form">
                           <label for="nombre">Nombre de la zona</label>
                           <input type="text" class="form-control uppercase" id="nombre" required aria-required="true"
                              maxlength="1">
                           <p class="help-block error hidden">Ingresá un nombre valido</p>
                        </div>
                     </div>
                     <button type="submit" id="btnSubmit" class="btn btn-success">Cargar Zona</button>
                  </fieldset>
               </form>
            </div>
         </div>
      </section>
   </dialog>

   <dialog id="modifyDialog" class="dialog">
      <section>
         <div class="row">
            <button id="btnclose2" class="btnclose"><i class="fa fa-close text-danger"></i></button>

            <div class="col-md-8 col-md-offset-2">
               <h1>Modificar Zona</h1>
               <hr>
               <form onsubmit="return false;">
                  <fieldset>
                     <legend>
                        <h3>Datos de la zona</h3>
                     </legend>
                     <div class="row">
                        <div class="col-md-6 form-group item-form">
                           <label for="zone">Numero de Zona</label>
                           <input type="number" class="form-control" id="zoneNumber2" required aria-required="true"
                              max="10" min="1">
                           <p class="help-block error hidden">
                              Ingresá el numero
                              <br>
                              El numero tiene un formato no válido
                           </p>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-8 form-group item-form">
                           <label for="nombre">Nombre de la zona</label>
                           <input type="text" class="form-control uppercase" id="zoneName" required aria-required="true"
                              maxlength="1">
                           <p class="help-block error hidden">Ingresá un nombre valido</p>
                        </div>
                     </div>
                     <button type="submit" id="btnSubmit2" class="btn btn-success">Cargar Zona</button>
                  </fieldset>
               </form>
            </div>
         </div>
      </section>
   </dialog>

   <main>
      <div class="container">
         <ol class="breadcrumb">
            <li><a href="ingreso">Login</a></li>
            <li class="active">Zonas</li>
         </ol>

         <section>
            <h1>Zonas</h1>

            <hr>
            <div class="row">
               <div class="col-md-12">

                  <div class="row">
                     <div class="col-sm-12 col-lg-6" id="ponchoTableSearchCont">
                        <div class="form-group">
                           <label for="ponchoTableSearch">Buscá por numero de zona</label>
                           <input class="form-control" id="searchBar" type="text">
                        </div>
                     </div>
                     <div class="col-sm-12 col-lg-6">
                        <button type="button" id="btnCreate" class="btn btn-primary newbutton bg-success"><i
                              class="fa fa-plus"></i>
                           Crear</button>
                     </div>
                  </div>
                  <table class="table" id="tableFiltro">
                     <thead>
                        <th>Numero de zona</th>
                        <th>Nombre de zona</th>
                     </thead>
                     <tbody id="dataTable"></tbody>
                  </table>
               </div>
   </main>

   <?php require_once("includes/footer.php"); ?>
</body>

</html>