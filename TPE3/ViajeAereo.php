<?php

class ViajeAereo extends Viaje {
  private $numVuelo;
  private $primeraClase;
  private $aerolinea;
  private $cantidadEscala;

  public function __construct($codigo, $destino, $cantMP, $pasajeros, $responsableV, $importe, $idaYVuelta, $numVuelo, $primeraClase, $aerolinea, $cantidadEscala) {
    parent::__construct($codigo, $destino, $cantMP, $pasajeros, $responsableV, $importe, $idaYVuelta);
    $this->numVuelo = $numVuelo;
    $this->primeraClase = $primeraClase;
    $this->aerolinea = $aerolinea;
    $this->cantidadEscala = $cantidadEscala;
  }


  public function getNumVuelo() {
    return $this->numVuelo;
  }
  public function setNumVuelo($numVuelo) {
    $this->numVuelo = $numVuelo;
  }

  public function getPrimeraClase() {
    return $this->primeraClase;
  }
  public function setPrimeraClase($primeraClase) {
    $this->primeraClase = $primeraClase;
  }

  public function getAerolinea() {
    return $this->aerolinea;
  }
  public function setAerolinea($aerolinea) {
    $this->aerolinea = $aerolinea;
  }

  public function getCantidadEscala() {
    return $this->cantidadEscala;
  }
  public function setCantidadEscala($cantidadEscala) {
    $this->cantidadEscala = $cantidadEscala;
  }

  public function __toString() {
    $primeraClase = "no";
    if ($this->getPrimeraClase()) {
      $primeraClase = "si";
    }
    $cadena = parent::__toString();
    $cadena .= "\nNumero de Vuelo:" . $this->getNumVuelo() . "\nPrimera clase: " . $primeraClase . "\nAerolinea: " . $this->getAerolinea() . "\nCantidad de escalas: " .  $this->getCantidadEscala();
    return $cadena;
  }

  public function venderPasaje($pasajero) {
    $importe = parent::venderPasaje($pasajero);
    if ($this->getPrimeraClase()) {
      if ($this->getCantidadEscala() == 0) {
        $importe += $importe * 0.40;
      } else {
        $importe += $importe * 0.60;
      }
      $this->setImporte($importe);
    }
    return $importe;
  }
}
