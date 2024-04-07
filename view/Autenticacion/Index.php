<?php
session_start();
$_SESSION["IdUsuario"] = "1";
$_SESSION["IdRol"] = "2";
$_SESSION["NombreUsuario"] = "Amy";
$_SESSION["ApellidoUsuario"] = "Moreno";
$_SESSION["CorreoElectronico"] = "amymix2014@gmail.com";
$_SESSION["Imagen"] = "sinPerfil.png";
//Roles= 1:Admin, 2:Cliente, 3:Vendedor*/
switch ($_SESSION["IdRol"]) {
  case "1":
    header("Location:../Admin/Principal.php");
    break;
  case "2":
    header("Location:../Cliente/Catalogo.php");
    break;
  case "3":
    header("Location:../Vendedor/Principal.php");
    break;
}
