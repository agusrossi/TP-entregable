<?php

class ViajeTerreste extends Viaje {
     private $comodidad;

     public function __construct($codigo, $destino, $cantMP, $pasajeros, $responsableV, $importe, $idaYVuelta, $comodidad) {
          parent::__construct($codigo, $destino, $cantMP, $pasajeros, $responsableV, $importe, $idaYVuelta);
          $this->comodidad = $comodidad;
     }


     public function getComodidad() {
          return $this->comodidad;
     }
     public function setComodidad($comodidad) {
          $this->comodidad = $comodidad;
     }

     public function __toString() {
          $cadena = parent::__toString();
          $cadena .= "\nComodidad: " . $this->getComodidad() . "\n";
          return $cadena;
     }

     public function venderPasaje($pasajero) {
          $importe = parent::venderPasaje($pasajero);
          if ($this->getComodidad() == "cama") {
               $importe += $importe * 0.25;
          }
          return $importe;
     }
}
