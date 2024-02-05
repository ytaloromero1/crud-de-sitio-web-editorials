



<?php


class usuarioModel{
    public $id;
    public $nombre;
    public $celular ;
    public $correo;
    public $contra ;
    public $categoria ;
    



    public function __construct($id = null, $nombre = null, $celular = null, $correo = null, $password = null, $categoria = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->celular = $celular;
        $this->correo = $correo;
        $this->password = $password;
        $this->categoria = $categoria;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setCelular($celular) {
        $this->celular = $celular;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    // Getters
    public function getId() {
        return $this->id;
    }


    public function getNombre() {
        return $this->nombre;
    }

    public function getCelular() {
        return $this->celular;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getCategoria() {
        return $this->categoria;
    }







   



















}


























?>




























































































