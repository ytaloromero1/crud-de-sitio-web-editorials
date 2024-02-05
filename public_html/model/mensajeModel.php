



<?php


class mensajeModel{
    public $id;
    public $nombre;
    public $celular;
    public $correo;
    public $mensaje;
    public $servicio;

    public function __construct($id = null, $nombre = null, $celular = null, $correo = null, $mensaje = null, $servicio = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->celular = $celular;
        $this->correo = $correo;
        $this->mensaje = $mensaje;
        $this->servicio = $servicio;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setCelular($celular) {
        $this->celular = $celular;
    }

    public function getCelular() {
        return $this->celular;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function setMensaje($mensaje) {
        $this->mensaje = $mensaje;
    }

    public function getMensaje() {
        return $this->mensaje;
    }

    public function setServicio($servicio) {
        $this->servicio = $servicio;
    }

    public function getServicio() {
        return $this->servicio;
    }

















}


























?>

















