<?php
    $servidor="localhost";
    $usuario="root";
    $password="";
    $bd="listado";

    $conn = new mysqli($servidor, $usuario, $password, $bd);
    if($conn->connect_error){
        die("Error de Conexión: ".$conn->connect_error);
    }

    $sql = "SELECT * FROM lenguajes";
    $resultado=$conn->query($sql);

    $lenguajes = array();
    if($resultado->num_rows > 0){
        while($fila = $resultado->fetch_assoc()){
            $lenguajes[] = $fila;
        }
    }
    foreach($lenguajes as $lenguaje){
        echo $lenguaje["id"]. "º" . $lenguaje["nombre_de_lenguaje"] . " de " . $lenguaje["creador"] . "(" . $lenguaje["inicio"].")<br>";
    }
    $conn->close();

?>