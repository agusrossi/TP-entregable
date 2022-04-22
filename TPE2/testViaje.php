<?php
include_once "Viaje.php";
include_once "Pasajero.php";
include_once "ResponsableV.php";

function cargarPasajeros() {
    $pasajeros = [
        new Pasajero("guido", "di fiore", 40899313, 2321),
        new Pasajero("agustina", "rossi", 40614534, 1234),
        new Pasajero("malena", "reza", 35211678, 7451),
        new Pasajero("maria", "perez", 40862673, 983600),
        new Pasajero("pepe", "perez", 35862673, 983665),
        new Pasajero("cata", "perez", 22862673, 983652),
        new Pasajero("marco", "perez", 70862673, 983659),
        new Pasajero("dante", "perez", 60862673, 983670),

    ];

    return $pasajeros;
}
function cargaResponsable() {
    $responsable = [
        new ResponsableV(1, 45, "pedro", "picapiedra"),
        new ResponsableV(2, 145, "marcos", "piedrabuena"),
        new ResponsableV(3, 135, "jose", "pasos"),
        new ResponsableV(4, 450, "enrique", "lopez"),
        new ResponsableV(5, 10, "alfredo", "helados"),
        new ResponsableV(6, 45, "matias", "ale")
    ];
    return $responsable;
}



function cargarViaje($destino) {

    $cod = random_int(0, 999999);
    $cantMax = random_int(0, 100);
    $pasajeros = cargarPasajeros();
    $responsables = cargaResponsable();
    $resposableV = $responsables[random_int(0, 5)];
    $viaje = new Viaje($cod, $destino, $cantMax, $pasajeros, $resposableV);
    return $viaje;
}
function cargarViajeAux() {
    echo "Ingrese el destino de viaje \n";
    $destino = trim(fgets(STDIN));
    $viaje = cargarViaje($destino);
    return $viaje;
}

function opcionesMenu() {
    echo 'Bienvenido a "Viaje Feliz" !!' . "\n";
    echo "Elija una opcion del menú \n";
    echo "1- cargar informacion del viaje \n";
    echo "2- modificar informacion del viaje \n";
    echo "3- ver datos del viaje \n";
    echo "0- salir del menu\n";
    $opc = trim(fgets(STDIN));
    return $opc;
}

function elegirViaje($colViajes) {
    echo "elija el viaje\n";
    $i = 0;
    foreach ($colViajes as $viaje) {
        echo $i . " - " . $viaje->getDestino() . "\n";
    }
    $respuesta = trim(fgets(STDIN));
    return $respuesta;
}


function elegirPasajero($viaje) {
    $pasajeros = $viaje->getColPasajeros();
    echo "Ingrese dni del pasajero que desea cambiar\n";
    $dni = trim(fgets(STDIN));
    $i = 0;
    $pasajero = null;
    while ($i < count($pasajeros) && $pasajero != null) {
        if ($pasajeros[$i]->getDni() == $dni) {
            $pasajero = $pasajeros[$i];
        }
        $i++;
    }
    return $pasajero;
}

function menu() {
    $colViajes = [cargarViaje("bariloche"), cargarViaje("bahia blanca")];

    do {
        $opc = opcionesMenu();
        switch ($opc) {
            case 1:
                //cargar viajes
                $viaje = cargarViajeAux();
                array_push($colViajes, $viaje);
                break;

            case 2:
                //modificar informacion del viaje


            case 3:
                //mostrar informacion del viaje
                foreach ($colViajes as $viaje) {
                    echo $viaje;
                }
                break;
        }
    } while ($opc != 0);
}


function modificarPasajero($viaje) {
    $pasajero = elegirPasajero($viaje);
    if ($pasajero != null) {
        echo "que desea modificar?\n";
        echo "1- apellido\n";
        echo "2- nombre \n";
        echo "3- dni \n";
        $respuesta = trim(fgets(STDIN));
        switch ($respuesta) {
            case 1:
                echo "ingrese el nuevo apellido\n";
                $apellido = trim(fgets(STDIN));
                $pasajero->setApellido($apellido);
                break;
            case 2:
                echo "ingrese el nuevo nombre\n";
                $nombre = trim(fgets(STDIN));
                $pasajero->setNombre($nombre);
                break;
            case 3:
                echo "ingrese el nuevo dni\n";
                $dni = trim(fgets(STDIN));
                $pasajero->setDni($dni);
                break;
        }
    } else {
        echo "Pasajero inexistente";
    }
}


function modificarViaje($viaje) {
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
        case 3:
            echo "Nueva cantidad maxima de pasajeros: ";
            $cMax = trim(fgets(STDIN));
            $viaje->setCantMaxPasajero($cMax);
            break;
        default:
            echo "Opcion incorrecta";
    }
}

function agregarPasajero($viaje) {
    echo "ingrese el nombre del pasajero\n";
    $nombre = trim(fgets(STDIN));
    echo "ingrese el apellido del pasajero\n";
    $apellido = trim(fgets(STDIN));
    echo "ingrese el dni del pasajero\n";
    $dni = trim(fgets(STDIN));
    echo "ingrese el telefono del pasajero\n";
    $tel = trim(fgets(STDIN));
    $nuevoPasajero = new Pasajero($nombre, $apellido, $dni, $tel);
    if ($viaje->agregarPasajero($nuevoPasajero)) {
        echo "el pasajero se ingreso con exito";
    } else {
        echo "no se pudo ingresar, el viaje esta lleno\n";
    }
}
function modificarDatos($colViajes, $respuesta) {
    echo "1- modificar datos pasajeros\n";
    echo "2- modificar datos del viaje\n";
    echo "3- agregar otro pasajero\n";
    $respuesta = trim(fgets(STDIN));
    $exito = false;
    $posViaje = elegirViaje($colViajes);
    $viaje = $colViajes[$posViaje];
    switch ($respuesta) {
        case 1:
            modificarPasajero($viaje);
            break;
        case 2:
            modificarViaje($viaje);
            break;
        case 3:

            break;
        default:
            echo "respuesta incorrecta";
    };
    break;
}
menu();
