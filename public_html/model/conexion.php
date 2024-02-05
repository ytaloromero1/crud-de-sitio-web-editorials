

<?php


class Conexion{
    private $host ="localhost";
    private $user ="id19809853_entregable";
    private $password ="entregable932651008@Y";
    private $bd ="id19809853_entregable";
    private $conexion;











    public function __construct() {
        try {
            $this->conexion = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->bd, $this->user, $this->password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo("biennnnnnn");
        } catch (Exception $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }








    // Getters
    public function getHost() {
        return $this->host;
    }

    public function getUser() {
        return $this->user;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getBD() {
        return $this->bd;
    }

    public function getConexion() {
        return $this->conexion;
    }

    // Setters
    public function setHost($host) {
        $this->host = $host;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setBD($bd) {
        $this->bd = $bd;
    }

    public function setConexion($conexion) {
        $this->conexion = $conexion;
    }
















}


























?>




































