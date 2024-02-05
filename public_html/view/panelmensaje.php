<?php 
session_start();

if (isset($_SESSION['usuario'])) {
     include('../model/mensajeModel.php');
     include('../layout/menuadmin.php');
     include('../controller/mensajeController.php');
    



     $mensaje = new mensajeController();
     $mensajeModel = new mensajeModel();


 



    // //  $_REQUEST['id'] recoge el valor del parámetro id que se pasó en 
    // la URL cuando se hizo clic en el enlace "Eliminar". 
    // Luego, ese valor se utiliza para identificar qué usuario 
    // debe eliminarse en la función Eliminar($cod).




  













    if(isset($_REQUEST['action']))    {
 
          // un switch paradependiendoe el action
        switch($_REQUEST['action'])      {
 
            case 'registrar':
              

                break;
            case 'actualizar':

              
                break;

             //en esta funcion asemos un switch case dependiendo pero toodo esta en el mismo archibo              
            case 'eliminar':
                $mensaje->Eliminar($_REQUEST['id']); 
                echo '<script> window.location.href = "../view/panelmensaje.php";</script>';
                break;

            case 'editar':
               $mensajeModel = $mensaje->Obtener($_REQUEST['id']);
              
                break;
                
                // echo"ewwwwwwwwww";
                // echo '<script>alert("xxxxxxxxxxxxxxxxxxxx); </script>';
                   
 

         
        }

    }















     
 ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel</title>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/panelmensaje.css">


</head>
<body>
    



  </h1>







<div class="container-fluid">
<br><br>








<div class="row justify-content-center  align-items-start">
    <div class="col-11 col-sm-11 col-md-11 col-lg-11  col-xl-10  col-xxl-10 ">
        <h1>Bienvenido : <?php echo $_SESSION['usuario'];?>
    </div>

</div>









<br>

<div class="row justify-content-center">
<div class="col-11 col-sm-11 col-md-11 col-lg-11">

<!-- https://www.youtube.com/watch?v=ryg1Ir1YGEw -->

        

</div>
</div>









<form  action="#"  method="POST" enctype="multipart/form-data">


        <div class="row  justify-content-center "     >


            <div class="col-10 col-sm-8  col-md-8   col-lg-8  col-xl-7  col-xxl-10  col-panelmensaje-0"  style=" text-align: center;">

                        

                <button name="btn-panel-mensaje" class="btn btn-primary panel-mensaje-btn" type="submit">Responder</button>
            
            </div>
            <div class="col-11 col-sm-10  col-md-8   col-lg-9  col-xl-8  col-xxl-7  col-panelmensaje-0"  style=" text-align: center;">
  

                    <textarea required  name="mensaje" class="form-control" rows="3" placeholder="Mensaje"></textarea>  
                
            </div>


        </div>

</form>



<br>
  
               





















<div class="row  justify-content-center "   >
    <div class="col-10 col-sm-3  col-md-3 col-lg-2  col-xl-2   col-xxl-2    col-panelmensaje-1">
                <p>Nombre: <?php echo $mensajeModel->getNombre(); ?>  </p>
                

    </div>
    <div class="col-10 col-sm-3  col-md-3 col-lg-3  col-xl-2 col-xxl-2  col-panelmensaje-2">
                <p>Correo: <?php echo $mensajeModel->getCorreo(); ?> </p>

    </div>
    <div class="col-10 col-sm-3  col-md-3    col-lg-3 col-xl-2   col-xxl-2   col-panelmensaje-3">
                <p>Servicio: <?php echo $mensajeModel->getServicio(); ?> </p>
               
    </div>



</div>

<div class="row  justify-content-center "     >

    <div class="col-10 col-sm-9  col-md-8   col-lg-8  col-xl-7  col-xxl-6  col-panelmensaje-4"  style=" text-align: center;">
                <p>Mensaje :jhjhjkhkhhjkhkjh <?php echo $mensajeModel->getMensaje(); ?> </p>

    </div>


</div>



<br><br><br>































        <div class="row justify-content-center tabla-panel">

            <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-9 col-xxl-8 "> 


                <div class="table-responsive-lg">



                    <table class="table table-striped  table-hover">
                        <thead>
                            <tr>
                            <th><p>ID</p></th>
                            <th><p>NOMBRE</p></th>
                            <th><p>CELULAR</p></th>
                            <th><p>CORREO</p></th>
                            
                            <th><p>SERVICO</p></th>
                            <th></th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                                                    <!-- El bucle foreach itera sobre el resultado de la llamada a $model->Listar().
                                                    En cada iteración, $r contiene un objeto que representa un usuario.         

                                                    En el caso de ?action=editar&cod=php echo $r->cod;  el signo 
                                                    de interrogación marca el comienzo de los parámetros de la consulta. Luego, se definen los parámetros:
                                                    -->
                            <?php foreach($mensaje->Listar() as $r): ?>

                                    <tr>
                                            <td><?php echo $r->getId(); ?></td>
                                            <td><?php echo $r->getNombre(); ?></td>
                                            <td><?php echo $r->getCelular(); ?></td>
                                            <td><?php echo $r->getCorreo(); ?></td>
                                            
                                            <td><?php echo $r->getServicio(); ?></td>
                                            
                                            <td>
                                                <a class="btn btn-primary btn-sm btn-editar" role="button"  href="?action=editar&id=<?php echo $r->getId(); ?>">Editar</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-sm btn-eliminar" role="button" href="?action=eliminar&id=<?php echo $r->getId(); ?>">Eliminar</a>
                                            </td>
                                            
                                    </tr>
                                
                            <?php endforeach; ?>
                        
                        </tbody>
                        
                        
                        
                        
                    </table>

                </div>

            </div>

    

        </div>

</div>









</body>
</html>


















































<br><br><br><br>














<?php 






	// si viene del iniciar.php si se preciono el sutmit
	if(isset($_POST['btn-panel-mensaje'])){

	



		$mensajetxt=$_POST['mensaje'];
		$nom=$mensajeModel->getNombre();
        $servi=$mensajeModel->getServicio();
        $correo=$mensajeModel->getCorreo();
    

   // Verifica si todos los campos están llenos
   if (!empty($nom) && !empty($mensajetxt) && !empty($servi) && !empty($correo) ) {
    // echo '<script>alert("Nombre: ' . $nom . ', Celular: ' . $cel . ', Correo: ' . $cor . ', Contraseña: ' . $contra . '");</script>';

    // echo '<script>alert("hay datos"); </script>';

                   
            $asunto ="RESPUESTA";
            $mensaje = "Buen dia $nom  Te responderemos a la brevedad  \n";

            $mensaje .= "Agradesemos que se interese en nuestro servicio de :  $servi \n";
            $mensaje .= "Mensaje :  $mensajetxt \n";

            $headers = 'From: RESPUESTA@ejemplo.com' . "\r\n" .
                'Reply-To: RESPUESTA@ejemplo.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            $resul = @mail( $correo,$asunto, $mensaje, $headers);
            
            if ($resul) {

                echo '<script>alert("Respuesta enviada a : ' .$correo.'"); </script>';
   
                echo '<script> window.location.href = "../view/panelmensaje.php";</script>';
            } else {
                    echo '<script>
                    swal("Error", "Datos Invalisossssss", "error");
                    </script>';    
                }








   } else {
    echo '<script>
    swal("Error", "Rellena los campos, "error");
     </script>';
   }
                
  
   
	
	
	
}












?>































































<?php 
} else {
    
    echo '<script> window.location.href = "../view/login.php";</script>';
     echo '<script>
     swal("Error", "Sesion Fallida", "error");
     </script>';  

    
}
?>





























































