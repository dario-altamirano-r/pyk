<?php

function openConnection() {
    $dbhost = "localhost";
    $dbuser = "admin";
    $dbpass = "1234";
    $db = "prueba";

    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexión fallida: %s\n". $conn -> error);

    return $conn;
}
 
function closeConnection($conn) {
    $conn -> close();
}
   
?>