
<!-- ESTO INCULLE EL MENU -->
<?php include('../layout/menu.php') ?>
<!-- ESTO INCULLE EL MENU -->


<?php include('../controller/mensajeController.php') ?>

<?php include('../model/mensajeModel.php') ?>






<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/contactanos.css">
    <title>Contactanos</title>
</head>
<body>
   


<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6076.9671601744185!2d-77.06601464615305!3d-11.997127850649317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105ce568c042771%3A0x6072f46c2b26e80!2sSENATI!5e0!3m2!1ses-419!2spe!4v1693086719175!5m2!1ses-419!2spe" width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>























<div class="container">




<br><br><br>
    <h1>Contactanos</h1>

    <br><br><br>





    <div class ="row bg-ingo d-flex   justify-content-center align-items-center       " style="text-align: center; "  >
                
        <div class="col-10 col-sm-6 col-md-6 col-lg-5 col-xl-4 col-xxl-4  ">
        <img class="img-usuario-pg-contacto" src="../img/contactanos-img.svg" alt=""  width="80%" >  
         <br>  <br> 
                

          
        </div>    
        <div class="col-10 col-sm-6 col-md-6 col-lg-5 col-xl-4 col-xxl-4 text-center panel-contacto">
            <img class="img-usuario-pg-contacto" src="../img/contactanos-logo.png" alt=""  width="30%" >    
            <h1>Contacto</h1>
            
            <form action="#" method="POST">

                <input required  name="nombre"  type="text" class="form-control input-contacto"  placeholder="Nombre">
                <input required  name="celular" type="number" class="form-control input-contacto"  placeholder="Celular">
                <input  required name="correo" type="email" class="form-control input-contacto"  placeholder="Correo">
                
                <select class="form-select" name="servicio" required>
                   
                    <option value="Consulta" selected>Consulta</option>

                    <option value="Correcion">Correcion de Estilo</option>
                    <option value="Diseño">Diseño de Portada</option>
                    <option value="Diagramacion">Diagramacion</option>
                    <option value="Ilustracion">Ilustracion</option>
                    <option value="Publicacion">Publicacion</option>
                    <option value="Difucion">Difucion</option>
                    <option value="Marquetin">Marquetin</option>
                
                </select>

                <textarea required  name="mensaje" class="form-control" rows="3" placeholder="Mensaje"></textarea>          
                
                
                <button name="btn-contacto" class="btn btn-primary contacto-btn" type="submit">Entrar</button>


            </form>
          
        </div>







 











  
    </div>
        
        
     <br><br><br>



























































</div>

<!-- ESTO INCULLE EL FOOTERR -->
<?php include('../layout/footer.php')
?>
<!-- ESTO INCULLE EL FOOTERR -->











<?php 






	// si viene del iniciar.php si se preciono el sutmit
	if(isset($_POST['btn-contacto'])){

	
    


	$nom=$_POST['nombre'];
	$cel=$_POST['celular'];
    $cor=$_POST['correo'];  
    $servi=$_POST['servicio'];
    $mensajetxt=$_POST['mensaje'];

    

   // Verifica si todos los campos están llenos
   if (!empty($nom) && !empty($cel) && !empty($cor) && !empty($mensajetxt)) {
    // echo '<script>alert("Nombre: ' . $nom . ', Celular: ' . $cel . ', Correo: ' . $cor . ', Contraseña: ' . $contra . '");</script>';

    // echo '<script>alert("hay datos"); </script>';
   $mensaje = new mensajeController();
   
    
   $mensajeModel = new mensajeModel();

    
          $mensajeModel->setNombre($nom);
          $mensajeModel->setCelular($cel);
          $mensajeModel->setCorreo($cor);
          $mensajeModel->setServicio($servi);
          $mensajeModel->setMensaje($mensajetxt);
                
          $re=   $mensaje->Registrar($mensajeModel);
     

                        

 



                 if ($re) {
                 echo '<script>
                       swal("'.$nom.'¡Buen trabajo! ", "MENSAJE EXITOSO", "success");
                   </script>';



                   
                        $asunto ="BIENVENIDA";
                        $mensaje = "Buen dia $nom  Te responderemos a la brevedad  \n";

                     $mensaje .= "Gracias por contactar con Editoriales para tu servicio de  $servi \n";
                        

                      $headers = 'From: BIENVENIDA@ejemplo.com' . "\r\n" .
                          'Reply-To: BIENVENIDA@ejemplo.com' . "\r\n" .
                         'X-Mailer: PHP/' . phpversion();
                    
                         $resul = @mail( $cor,$asunto, $mensaje, $headers);
                                











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


























































































































</body>
</html>



































































































