<!DOCTYPE html>
<html lang="es">

<head>
   <?php require_once("includes/head.php"); ?>

   <script defer type="module" src="assets/js/professionals.js"></script>

   <title>Profesionales</title>
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
                  <li class="active"><a data-toggle="tab" href="profesionales">Profesionales</a></li>
                  <li><a data-toggle="tab" href="pacientes">Pacientes</a></li>
               </ul>
            </div>
         </div>
      </nav>
   </header>

   <dialog id="dialog">

      <div class="row">
         <button id="btnclose" class="btnclose"><i class="fa fa-close text-danger"></i></button>
         <div class="col-md-8 col-md-offset-2">

            <h1 id="dialogTitle">Cargar Profesionales</h1>
            <hr>

            <form autocomplete="off">
               <label for="tipoDoc">Documento</label>

               <div class="row">
                  <div class="col-md-4">
                     <div class="form-group item-form">
                        <label for="tipoDoc">Tipo</label>
                        <select id="tipoDoc" name="tipodoc" class="form-control">
                           <option value="DNI">DNI</option>
                           <option value="PASSPORT">Pasaporte extranjero</option>
                        </select>
                        <p class="help-block error hidden">Elegí un tipo de documento</p>
                     </div>
                  </div>

                  <div class="col-md-4">
                     <div class="form-group item-form">
                        <label for="numDoc" id="mostrar-tipo">Número</label>
                        <input type="number" min="1" class="form-control" id="numDoc" required aria-required="true">
                        <p class="help-block error hidden">Ingresá tu número de documento</p>
                     </div>
                  </div>

               </div>

               <fieldset>

                  <div class="row">
                     <div class="form-group col-xs-12 col-sm-8 item-form">
                        <label for="tipoCarrera">Carrera</label>
                        <select id="tipoCarrera" name="tipoCarrera" class="form-control">
                           <option value="medico">Medico</option>
                           <option value="enfermero">Enfermero</option>
                        </select>
                        <p class="help-block error hidden">Elegí una carrera</p>
                     </div>
                  </div>


                  <div class="row">
                     <div class="col-md-8 form-group item-form">
                        <label for="nombre">Nombre/s</label>
                        <input type="text" name="name" class="form-control" id="nombre" required aria-required="true">
                        <p class="help-block error hidden" role="alert">Ingresá tu nombre</p>
                     </div>
                  </div>

                  <div class="row">
                     <div class="col-md-8 form-group item-form">
                        <label for="apellido">Apellido/s</label>
                        <input type="text" name="lastname" class="form-control" id="apellido" required
                           aria-required="true">
                        <p class="help-block error hidden">Ingresá tu apellido</p>
                     </div>
                  </div>

                  <div class="row">
                     <div class="col-md-8 form-group item-form">
                        <label for="matricula">Número de matricula</label>
                        <input type="text" class="form-control" id="matricula" required aria-required="true">
                        <p class="help-block error hidden">Ingresá tu apellido</p>
                     </div>
                  </div>

                  <div class="row">
                     <div class="form-group col-xs-12 col-sm-8 item-form">
                        <label for="birthday">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="birthday" required aria-required="true">
                        <p class="help-block error hidden">Ingresá un numero valido</p>
                     </div>
                  </div>

                  <div class="row">
                     <div class="form-group col-xs-12 col-sm-8 item-form">
                        <label for="generos">Género</label>
                        <select id="generos" class="form-control">
                           <option value="M">Masculino</option>
                           <option value="F">Femenino</option>
                           <option value="X">No binario</option>
                        </select>
                        <p class="help-block error hidden">Elegí un grado</p>
                     </div>
                  </div>

               </fieldset>


               <fieldset>
                  <label>Celular</label>
                  <div class="row">
                     <fieldset>
                        <div class="form-group col-xs-12 col-sm-8 item-form">
                           <input aria-label="número de teléfono móvil" class="form-control" id="cellphone_number"
                              required aria-required="true" type="text">
                           <p class="help-block error hidden">Ingresá tu número de teléfono móvil</p>
                        </div>
                     </fieldset>
                  </div>
               </fieldset>

               <fieldset>
                  <div class="row">
                     <div class="col-md-8 form-group item-form">
                        <label for="address_street">Dirección</label>
                        <input type="text" name="address_street" class="form-control" id="address_street" required
                           aria-required="true">
                        <p class="help-block error hidden">Ingresá una direccion</p>
                     </div>
               </fieldset>

               <fieldset>
                  <div class="row">
                     <div class="col-md-8 form-group item-form">

                        <label for="email">Correo electrónico</label>
                        <input type="email" name="email" class="form-control" id="email" required aria-required="true">
                        <p class="help-block error hidden">Ingresá un correo electrónico <br> El correo
                           electrónico tiene un formato no válido</p>
                     </div>
                  </div>

                  <div class="row">
                     <div class="col-md-8 form-group item-form">
                        <label for="fecha">Fecha Guardia</label>
                        <input type="date" class="form-control" id="fechaGuardia" required aria-required="true">
                        <p class="help-block error hidden">Ingresá una fecha válida</p>
                     </div>
                  </div>

                  <div class="row">
                     <div class="col-md-4">
                        <label for="fecha">Hora de inicio de la guardia</label>
                        <input type="time" class="form-control" id="inicioHoraGuardia" required
                           aria-required="true"></input>
                        </span>
                        <p class="help-block error hidden">Ingresá una fecha válida</p>
                     </div>

                     <div class="col-md-4">
                        <label for="fecha">Hora de fin de la guardia</label>
                        <input type="time" class="form-control" id="finalHoraGuardia" required
                           aria-required="true"></input>
                        </span>
                        <p class="help-block error hidden">Ingresá una fecha válida</p>
                     </div>

                  </div>
                  <br>

                  <button type="submit" id="btnSubmit" class="btn btn-success">Enviar Profesional</button>
               </fieldset>
            </form>
         </div>
      </div>
   </dialog>

   <main>
      <div class="container">
         <ol class="breadcrumb">
            <li><a href="ingreso">Login</a></li>
            <li class="active">Profesionales</li>
         </ol>

         <section>
            <h1>Profesionales</h1>

            <hr>
            <div class="row">
               <div class="col-md-12">

                  <div class="row">
                     <div class="col-sm-12 col-lg-6" id="ponchoTableSearchCont">
                        <div class="form-group">
                           <label for="ponchoTableSearch">Buscá por numero de matrícula</label>
                           <input class="form-control" id="searchBar" type="text" />
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
                        <th>Numero de Matricula</th>
                        <th>Nombre y Apellido</th>
                     </thead>
                     <tbody id="dataTable"></tbody>
                  </table>
               </div>
   </main>
   <?php require_once("includes/footer.php"); ?>
</body>

</html>