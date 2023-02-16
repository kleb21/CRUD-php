<?php

session_start();


function conn() {
    
    $server = "localhost";
    $usuario="root";
    $contrasenia="";
    $bd="crud_php";

    $cnx = mysqli_connect($server,$usuario,$contrasenia,$bd);
    mysqli_select_db($cnx, $bd);
   
    // echo "conexion exitosa";

return $cnx;
}


?>