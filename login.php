<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="lib/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="css/theme.css" type="text/css">
</head>

<body>
  <div align="center">
    <br>
    <h2 style='color:blue;'>ACCESO AJAX/MYSQL - <b style='color:red;'>ANTI INJECCIÓN SQL v.2</b></h2>
    <u>Cuentas de Prueba:</u>
    <br> 
    Correo: admin@gmail.com / psw:1234
    <br>
    Correo: asistente@gmail.com / psw:123456
  </div>
  
  <div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-white p-3 bg-secondary">
            <div class="card-body">
              <h3 class="mb-4">Acceso de Usuario</h3>
              <!-- Formulario para de acceso -->
              <span>
                <div class="form-group"> <label>Correo</label>
                  <input type="email" id="email" class="form-control" placeholder="Enter email"> </div>
                <div class="form-group"> <label>Contraseña</label>
                  <input type="password" id="password" class="form-control" placeholder="Password" onkeyup="if(event.keyCode == 13) logear();"> </div>
                <button type="button" class="btn btn-primary" onclick="logear()">Ingresar</button>
                <!-- Message del servidor -->
                <center>
                  <h4 id="message"></h4>
                </center>
              </span>
            
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery-3.2.1.js"></script>
  <script src="lib/bootstrap-4.0.0_lite/js/popper.min.js"></script>
  <script src="lib/bootstrap-4.0.0_lite/js/bootstrap.min.js"></script>
  <script>
    function logear(){
      
      $.post("validate.php",{
        email: $("#email").val()
        ,password: $("#password").val()
      },function(res){
        //solo si fue correcto se reenviara a la pagina establecida para esta cuenta
        $("#message").html(res.message);
       
        if(res.success)
          window.location.href=res.link;

      },"json");
    }
  </script>
</body>
</html>