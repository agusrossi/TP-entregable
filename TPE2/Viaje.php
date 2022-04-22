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

    function setColPasajero($colPasajeros) {
        $this->colPasajeros = $colPasajeros;
    }
    public function getResponsableV() {
        return $this->responsableV;
    }

    public function setResponsableV($responsableV) {
        $this->responsableV = $responsableV;
    }

    function __toString() {
        $stringPasajeros = "";
        for ($i = 0; $i < count($this->getColPasajeros()); $i++) {
            $stringPasajeros = $stringPasajeros . "nombre y apellido: " . $this->getColPasajeros()[$i]["nombre"] . "  " . $this->getColPasajeros()[$i]["apellido"] . "  dni: " . $this->getColPasajeros()[$i]["dni"] . "\n";
        }
        return ("el viaje con destino a {$this->getDestino()} codigo: {$this->getCodigo()} con cant maxima de pasajeros: {$this->getCantMaxPasajeros()} y los pasajeros son: \n{$stringPasajeros}");
    }
    

    function agregarPasajero($nuevoPasajero) {
        $exito = false;
        $pasajeros = $this->getColPasajeros();
        if (count($this->getColPasajeros()) < $this->getCantMaxPasajeros()) {
            array_push($pasajeros, $nuevoPasajero);
            $this->setColPasajero($pasajeros);
            $exito = true;
        }
        return $exito;
    }
}
