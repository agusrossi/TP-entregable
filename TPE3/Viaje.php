<?php
class Viaje {
    private $codigo;
    private $destino;
    private $cantMaxPasajero;
    private $colPasajeros;
    private $responsableV;
    private $importe;
    private $idaYVuelta;

    public function __construct($codigo, $destino, $cantMP, $pasajeros, $responsableV, $importe, $idaYVuelta) {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantMaxPasajero = $cantMP;
        $this->colPasajeros = $pasajeros;
        $this->responsableV = $responsableV;
        $this->importe = $importe;
        $this->idaYVuelta = $idaYVuelta;
    }
    public function getCodigo() {
        return $this->codigo;
    }

    public function getDestino() {
        return $this->destino;
    }

    public function getCantMaxPasajeros() {
        return $this->cantMaxPasajero;
    }
    public function getColPasajeros() {
        return $this->colPasajeros;
    }

    public function setCodigo($cod) {
        $this->codigo = $cod;
    }
    public function setDestino($destino) {
        $this->destino = $destino;
    }
    public function setCantMaxPasajero($cantMaxPasajero) {
        $this->cantMaxPasajero = $cantMaxPasajero;
    }

    public function setColPasajeros($colPasajeros) {
        $this->colPasajeros = $colPasajeros;
    }
    public function getResponsableV() {
        return $this->responsableV;
    }

    public function setResponsableV($responsableV) {
        $this->responsableV = $responsableV;
    }

    public function getImporte() {
        return $this->importe;
    }
    public function setImporte($importe) {
        $this->importe = $importe;
    }

    public function getIdaYVuelta() {
        return $this->idaYVuelta;
    }

    public function setIdaYVuelta($idaYVuelta) {
        $this->idaYVuelta = $idaYVuelta;
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
        $pasajeros = $this->getColPasajeros();
        array_push($pasajeros, $nuevoPasajero);
        $this->setColPasajeros($pasajeros);
    }

    public function hayPasajeDisponible() {
        $disponible = false;
        if (count($this->getColPasajeros()) < $this->getCantMaxPasajeros()) {
            $disponible = true;
        }
        return $disponible;
    }

    public function venderPasaje($pasajero) {
        $importe = $this->getImporte();
        if ($this->hayPasajeDisponible()) {
            $this->agregarPasajero($pasajero);
            if ($this->getIdaYVuelta()) {
                $importe += ($importe * 0.5);
            }
            $this->setImporte($importe);
        }
        return $importe;
    }
}
