<?php
session_start();
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
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
