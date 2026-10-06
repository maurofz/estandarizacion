const personas = []

function calcularIMC(peso, altura) {
    const imc = peso / (altura * altura)
    return imc
}

function determinarCategoria(imc) {
    if (imc < 18.5) {
        return "Bajo peso"
    } else if (imc >= 18.5 && imc < 24.9) {
        return "Peso normal"
    } else if (imc >= 25 && imc < 29.9) {
        return "Sobrepeso"
    } else if (imc >= 30 && imc < 34.9) {
        return "Obesidad Grado 1"
    } else if (imc >= 35 && imc < 39.9) {
        return "Obesidad Grado 2"
    } else {
        return "Obesidad Grado 3"
    }
}

function mostrarPersonas() {
    const tabla = document.getElementById("tablaPersonas")
    tabla.innerHTML = ""

    if (personas.length === 0) {
        const filaVacia = document.createElement("tr")
        filaVacia.className = "fila-vacia"
        filaVacia.innerHTML = `<td colspan="7" class="text-center text-muted py-4">No hay registros aún</td>`
        tabla.appendChild(filaVacia)
        return
    }

    personas.forEach((persona, indice) => {
        const fila = document.createElement("tr")
        fila.innerHTML = `
            <td class="fw-medium">${persona.nombre}</td>
            <td>${persona.edad}</td>
            <td>${persona.peso}</td>
            <td>${persona.altura}</td>
            <td class="fw-bold text-primary">${persona.imc.toFixed(2)}</td>
            <td><span class="badge bg-secondary etiqueta">${persona.categoria}</span></td>
            <td class="text-center">
                <button type="button" class="btn btn-outline-danger btn-sm boton-eliminar" onclick="eliminarPersona(${indice})" title="Eliminar">
                    Eliminar
                </button>
            </td>
        `
        tabla.appendChild(fila)
    })
}

function eliminarPersona(indice) {
    personas.splice(indice, 1)
    mostrarPersonas()
}

function agregarPersona() {
    const nombre = document.getElementById("nombre").value.trim()
    const edad = parseInt(document.getElementById("edad").value)
    const peso = parseFloat(document.getElementById("peso").value)
    const altura = parseFloat(document.getElementById("altura").value)

    const imc = calcularIMC(peso, altura)
    const categoria = determinarCategoria(imc)

    if (!nombre || isNaN(edad) || isNaN(peso) || isNaN(altura)) {
        alert("Por favor, complete todos los campos correctamente.")
        return
    }

    const persona = {
        nombre: nombre,
        edad: edad,
        peso: peso,
        altura: altura,
        imc: imc,
        categoria: categoria
    }

    personas.push(persona)
    mostrarPersonas()
    document.getElementById("formulario").reset()
}

const calcular = document.getElementById("formulario")
calcular.addEventListener("submit", function(evento) {
    evento.preventDefault()
    agregarPersona()
})

const limpiar = document.getElementById("btnLimpiar")
limpiar.addEventListener("click", function() {
    personas.length = 0
    mostrarPersonas()
})