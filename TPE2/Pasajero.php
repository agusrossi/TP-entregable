<?php
class Pasajero {
    private $nombre;
    private $apellido;
    private $numDoc;
    private $telefono;

    public function __construct($nombre, $apellido, $numDoc, $telefono) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numDoc = $numDoc;
        $this->telefono = $telefono;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getNumDoc() {
        return $this->numDoc;
    }

    public function setNumDoc($numDoc) {
        $this->numDoc = $numDoc;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function __toString() {
        $cadena = "Nombre: " . $this->getNombre() . "\n Apellido: " . $this->getApellido() . "\n DNI: " . $this->getNumDoc() . "\n Telefono: " . $this->getTelefono();
        return $cadena;
    }
}
