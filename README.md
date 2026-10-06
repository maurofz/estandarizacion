# Calculadora IMC - Versión Python (Brython)

Aplicación web para calcular el Índice de Masa Corporal (IMC) usando Python en el navegador mediante Brython.

## Requisitos

- Navegador web moderno (Chrome, Firefox, Edge, Safari)
- Conexión a internet (para descargar Brython desde CDN la primera vez)

## Cómo probar

1. **Clonar el repositorio y cambiar a la rama python-version:**
   ```bash
   git clone <url-del-repo>
   cd estandarizacion
   git checkout python-version
   ```

2. **Abrir la aplicación:**
   - Opción A: Doble clic en `vista_imc.html`
   - Opción B: Arrastrar `vista_imc.html` al navegador
   - Opción C: Desde terminal:
     ```bash
     # Linux
     xdg-open vista_imc.html
     
     # macOS
     open vista_imc.html
     
     # Windows
     start vista_imc.html
     ```

3. **Usar la calculadora:**
   - Completar los 4 campos: Nombre, Edad, Peso (kg), Altura (m)
   - Pulsar "Calcular IMC"
   - Ver el resultado en la tabla inferior
   - Repetir para agregar más personas
   - Usar "Eliminar" en una fila para borrarla
   - Usar "Limpiar Tabla" para borrar todos los registros

## Estructura del proyecto

```
estandarizacion/
├── vista_imc.html    # HTML + CSS + Python (Brython) - todo en un archivo
├── estilos.css       # Estilos personalizados
└── README.md         # Este archivo
```

## Notas técnicas

- La lógica está escrita en Python dentro de `<script type="text/python">` en `vista_imc.html`
- Brython compila Python a JavaScript en el navegador (no requiere instalación ni servidor)
- Primera carga: ~1-2 segundos mientras descarga Brython (~1 MB)
- Cargas posteriores: instantáneas (cache del navegador)
- Funciona offline después de la primera carga exitosa

## Categorías IMC (OMS)

| IMC | Categoría |
|-----|-----------|
| < 18.5 | Bajo peso |
| 18.5 - 24.9 | Peso normal |
| 25 - 29.9 | Sobrepeso |
| 30 - 34.9 | Obesidad Grado 1 |
| 35 - 39.9 | Obesidad Grado 2 |
| ≥ 40 | Obesidad Grado 3 |