
<?php include('../model/conexion.php') ?>








<?php


class usuarioController{


public $conex;


public function __construct() {
    $conexion = new Conexion();
    $this->conex = $conexion->getConexion(); // Obtener la conexión PDO
}










        // Metodo Obtener solo contraseña por el correo
        public function recuperarclave($cor,$nom)
        {
            try
            {
                $sql = "SELECT * FROM usuarios WHERE correo = ? AND nombre = ?";

                $resul=  $this->conex->prepare($sql);

                $resul->execute(array(
                    $cor,
                    $nom
                    
                    )
                    );

                
                $r = $resul->fetch(PDO::FETCH_OBJ);

          

                if ($r) {
                    # code...


                    $usuario = new UsuarioModel();

                       
                   $usuario->setNombre( $r->nombre);
                        
                      $usuario->setCorreo($r->correo);
                      $usuario->setPassword( $r->contrasena);
                        


                        // $asunto ="RECUPERAR CONTRASEÑA";
                       
                        // $mensaje = "contraseña  :  $contra\n";
                        // $mensaje .= "Correo electrónico  :  $email\n";
                        // $mensaje .= "Inicio Sesion   :  http://editorials.byethost8.com/view/login.php ";

                        // $headers = 'From: RECUPERAR@ejemplo.com' . "\r\n" .
                        // 'Reply-To: RECUPERAR@ejemplo.com' . "\r\n" .
                        // 'X-Mailer: PHP/' . phpversion();
                    
                        // $resul = mail( $email,$asunto, $mensaje, $headers);

	

                        //      if ($resul) {
                        //         return $email;
                        //      }else {
                        //         $pp="queso";
                        //         return $pp;
                        //      }
                       return $usuario;
                   
                }else {



                    return null;
                }
                
            
            
            
            
            
            
            
            
            
            
            } 
            catch (Exception $e)
            {
                echo '<script>alert("Datos invalidos"); </script>';
                return null;
                die($e->getMessage());
                
            }   
        }


































        // Metodo Eliminar
        public function Eliminar($id)
        {
            try
            {
 



                $sql = "DELETE FROM usuarios WHERE id = ?";

                $stm=  $this->conex->prepare($sql);

                $stm->execute(array($id));


            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }
        }












        // Metodo Actualizar
        public function Actualizar(usuarioModel $data)
        {
            try
            {

                $sql = "UPDATE usuarios SET
                nombre = ?,
                celular = ?,
                correo = ?,
                contrasena= ?,
                categoria = ?
                WHERE id = ?";



                 $this->conex->prepare($sql)
                 ->execute(array(

                
               
                $data->getNombre(),
                $data->getCelular(),
                $data->getCorreo(),                
                $data->getPassword(),
                $data->getCategoria(),
                $data->getId()
                )
                );
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }
        }








   // Metodo Obtener solo el registro del codigo
   public function Obtener($id)
   {
       try
       {


        $sql = "SELECT * FROM usuarios WHERE id = ?";

        $stm=  $this->conex->prepare($sql);

        $stm->execute(array($id));


           $r = $stm->fetch(PDO::FETCH_OBJ);

           $usuario = new UsuarioModel();

           $usuario->setId( $r->id);
           $usuario->setNombre( $r->nombre);
           $usuario->setCelular( $r->celular);
           $usuario->setCorreo($r->correo);
           $usuario->setPassword( $r->contrasena);
           $usuario->setCategoria( $r->categoria);
          return $usuario;
          
          
        //   if ($usuario) {
            
           
            
        //    }else {
            
        //     return null;
        //    }

           
       } 
       catch (Exception $e)
       {
           die($e->getMessage());
       }   
   }







































        // Metodo Listar
        public function Listar(){
            try
            {
              // arreglo   
              $arrayusuario = array();
              // consulta sql
              $stm = $this->conex->prepare("SELECT * FROM usuarios ORDER BY id DESC");
              // ejecutar consulta
              $stm->execute();
              // revisar los resultados
              foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                {
                    // Objeto Cliente
                  $usuario = new UsuarioModel();
                  // Asignar valores a los atributos
                  $usuario->setId( $r->id);
                  $usuario->setNombre( $r->nombre);
                  $usuario->setCelular( $r->celular);
                  $usuario->setCorreo($r->correo);
                  $usuario->setPassword( $r->contrasena);
                  $usuario->setCategoria( $r->categoria);


                  // el arreglo recibe datos del objeto
                  $arrayusuario[] = $usuario;
                }
                // se acaba el for
                // devuelve el listado
                return $arrayusuario;
            }
            catch(Exception $e)
            {
                // si existe un error 
              die($e->getMessage());
            }
        }













 

// está llamando al método fetch en el objeto $stm que contiene la consulta preparada. 
// Este método recupera la siguiente fila de resultados de la consulta y la almacena 
// en la variable $r como un objeto estándar de PHP (stdClass) utilizando el modo PDO::FETCH_OBJ.





        // Metodo Obtener solo contraseña por el correo
        public function login2($cor,$contra)
        {
            try
            {
                $sql = "SELECT * FROM usuarios WHERE correo = ? AND contrasena = ?";

                $resul=  $this->conex->prepare($sql);

                $resul->execute(array(
                    $cor,
                    $contra
                    
                    )
                    );

                
                $r = $resul->fetch(PDO::FETCH_OBJ);

          

                if ($r) {
                    # code...


      $usuario = new UsuarioModel();

                $usuario->setId( $r->id);
                $usuario->setNombre( $r->nombre);
                $usuario->setCelular( $r->celular);
                $usuario->setCorreo($r->correo);
                $usuario->setPassword( $r->contraseña);
                $usuario->setCategoria( $r->categoria);







                    return $usuario;
                }else {
                    return null;
                }
                
            
            
            
            
            
            
            
            
            
            
            } 
            catch (Exception $e)
            {
                echo '<script>alert("Registro Fallido'.$this->conex.'"); </script>';
                return null;
                die($e->getMessage());
                
            }   
        }










    
// public function login(usuarioModel $data)
// {
//     try
//     {
//         $sql = "SELECT * FROM usuarios WHERE correo = ? AND contraseña = ?";
        
//         $this->conex->prepare($sql)->execute(array(
        
//         $data->getCorreo('correo'),
//         $data->getPassword('contraseña'),
        
//         )
//         );

//         return $login = true;
        
        
//     }   
//     catch (Exception $e)
//     {
//         die($e->getMessage());
        
        

//     }
// }


















    
public function Registrarpanel(usuarioModel $data)
{
    try
    {
        $sql = "INSERT INTO usuarios (nombre,celular,correo,contrasena,categoria) VALUES (  ?, ?,?,?,?)";
        
        $this->conex->prepare($sql)->execute(array(
        $data->getNombre('nombre'),
        $data->getCelular('celular'),
        $data->getCorreo('correo'),
        $data->getPassword('contrasena'),
        $data->getCategoria('categoria'),
        
        )
        );
         return $registroExitoso = true;
        
        
    }   
    catch (Exception $e)
    {
        die($e->getMessage());
        
        echo '<script>alert("Registro Fallido"); </script>';

    }
}






   


    
    public function Registrar(usuarioModel $data)
    {
        try
        {
            $sql = "INSERT INTO usuarios (nombre,celular,correo,contrasena) VALUES (  ?, ?,?,?)";
            
            $this->conex->prepare($sql)->execute(array(
            $data->getNombre('nombre'),
            $data->getCelular('celular'),
            $data->getCorreo('correo'),
            $data->getPassword('contrasena'),
            
            )
            );
           
             return $registroExitoso = true;
            
            
        }   
        catch (Exception $e)
        {
            die($e->getMessage());
            
            echo '<script>alert("Registro Fallido"); </script>';

        }
    }


































}


























?>













































