<?php
// Configuración de la conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$password = "";
$bd = "listado";

// Estableciendo la conexión a la base de datos
$conn = new mysqli($servidor, $usuario, $password, $bd);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    // Si hay un error en la conexión, mostrar mensaje de error y terminar la ejecución
    die("Error de Conexión: " . $conn->connect_error);
}

// Consulta SQL para seleccionar todos los registros de la tabla "lenguajes"
// y filtrar aquellos lenguajes que iniciaron antes del año 2000 y cuyo nombre
// comienza con "Jav" y tiene una letra adicional (patrón "Jav_")
$sql = "SELECT id, nombre_de_lenguaje AS lenguaje, creador, inicio FROM lenguajes WHERE inicio<2000 AND nombre_de_lenguaje LIKE 'Jav%' ORDER BY inicio DESC, lenguaje ASC ";

// Ejecutar la consulta
$resultado = $conn->query($sql);

// Crear un array para almacenar los resultados de la consulta
$lenguajes = array();

// Verificar si hay resultados y almacenarlos en el array
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        // Almacenar cada fila de resultados en el array de lenguajes
        $lenguajes[] = $fila;
    }
}

// Recorrer el array de lenguajes y mostrar la información
// foreach ($lenguajes as $lenguaje) {
//     // Mostrar el nombre del lenguaje, su creador y año de inicio
//     echo $lenguaje["id"] . "º" . $lenguaje["lenguaje"] . " de " . $lenguaje["creador"] . "(" . $lenguaje["inicio"] . ")<br>";
// }
// Queremos con javascript enviar informacion




// Cerrar la conexión a la base de datos
$conn->close();
header('Content-type:application/json');
echo json_encode($lenguajes);

?>