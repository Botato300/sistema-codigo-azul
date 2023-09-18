<!DOCTYPE html>
<html lang="es">

<head>
   <?php require_once("includes/head.php"); ?>

   <script defer src="assets/js/index.js"></script>

   <title>Enfermeros</title>
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
                  <li><a data-toggle="tab" href="zonas">Zonas</a></li>
                  <li class="active"><a data-toggle="tab" href="enfermeros">Enfermeros</a></li>
                  <li><a data-toggle="tab" href="pacientes">Pacientes</a></li>
               </ul>
            </div>
         </div>
      </nav>
   </header>

   <dialog close id="test" class="">
      <section>
         <div class="row">
            <button class="btnclose"><i class="fa fa-close text-danger"></i></button>

            <div class="col-md-8 col-md-offset-2">
               <h1>Cargar Enfermeros</h1>
               <hr>
               <form>
                  <fieldset>
                     <legend>
                        <h3>Datos de la zona</h3>
                     </legend>
                     <div class="row">
                        <div class="col-md-6 form-group item-form">
                           <label for="zone">Numero de Zona</label>
                           <input type="number" class="form-control" id="zoneNumber" required aria-required="true" max="10" min="1">
                           <p class="help-block error hidden">Ingresá el numero <br>El numero tiene un formato no
                              válido
                           </p>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-8 form-group item-form">
                           <label for="nombre">Nombre de la zona</label>
                           <input type="text" name="name" class="form-control uppercase" id="nombre" required aria-required="true" maxlength="1">
                           <p class="help-block error hidden">Ingresá un nombre valido</p>
                        </div>
                     </div>
                  </fieldset>
                  <button type="submit" class="btn btn-success">Cargar Zona</button>
            </div>
         </div>
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
            <li class="active">Enfermeros</li>
         </ol>

         <section>
            <h1>Enfermeros</h1>

            <hr>
            <div class="row">
               <div class="col-md-12">

                  <div class="row">
                     <div class="col-sm-12 col-lg-6" id="ponchoTableSearchCont">
                        <div class="form-group">
                           <label for="ponchoTableSearch">Buscá por numero matricula</label>
                           <input class="form-control" id="ponchoTableSearch" type="text" />
                        </div>
                     </div>
                     <div class="col-sm-12 col-lg-6">
                        <button type="button" class="btn btn-primary newbutton bg-success"><i class="fa fa-plus"></i>
                           Crear</button>
                     </div>
                  </div>
                  <table class="table" id="tableFiltro">
                     <thead>
                        <th>Numero de Matricuka</th>
                        <th>Nombre y Apellido</th>
                     </thead>
                     <tbody>
                        <tr>
                           <td>1023</td>
                           <td>Gonzalo Ramirez Peña</td>
                           <td> <button type="button" class="btn btn-primary bg-warning"><i class="fa fa-pencil"></i>
                                 Modificar</button>
                              <button type="button" class="btn btn-primary bg-danger"><i class="fa fa-ban"></i>
                                 Eliminar</button>
                           </td>
                        </tr>
                        <tr>
                           <td>1024</td>
                           <td>Ariel Ibarra</td>
                           <td>
                              <button type="button" class="btn btn-primary bg-warning"><i class="fa fa-pencil"></i>
                                 Modificar</button>
                              <button type="button" class="btn btn-primary bg-danger"><i class="fa fa-ban"></i>
                                 Eliminar</button>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
   </main>
   <?php require_once("includes/footer.php"); ?>
</body>

</html>