fetch('php/select.php')
.then(respuesta => respuesta.json())
.then(valor => valor.forEach(mostrar))
.catch(error => console.log(`Error: ${error}`))

function mostrar(lenguaje) {
    document.querySelector("body").insertAdjacentHTML("beforeend", 
        lenguaje["id"] + "º " + lenguaje["lenguaje"] + " de " + lenguaje["creador"] + " (" + lenguaje["inicio"] + ")<br>")
    
}