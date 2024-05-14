<?php
// Configuración de la conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$password = "";
$bd = "listado";

// Estableciendo la conexión a la base de datos
$conn = new mysqli($servidor, $usuario, $password, $bd);
if ($conn->connect_error) {
    die("Error de Conexión: " . $conn->connect_error);
}

// Consulta SQL para seleccionar todos los registros de la tabla "lenguajes"
// $sql = "SELECT id, nombre_de_lenguaje AS lenguaje, creador, inicio FROM lenguajes WHERE inicio<2000 ORDER BY inicio ASC";

// $sql = "SELECT id, nombre_de_lenguaje AS lenguaje, creador, inicio FROM lenguajes WHERE inicio<2000 ORDER BY inicio DESC, lenguaje ASC LIMIT 4 OFFSET 1";

// $sql = "SELECT id, nombre_de_lenguaje AS lenguaje, creador, inicio FROM lenguajes WHERE inicio<2000 AND nombre_de_lenguaje='Java' ORDER BY inicio DESC, lenguaje ASC ";

// Con Java% que empiece por Java y los que sea
// $sql = "SELECT id, nombre_de_lenguaje AS lenguaje, creador, inicio FROM lenguajes WHERE inicio<2000 AND nombre_de_lenguaje LIKE 'Java%' ORDER BY inicio DESC, lenguaje ASC ";

// Con Jav_ que empiece por Jav y despues un caracter
$sql = "SELECT id, nombre_de_lenguaje AS lenguaje, creador, inicio FROM lenguajes WHERE inicio<2000 AND nombre_de_lenguaje LIKE 'Jav_' ORDER BY inicio DESC, lenguaje ASC ";

// Ejecutar la consulta
$resultado = $conn->query($sql);

// Crear un array para almacenar los resultados de la consulta
$lenguajes = array();

// Verificar si hay resultados y almacenarlos en el array
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $lenguajes[] = $fila;
    }
}

// Recorrer el array de lenguajes y mostrar la información
foreach ($lenguajes as $lenguaje) {
    // Mostrar el nombre del lenguaje, su creador y año de inicio
    echo $lenguaje["id"] . "º" . $lenguaje["lenguaje"] . " de " . $lenguaje["creador"] . "(" . $lenguaje["inicio"] . ")<br>";
}

// Cerrar la conexión a la base de datos
$conn->close();
