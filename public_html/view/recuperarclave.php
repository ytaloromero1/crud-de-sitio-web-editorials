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
<title>Recuperar</title>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../css/login.css">

</head>
<body>
    







<!-- bg-ingo d-flex   justify-content-center align-items-center       vh-100 -->












  <div class="container cont-login ">


    <div class ="row bg-ingo d-flex   justify-content-center align-items-center       "   >
                
          <div class="col-10 col-sm-7 col-md-6 col-lg-5 col-xl-4 col-xxl-4 text-center panel-login">
          <img class="img-usuario-pg-login" src="../img/usuario.png" alt=""  width="30%" >    
        <h1>Recuperar clave</h1>
            <form action="#" method="POST">
              <input required name="correo"  type="email" class="form-control input-login" id="exampleFormControlInput1" placeholder="Correo">
              <input required name="nombre"  type="text" class="form-control input-login" id="exampleFormControlInput1" placeholder="Nombre">

              
              
              <button name="sumit-recuperar" class="btn btn-primary login-btn" type="submit">Recuperar</button>
              <!-- <a class="btn btn-primary  login-btn" href="../view/registro.php"  role="button">Registrarse</a> -->
              
          
              

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
	if(isset($_POST['sumit-recuperar'])){


    $cor=$_POST['correo'];  
    $nom=$_POST['nombre'];

    

            // Verifica si todos los campos están llenos
            if (!empty($cor) && !empty($nom)) {

            
                    $usuario = new usuarioController();
                    $resultado =   $usuario->recuperarclave($cor,$nom);
                        
                            
                            $nomb =$resultado->getNombre();
                            $contra =$resultado->getPassword();
                            $email =$resultado->getCorreo();

                        $asunto ="RECUPERAR CONTRASEÑA";
                        $mensaje = "Buen dia $nomb estos son sus datos : \n";
                        $mensaje = "contraseña  :  $contra\n";
                        $mensaje .= "Correo electrónico  :  $email\n";
                         $mensaje .= "Inicio Sesion   :  http://editorials.byethost8.com/view/login.php ";

                         $headers = 'From: RECUPERAR@ejemplo.com' . "\r\n" .
                         'Reply-To: RECUPERAR@ejemplo.com' . "\r\n" .
                         'X-Mailer: PHP/' . phpversion();
                    
                         $resul = @mail( $email,$asunto, $mensaje, $headers);
                                
                      
                    
                            if ($resul) {

                                echo '<script>alert(" Te llegara un mensaje al :'.$email.'"); </script>';
                                echo '<script>
                                swal("Te llegara un mensaje al  '.$email.'", "¡Busca en span!", "success");
                            </script>';

                            } else {
                                    echo '<script>
                                    swal("Error", "Datos Invalisossssss", "error");
                                    </script>';    
                                }





            }  else {
                echo '<script>
                swal("Error", "Datos Invalisos, "error");
                </script>';
            }
                            
            
   
	
	
	
}












?>



















