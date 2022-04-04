<?php
class Viaje
{
    private $codigo;
    private $destino;
    private $cantMaxPasajero;
    private $colPasajeros;

    function __construct($codigo, $destino, $cantMP, $pasajeros)
    {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantMaxPasajero = $cantMP;
        $this->colPasajeros = $pasajeros;
    }

    function getCodigo()
    {
        return $this->codigo;
    }

    function getDestino()
    {
        return $this->destino;
    }

    function getCantMaxPasajeros()
    {
        return $this->cantMaxPasajero;
    }
    function getColPasajeros()
    {
        return $this->colPasajeros;
    }
   
    function setCodigo($cod)
    {
        $this->codigo = $cod;
    }
    function setDestino($destino)
    {
        $this->destino = $destino;
    }
    function setCantMaxPasajero($cantMaxPasajero)
    {
        $this->cantMaxPasajero = $cantMaxPasajero;
    }

    function setColPasajero($colPasajeros)
    {
        $this->colPasajeros = $colPasajeros;
    }
    function agregarPasajero($nuevoPasajero)
    {
        $exito = false;
        $pasajeros = $this->getColPasajeros();
        if (count($this->getColPasajeros()) < $this->getCantMaxPasajeros()) {
            array_push($pasajeros, $nuevoPasajero);
            $this->setColPasajero($pasajeros);
            $exito = true;
        }
        return $exito;
    }

    function setApellidoPasajero($apellido, $pos)
    {
        $pasajeros = $this->getColPasajeros();
        $pasajeros[$pos]["apellido"] = $apellido;
        $this->setColPasajero($pasajeros);
    }
    function setNombrePasajero($nombre, $pos)
    {
        $pasajeros = $this->getColPasajeros();
        $pasajeros[$pos]["nombre"] = $nombre;
        $this->setColPasajero($pasajeros);
    }
    function setDniPasajero($dni, $pos)
    {
        $pasajeros = $this->getColPasajeros();
        $pasajeros[$pos]["dni"] = $dni;
        $this->setColPasajero($pasajeros);
    }
    function __toString()
    {
        $stringPasajeros = "";
            for ($i = 0; $i < count($this->getColPasajeros()); $i++) {
            $stringPasajeros = $stringPasajeros . "nombre y apellido: " . $this->getColPasajeros()[$i]["nombre"] . "  " . $this->getColPasajeros()[$i]["apellido"] . "  dni: " . $this->getColPasajeros()[$i]["dni"] . "\n";
        }
        return ("el viaje con destino a {$this->getDestino()} codigo: {$this->getCodigo()} con cant maxima de pasajeros: {$this->getCantMaxPasajeros()} y los pasajeros son: \n{$stringPasajeros}");
    }
}
