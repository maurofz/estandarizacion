# AGENTS.md

## Resumen del Proyecto
Calculadora de IMC simple — HTML/CSS/JS estático con Bootstrap 5.3.8 desde CDN.
- `vista_imc.html` — punto de entrada, carga `estilos.css` e `imc.js`
- `imc.js` — manejo del formulario, cálculo de IMC, clasificación por categorías, actualización de tabla en el DOM
- `estilos.css` — estilos mínimos para formulario y tabla de resultados

## Cómo Ejecutar
Abrir `vista_imc.html` directamente en el navegador (doble clic o protocolo `file://`). No requiere servidor.

## Convenciones Principales
- Etiquetas de UI y nombres de variables en español (`personas`, `calcularIMC`, `determinarCategoria`)
- Envío del formulario prevenido con `event.preventDefault()`; datos guardados en array global `personas`
- Clases de Bootstrap usadas junto a CSS personalizado
- Sin linting, formateo ni typechecking configurados

## Modificar la Calculadora
- Fórmula IMC: `peso / (altura * altura)` en `calcularIMC()`
- Categorías en `determinarCategoria()` — rangos estándar OMS
- Actualización de tabla vía `mostrarPersonas()` (re-renderiza todo el `<tbody>`)
- Eliminación usa índice de array — re-renderiza tras splice, índices se mantienen válidos

## Puntos a Tener en Cuenta
- Enlaces CDN tienen hashes de integridad; actualizar tanto URL como hash si se actualiza Bootstrap
- Sin paso de build — cambios son inmediatos al recargar
- Sin tests ni CI; verificar manualmente en navegador