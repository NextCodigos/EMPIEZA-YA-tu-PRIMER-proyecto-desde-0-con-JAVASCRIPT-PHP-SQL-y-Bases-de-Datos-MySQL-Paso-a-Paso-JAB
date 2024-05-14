Estructura de Directorios y Archivos

El proyecto está estructurado de la siguiente manera:

    js/: Contiene el archivo JavaScript que realiza una solicitud a select.
    php para obtener los datos de los lenguajes de programación que cumplen 
    ciertos criterios.
    php/: Contiene el archivo PHP que maneja la solicitud AJAX y realiza una
    consulta a una base de datos MySQL para obtener los datos de los lenguajes.
    index.html: Es la página principal del proyecto que carga el archivo JavaScript
    y muestra los datos obtenidos.

Funcionamiento

    index.html: Esta página web carga el archivo JavaScript index.js al final
    del cuerpo (<body>) utilizando la etiqueta <script src="js/index.js"></script>.
    No contiene contenido visible por sí misma.

    index.js: Este archivo JavaScript realiza una solicitud AJAX a select.php 
    utilizando la función fetch. Una vez que se reciben los datos en formato JSON,
    se recorren y se insertan en el cuerpo del documento HTML utilizando la función
    mostrar.

    select.php: Este archivo PHP establece una conexión a una base de datos MySQL y
    ejecuta una consulta para seleccionar los lenguajes de programación que cumplen
    ciertos criterios (por ejemplo, aquellos que iniciaron antes del año 2000 y cuyo 
    nombre comienza con "Jav"). Luego, devuelve los resultados en formato JSON.
