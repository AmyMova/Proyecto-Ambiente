<?php

function AbrirBD()
{
    $server = "127.0.0.1:3306";
    $user = "root";
    $password = "";
    $database = "rosayanil";
    return mysqli_connect($server, $user, $password, $database);
}

function CerrarBD($instancia)
{
    mysqli_close($instancia);
}

?>