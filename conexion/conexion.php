<?php
$usuarioBD = "root";
$passBD = "";
$ipBD = "localhost";
$nombreBD = "hospital";

function conBDOB()
{
    global $usuarioBD, $passBD, $ipBD, $nombreBD;

    $oConBD = new mysqli($ipBD, $usuarioBD, $passBD, $nombreBD);
    if ($oConBD->connect_error) {
        echo "Error al conectar a la base de datos: " . $oConBD->connect_error . "\n";
        return false;
    }
    echo "Conexión exitosa..." . "\n";
    return true;
}

conBDOB();
