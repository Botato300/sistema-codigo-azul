<!DOCTYPE html>
<html lang="es">

<head>
   <?php require_once("includes/head.php"); ?>

   <script defer type="module" src="assets/js/patient.js"></script>

   <title>Pacientes</title>
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
                  <li><a data-toggle="tab" href="enfermeros">Profesionales</a></li>
                  <li class="active"><a data-toggle="tab" href="pacientes">Pacientes</a></li>
               </ul>
            </div>
         </div>
      </nav>
   </header>

   <dialog id="dialog">
      <div class="row">
         <button id="btnclose" class="btnclose"><i class="fa fa-close text-danger"></i></button>
         <div class="col-md-8 col-md-offset-2">

            <h1>Cargar Pacientes</h1>
            <hr>

            <form autocomplete="off">
               <label for="tipoDoc">Documento</label>

               <div class="row">
                  <div class="col-md-4">
                     <div class="form-group item-form">
                        <label for="tipoDoc">Tipo</label>
                        <select id="tipoDoc" name="tipodoc" class="form-control">
                           <option value="DNI" selected="">DNI</option>
                           <option value="Pasaporte extranjero">Pasaporte extranjero</option>
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
                        <label for="grupoSanguineo">Gruoo sanguineo</label>
                        <select id="grupoSanguineo" name="grupoSanguineo" class="form-control">
                           <option value="A+">A+</option>
                           <option value="B+">B+</option>
                           <option value="AB+">AB+</option>
                           <option value="AB-">AB-</option>
                           <option value="A-">A-</option>
                           <option value="B-">B-</option>
                           <option value="O+">O+</option>
                           <option value="O-">O-</option>
                        </select>
                        <p class="help-block error hidden">Elegí un grado</p>
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
                        <label for="historiaClinica">Historia clinica</label>
                        <input type="text" class="form-control" id="historiaClinica" required aria-required="true">
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
                     <div class="col-sm-12">
                        <fieldset>
                           <legend>
                              <label>Género</label>
                           </legend>
                           <div class="form-group item-form">
                              <label for="f" class="radio-inline">
                                 <input type="radio" name="sexo" id="f" value="F" required aria-required="true">
                                 Femenino
                              </label>
                              <label for="m" class="radio-inline">
                                 <input type="radio" name="sexo" id="m" value="M" required aria-required="true">
                                 Masculino
                              </label>
                              <label for="x" class="radio-inline">
                                 <input type="radio" name="sexo" id="x" value="X" required="" aria-required="true">
                                 No binario
                              </label>
                              <p class="help-block error hidden p-y-1">Ingresá tu sexo
                              </p>
                           </div>

                        </fieldset>
                     </div>
                  </div>
               </fieldset>

               <fieldset>
                  <label>Celular</label>
                  <div class="row">
                     <div class="col-sm-12">

                        <fieldset>

                           <div class="row">
                              <div class="form-group col-xs-12 col-sm-4 item-form">
                                 <div class="input-group">
                                    <label class="input-group-addon text-black">0</label>
                                    <input aria-label="Código de area de teléfono móvil" class="form-control"
                                       id="cellphone_area_code" required aria-required="true" type="text">
                                 </div>
                                 <p class="help-block error hidden">Ingresá el código de área</p>
                              </div>

                              <div class="form-group col-xs-12 col-sm-8 item-form">
                                 <div class="input-group">
                                    <label class="input-group-addon text-black">15</label>
                                    <input aria-label="número de teléfono móvil" class="form-control"
                                       id="cellphone_number" required aria-required="true" type="text">
                                 </div>
                                 <p class="help-block error hidden">Ingresá tu número de teléfono móvil</p>
                              </div>

                           </div>
                        </fieldset>
                     </div>
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
                  <br>

                  <button type="submit" id="btnSubmit" class="btn btn-success">Enviar Paciente</button>
               </fieldset>
            </form>
         </div>
      </div>
   </dialog>

   <main>
      <div class="container">
         <ol class="breadcrumb">
            <li><a href="ingreso">Login</a></li>
            <li class="active">Pacientes</li>
         </ol>

         <section>
            <h1>Pacientes</h1>

            <hr>
            <div class="row">
               <div class="col-md-12">

                  <div class="row">
                     <div class="col-sm-12 col-lg-6" id="ponchoTableSearchCont">
                        <div class="form-group">
                           <label for="ponchoTableSearch">Buscá por historia clinica</label>
                           <input class="form-control" id="ponchoTableSearch" type="text" />
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
                        <th>Historia Clinica</th>
                        <th>Nombre y Apellido</th>
                     </thead>
                     <tbody>
                        <tr>
                           <td>1023</td>
                           <td>Gonzales Pires</td>
                           <td> <button type="button" class="btn btn-primary bg-warning"><i class="fa fa-pencil"></i>
                                 Modificar</button>
                              <button type="button" class="btn btn-primary bg-danger"><i class="fa fa-ban"></i>
                                 Eliminar</button>
                           </td>
                        </tr>
                        <tr>
                           <td>1024</td>
                           <td>Escudero Soña</td>
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