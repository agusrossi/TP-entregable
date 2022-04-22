<?php
class Viaje {
    private $codigo;
    private $destino;
    private $cantMaxPasajero;
    private $colPasajeros;
    private $responsableV;

    function __construct($codigo, $destino, $cantMP, $pasajeros, $responsableV) {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantMaxPasajero = $cantMP;
        $this->colPasajeros = $pasajeros;
        $this->responsableV = $responsableV;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getDestino() {
        return $this->destino;
    }

    function getCantMaxPasajeros() {
        return $this->cantMaxPasajero;
    }
    function getColPasajeros() {
        return $this->colPasajeros;
    }

    function setCodigo($cod) {
        $this->codigo = $cod;
    }
    function setDestino($destino) {
        $this->destino = $destino;
    }
    function setCantMaxPasajero($cantMaxPasajero) {
        $this->cantMaxPasajero = $cantMaxPasajero;
    }

    function setColPasajeros($colPasajeros) {
        $this->colPasajeros = $colPasajeros;
    }
    public function getResponsableV() {
        return $this->responsableV;
    }

    public function setResponsableV($responsableV) {
        $this->responsableV = $responsableV;
    }

    function __toString() {
        $cadena = "\nDestino: " . $this->getDestino() . "\nCodigo: " . $this->getCodigo() . "\nCantidad maxima de pasajeros: " . $this->getCantMaxPasajeros() . "\nResponsable del viaje: " . $this->getResponsableV() . "\nPasajeros: \n" . implode("\n", $this->getColPasajeros());
        return $cadena;
    }

    public function stringPasajeros() {
        foreach ($this->getColPasajeros() as $pasajero) {
            echo $pasajero . "\n";
        }
    }
    function agregarPasajero($nuevoPasajero) {
        $exito = false;
        $pasajeros = $this->getColPasajeros();
        if (count($this->getColPasajeros()) < $this->getCantMaxPasajeros()) {
            array_push($pasajeros, $nuevoPasajero);
            $this->setColPasajeros($pasajeros);
            $exito = true;
        }
        return $exito;
    }
}
