
<?php include('../model/conexion.php') ?>







<?php


class mensajeController{


public $conex;


public function __construct() {
    $conexion = new Conexion();
    $this->conex = $conexion->getConexion(); // Obtener la conexión PDO
}













   // Metodo Obtener solo el registro del codigo
   public function Obtener($id)
   {
       try
       {


        $sql = "SELECT * FROM mensaje WHERE id = ?";

        $stm=  $this->conex->prepare($sql);

        $stm->execute(array($id));


           $r = $stm->fetch(PDO::FETCH_OBJ);

           $mensaje = new mensajeModel();

           $mensaje->setId( $r->id);
           $mensaje->setNombre( $r->nombre);
           $mensaje->setCelular( $r->celular);
           $mensaje->setCorreo($r->correo);
           $mensaje->setMensaje( $r->mensaje);
           $mensaje->setServicio( $r->servicio);
          return $mensaje;
          
          
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


































        // Metodo Eliminar
        public function Eliminar($id)
        {
            try
            {
 



                $sql = "DELETE FROM mensaje WHERE id = ?";

                $stm=  $this->conex->prepare($sql);

                $stm->execute(array($id));


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
              $stm = $this->conex->prepare("SELECT * FROM mensaje ORDER BY id DESC");
              // ejecutar consulta
              $stm->execute();
              // revisar los resultados
              foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                {
                    // Objeto Cliente
                  $mensaje = new mensajeModel();
                  // Asignar valores a los atributos
                  $mensaje->setId( $r->id);
                  $mensaje->setNombre( $r->nombre);
                  $mensaje->setCelular( $r->celular);
                  $mensaje->setCorreo($r->correo);
                  $mensaje->setMensaje( $r->mensaje);
                  $mensaje->setServicio( $r->servicio);


                  // el arreglo recibe datos del objeto
                  $arraymensaje[] = $mensaje;
                }
                // se acaba el for
                // devuelve el listado
                return $arraymensaje;
            }
            catch(Exception $e)
            {
                // si existe un error 
              die($e->getMessage());
            }
        }
































   


    
    public function Registrar(mensajeModel $data)
    {
        try
        {
            $sql = "INSERT INTO mensaje (nombre,celular,correo,mensaje,servicio) VALUES (  ?, ?,?,?,?)";
            
            $this->conex->prepare($sql)->execute(array(
            $data->getNombre('nombre'),
            $data->getCelular('celular'),
            $data->getCorreo('correo'),
           
            $data->getMensaje('mensaje'),
            $data->getServicio('servicio'),
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













































