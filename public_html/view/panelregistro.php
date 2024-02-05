<?php 
session_start();

if (isset($_SESSION['usuario'])) {
     include('../model/usuarioModel.php');
     include('../layout/menuadmin.php');
     include('../controller/usuarioController.php');
    



     $usuario = new usuarioController();
     $usuarioModel = new usuarioModel();


     $obtenerusuario = new usuarioModel();



    // //  $_REQUEST['id'] recoge el valor del parámetro id que se pasó en 
    // la URL cuando se hizo clic en el enlace "Eliminar". 
    // Luego, ese valor se utiliza para identificar qué usuario 
    // debe eliminarse en la función Eliminar($cod).




  













    if(isset($_REQUEST['action']))    {
 
          // un switch paradependiendoe el action
        switch($_REQUEST['action'])      {
 
            case 'registrar':
              
                $usuarioModel->setNombre( $_REQUEST['nombre']);
                $usuarioModel->setCelular( $_REQUEST['celular']);
                $usuarioModel->setCorreo( $_REQUEST['correo']);
                $usuarioModel->setPassword( $_REQUEST['contraseña']);
                $usuarioModel->setCategoria( $_REQUEST['categoria']);
                $usuario->Registrarpanel($usuarioModel);          
                echo '<script> window.location.href = "../view/panel.php";</script>';
                break;
            case 'actualizar':

                // $_REQUEST['cod'] se utiliza para acceder al valor de "cod" en la URL
                $usuarioModel->setId($_REQUEST['id']);
                $usuarioModel->setNombre( $_REQUEST['nombre']);
                $usuarioModel->setCelular( $_REQUEST['celular']);
                $usuarioModel->setCorreo( $_REQUEST['correo']);
                $usuarioModel->setPassword( $_REQUEST['contraseña']);
                $usuarioModel->setCategoria( $_REQUEST['categoria']);
                $usuario->Actualizar($usuarioModel);
                echo '<script> window.location.href = "../view/panel.php";</script>';
                break;

             //en esta funcion asemos un switch case dependiendo pero toodo esta en el mismo archibo              
            case 'eliminar':
                $usuario->Eliminar($_REQUEST['id']); 
                echo '<script> window.location.href = "../view/panel.php";</script>';
                break;

            case 'editar':
               $usuarioModel = $usuario->Obtener($_REQUEST['id']);
              
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
    <link rel="stylesheet" type="text/css" href="../css/panel.css">


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

        <form  action="?action=<?php echo $usuarioModel->getId() ?'actualizar' : 'registrar'; ?>"  method="POST" enctype="multipart/form-data">
    
       
         <input type="hidden" name="id"  value="<?php echo $usuarioModel->getId(); ?>" >
            <div class="row justify-content-center align-items-center">

             

                
                <div class="col-10 col-sm-5 col-md-4 col-lg-4 col-xl-2 col-xxl-2 col-formu-panel">
                    <input value="<?php echo $usuarioModel->getNombre(); ?>"  required name="nombre"  type="text" class="form-control input-login"  placeholder="Nombre">
                </div>
                
                <div class="col-10 col-sm-5 col-md-4 col-lg-4 col-xl-2 col-xxl-2  col-formu-panel">
                    <input   value="<?php echo $usuarioModel->getCelular(); ?>"     required name="celular" type="number" class="form-control input-login" placeholder="Celular">
                </div>
                
                <div class="col-10 col-sm-5 col-md-4 col-lg-4 col-xl-2 col-xxl-2  col-formu-panel">    
                    <input  value="<?php echo $usuarioModel->getCorreo(); ?>"   required name="correo" type="email" class="form-control input-login"  placeholder="Correo">
                </div>
                
                <div class="col-10 col-sm-5 col-md-4 col-lg-4 col-xl-2 col-xxl-2  col-formu-panel">  
                    <input   value="<?php echo $usuarioModel->getPassword(); ?>"  required name="contraseña"  class="form-control input-login"  aria-describedby="passwordHelpBlock" placeholder="Contraseña">
                    
                </div>
                
                <div class="col-10 col-sm-5 col-md-4 col-lg-4 col-xl-2 col-xxl-2  col-formu-panel">
                
                <select class="form-select"  name="categoria" required>
                     <option value="usuario" <?php if ($usuarioModel->getCategoria() === 'usuario') echo 'selected'; ?>>Usuario</option>
                    <option value="admin" <?php if ($usuarioModel->getCategoria() === 'admin') echo 'selected'; ?>>Admin</option>
                </select>

            </div>
                <div class="col-10 col-sm-5 col-md-4 col-lg-4 col-xl-1 col-xxl-1  col-formu-panel" style="text-align: center;">    
                    <button class="btn  panel-btn"name="edit-crea" type="submit">Guardar</button>
                </div>    

            </div>

        </form>

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
                            <th><p>CONTRASEÑA</p></th>
                            <th><p>CATEGORIA</p></th>	
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
                            <?php foreach($usuario->Listar() as $r): ?>

                                    <tr>
                                            <td><?php echo $r->getId(); ?></td>
                                            <td><?php echo $r->getNombre(); ?></td>
                                            <td><?php echo $r->getCelular(); ?></td>
                                            <td><?php echo $r->getCorreo(); ?></td>
                                            <td><?php echo $r->getPassword(); ?></td>
                                            <td><?php echo $r->getCategoria(); ?></td>
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


































































<?php 
} else {
    
    echo '<script> window.location.href = "../view/login.php";</script>';
     echo '<script>
     swal("Error", "Sesion Fallida", "error");
     </script>';  

    
}
?>





























































