

<!-- ESTO INCULLE EL MENU -->
<?php include('../layout/menu.php') ?>
<!-- ESTO INCULLE EL MENU -->


<?php include('../controller/usuarioController.php') ?>

<?php include('../model/usuarioModel.php') ?>






















<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">    

<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Registro</title>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../css/registro.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</head>
<body>
    







<!-- bg-ingo d-flex   justify-content-center align-items-center       vh-100 -->












<div class="container cont-login ">


    <div class ="row bg-ingo d-flex   justify-content-center align-items-center       "   >
            
      <div class="col-10 col-sm-7 col-md-6 col-lg-5 col-xl-4 col-xxl-4 text-center panel-login">
      <img class="img-usuario-pg-login" src="../img/registro.png" alt=""  width="30%" >    
    <h1>Registro</h1>
        <form action="#" method="POST">

        <input required name="nombre"  type="text" class="form-control input-login" id="exampleFormControlInput1" placeholder="Nombre">
        <input required name="celular" type="number" class="form-control input-login" id="exampleFormControlInput1" placeholder="Celular">
        <input required name="correo" type="email" class="form-control input-login" id="exampleFormControlInput1" placeholder="Correo">
        <input required name="contraseña" type="password" class="form-control input-login" id="inputPassword5" aria-describedby="passwordHelpBlock" placeholder="Contraseña">
          
          
          
        <button class="btn btn-primary login-btn"name="registrar-pg-registro" type="submit">Registrarse</button>
       

        </form>
          
      </div>
      
       
</div>


























    









































</div>












<?php



?>


<!-- ESTO INCULLE EL FOOTERR -->
<?php include('../layout/footer.php')
?>
<!-- ESTO INCULLE EL FOOTERR -->



</body>
</html> 























<?php 






	// si viene del iniciar.php si se preciono el sutmit
	if(isset($_POST['registrar-pg-registro'])){

	
    $btnsutmit= $_POST['registrar-pg-registro'];


		$nom=$_POST['nombre'];
		$cel=$_POST['celular'];
    $cor=$_POST['correo'];  
    $contra=$_POST['contraseña'];

    

   // Verifica si todos los campos están llenos
   if (!empty($nom) && !empty($cel) && !empty($cor) && !empty($contra)) {
    // echo '<script>alert("Nombre: ' . $nom . ', Celular: ' . $cel . ', Correo: ' . $cor . ', Contraseña: ' . $contra . '");</script>';

    // echo '<script>alert("hay datos"); </script>';
   $usuario = new usuarioController();
   
    
   $usuarioModel = new usuarioModel();

    
          $usuarioModel->setNombre($nom);
          $usuarioModel->setCelular($cel);
          $usuarioModel->setCorreo($cor);
          $usuarioModel->setPassword($contra);
                
          $re=   $usuario->Registrar($usuarioModel);
     






                 if ($re) {
                 echo '<script>
                       swal("'.$nom.'¡Buen trabajo! ", "REGISTRO EXITOSO", "success");
                   </script>';
                  //  si no me retorna re
               } else {
                   echo '<script>
                      swal("Error", "El registro falló", "error");
                 </script>';
             }



   } else {
    echo '<script>
    swal("Error", "Rellena los campos, "error");
     </script>';
   }
                
  
   
	
	
	
}












?>









































































































