<?php session_start(); ?>


<!-- ESTO INCULLE EL MENU -->

<!-- ESTO INCULLE EL MENU -->

<?php include('../layout/menu.php');?>

<?php include('../controller/usuarioController.php') ?>

<?php include('../model/usuarioModel.php') ?>







<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">    

<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../css/login.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    







<!-- bg-ingo d-flex   justify-content-center align-items-center       vh-100 -->












  <div class="container cont-login ">


    <div class ="row bg-ingo d-flex   justify-content-center align-items-center       "   >
                
          <div class="col-10 col-sm-7 col-md-6 col-lg-5 col-xl-4 col-xxl-4 text-center panel-login">
          <img class="img-usuario-pg-login" src="../img/usuario.png" alt=""  width="30%" >    
        <h1>Login</h1>
            <form action="#" method="POST">
              <input required name="correo"  type="email" class="form-control input-login" id="exampleFormControlInput1" placeholder="Correo">
              <input  required name="contraseña" type="password" class="form-control input-login" id="inputPassword5" aria-describedby="passwordHelpBlock" placeholder="Contraseña">
              
              
              
              <button name="sumit-login" class="btn btn-primary login-btn" type="submit">Entrar</button>
              <!-- <a class="btn btn-primary  login-btn" href="../view/registro.php"  role="button">Registrarse</a> -->
              <a href="../view/registro.php"> <button class="btn btn-primary login-btn" type="button" >Registrarse</button></a><br>
              <a href="../view/recuperarclave.php"><button type="button" class="btn btn-link login-link">Olvide mi contraseña</button></a>
              

            </form>
              
          </div>
          
          
    </div>



  




    




</div>















<!-- ESTO INCULLE EL FOOTERR -->
<?php include('../layout/footer.php')
?>
<!-- ESTO INCULLE EL FOOTERR -->



</body>
</html> 













<?php 






	// si viene del iniciar.php si se preciono el sutmit
	if(isset($_POST['sumit-login'])){

	
    



    $cor=$_POST['correo'];  
    $contra=$_POST['contraseña'];

    

   // Verifica si todos los campos están llenos
   if (!empty($cor) && !empty($contra)) {

  
   $usuario = new usuarioController();
   $resultado =   $usuario->login2($cor,$contra);
     
         
            

 
        if ($resultado) {

          
          $categoria = $resultado->getCategoria();
          $correo = $resultado->getCorreo();
          $contraseña = $resultado->getPassword();
          $nombre = $resultado->getNombre();


          
                  


                 if ($categoria=="usuario") {

                  

           

               echo '<script> window.location.href = "../view/home.php";</script>';
                   // echo '<script>alert("es usuarioooo"); </script>';
                   //header("Location: ../view/home.php");
                  //exit();
                 
                
                }elseif ($categoria=="admin"){

                  
                  $_SESSION['usuario'] = $nombre;


                  //  echo '<script>alert("es usuarioooo'.$categoria.'"); </script>';
                  // echo  $_SESSION['usuario.'] ;
                  //  header("Location: panel.php");
                   echo '<script> window.location.href = "../view/panelregistro.php";</script>';





                 }













        } else {
                echo '<script>
                swal("Error", "Sesion Fallida", "error");
                </script>';    
             }





  }  else {
    echo '<script>
    swal("Error", "Rellena los campos, "error");
     </script>';
  }
                
  
   
	
	
	
}












?>



















