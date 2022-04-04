<?php
include "Viaje.php";

function cargarPasajeros()
{
    $pasajeros[0] = [
        "nombre" => "pepe", "apellido" => "perez", "dni" => random_int(10000, 50000000)
    ];

    $pasajeros[1] = [
        "nombre" => "guido", "apellido" => "di fiore", "dni" => random_int(10000, 50000000)
    ];

    $pasajeros[2] = [
        "nombre" => "agustina", "apellido" => "rossi", "dni" => random_int(10000, 50000000)
    ];

    $pasajeros[3] = [
        "nombre" => "horacio", "apellido" => "gonzalez", "dni" => random_int(10000, 50000000)
    ];

    $pasajeros[4] = [
        "nombre" => "malena", "apellido" => "reza", "dni" => random_int(10000, 50000000)
    ];



    return $pasajeros;
}


function cargarViaje()
{
    echo "Ingrese el codigo de viaje \n";
    $cod = trim(fgets(STDIN));
    echo "Ingrese el destino de viaje \n";
    $destino = trim(fgets(STDIN));
    echo "Ingrese la cantidad max de pasajeros que pueden viajar \n";
    $cantMax = trim(fgets(STDIN));

    $pasajeros = cargarPasajeros();
    $viaje = new Viaje($cod, $destino, $cantMax, []);
    $i = 0;
    while ($i < count($pasajeros) && $viaje->agregarPasajero($pasajeros[$i])) {
        $i++;
    }
    return $viaje;
}


function opcionesMenu()
{
    echo 'Bienvenido a "Viaje Feliz" !!' . "\n";
    echo "Elija una opcion del menú \n";
    echo "1- cargar informacion del viaje \n";
    echo "2- modificar informacion del viaje \n";
    echo "3- ver datos del viaje \n";
    echo "0- salir del menu\n";
    $opc = trim(fgets(STDIN));
    return $opc;
}

function elegirViaje($colViaje)
{
    echo "elija el viaje\n";
    for ($i = 0; $i < count($colViaje); $i++) {
        $viaje = $colViaje[$i];
        echo "opcion {$i} para el viaje a {$viaje->getDestino()}\n";
    }
    $respuesta = trim(fgets(STDIN));
    return $respuesta;
}
function elegirPasajero($colViaje, $opcion)
{
    $viaje = $colViaje[$opcion];
    echo "elija el pasajero del que desea cambiar los datos\n";
    $i = 0;
    $pasajero = $viaje->getColPasajeros();
    for ($i = 0; $i < count($pasajero); $i++) {
        echo ($i . " nombre:" . $pasajero[$i]["nombre"] . " apellido:" . $pasajero[$i]["apellido"] . " dni:" . $pasajero[$i]["dni"] . "\n");
    }

    $res = trim(fgets(STDIN));
    return $res;
}

function menu()
{
    $colViaje = [];
    do {
        $opc = opcionesMenu();
        switch ($opc) {
            case 1:
                $viaje = cargarViaje();
                array_push($colViaje, $viaje);;
                break;

            case 2:
                echo "1- modificar datos pasajeros\n";
                echo "2- modificar datos del viaje\n";
                echo "3- agregar otro pasajero\n";
                $respuesta = trim(fgets(STDIN));
                $exito = false;
                $posViaje = elegirViaje($colViaje);
                $viaje = $colViaje[$posViaje];
                switch ($respuesta) {
                    case 1:
                        $pasajero = elegirPasajero($colViaje, $posViaje);
                        echo "que desea modificar?\n";
                        echo "1- apellido\n";
                        echo "2- nombre \n";
                        echo "3- dni \n";
                        $respuesta = trim(fgets(STDIN));
                        switch ($respuesta) {
                            case 1:
                                echo "ingrese el nuevo apellido\n";
                                $apellido = trim(fgets(STDIN));
                                $viaje->setApellidoPasajero($apellido, $pasajero);
                                break;
                            case 2:
                                echo "ingrese el nuevo nombre\n";
                                $nombre = trim(fgets(STDIN));
                                $viaje->setNombrePasajero($nombre, $pasajero);
                            case 3:
                                echo "ingrese el nuevo dni\n";
                                $dni = trim(fgets(STDIN));
                                $viaje->setDniPasajero($dni, $pasajero);
                        }
                        break;
                    case 2:
                        echo "Modificar:\n";
                        echo "1) Codigo\n";
                        echo "2) Destino\n";
                        echo "3) Cantidad máxima de pasajeros\n";
                        echo "Opción: ";
                        $opcion = trim(fgets(STDIN));
                        switch ($opcion) {
                            case 1:
                                echo "Nuevo código: ";
                                $codigo = trim(fgets(STDIN));
                                $viaje->setCodigo($codigo);
                                break;
                            case 2:
                                echo "Nuevo destino: ";
                                $destino = trim(fgets(STDIN));
                                $viaje->setDestino($destino);
                                break;
                            case 1:
                                echo "Nuevo código: ";
                                $cMax = trim(fgets(STDIN));
                                $viaje->setCantMaxPasajero($cMax);
                                break;
                            default:
                                echo "Opcion incorrecta";
                        }
                        break;
                    case 3:
                        echo "ingrese el nombre del pasajero\n";
                        $n = trim(fgets(STDIN));
                        echo "ingrese el apellido del pasajero\n";
                        $a = trim(fgets(STDIN));
                        echo "ingrese el dni del pasajero\n";
                        $d = trim(fgets(STDIN));
                        $nuevoPasajero = ["nombre" => $n, "apellido" => $a, "dni" => $d];
                        if ($viaje->agregarPasajero($nuevoPasajero)) {
                            echo "el pasajero se ingreso con exito";
                        } else {
                            echo "no se pudo ingresar, el viaje esta lleno\n";
                        }

                        break;
                    default:
                        echo "respuesta incorrecta";
                };
                break;
            case 3:
                foreach ($colViaje as $viaje) {
                    echo $viaje . "\n";
                }
                break;
        }
    } while ($opc != 0);
}

menu();
