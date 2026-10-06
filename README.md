# Calculadora IMC - Versión PHP + HTMX

Aplicación web para calcular el Índice de Masa Corporal (IMC) usando PHP en el servidor y HTMX para interactividad sin JavaScript propio.

## Requisitos

- **XAMPP** instalado (Apache + PHP)
- Navegador web moderno
- Conexión a internet (para cargar Bootstrap y HTMX desde CDN)

## Instalación de XAMPP en Windows

1. Descargar XAMPP de https://www.apachefriends.org/es/download.html
2. Ejecutar el instalador y seleccionar al menos **Apache** y **PHP**
3. Completar la instalación (por defecto en `C:\xampp`)

## Cómo probar la aplicación

1. **Clonar el repositorio y cambiar a la rama php-version:**
   ```powershell
   git clone <url-del-repo>
   cd estandarizacion
   git checkout php-version
   ```

2. **Copiar el proyecto a la carpeta htdocs de XAMPP:**
   ```powershell
   # Opción A: Copiar carpeta completa
   Copy-Item -Path ".\estandarizacion" -Destination "C:\xampp\htdocs\" -Recurse -Force
   
   # Opción B: Si ya estás dentro de la carpeta del repo
   Copy-Item -Path "." -Destination "C:\xampp\htdocs\estandarizacion" -Recurse -Force
   ```

3. **Iniciar Apache desde XAMPP Control Panel:**
   - Abrir **XAMPP Control Panel** (acceso directo en Escritorio o Menú Inicio)
   - Pulsar **Start** en la fila **Apache**
   - Verificar que el módulo se pone verde con PID y Port (80, 443)

4. **Abrir en el navegador:**
   ```
   http://localhost/estandarizacion/index.php
   ```

5. **Usar la calculadora:**
   - Completar los 4 campos: Nombre, Edad, Peso (kg), Altura (m)
   - Pulsar "Calcular IMC" → la fila aparece en la tabla sin recargar la página
   - Repetir para agregar más personas
   - Pulsar "Eliminar" en una fila para borrarla
   - Pulsar "Limpiar Tabla" para borrar todos los registros

6. **Detener el servidor:**
   - En XAMPP Control Panel: pulsar **Stop** en Apache

## Estructura del proyecto

```
estandarizacion/
├── index.php           # Página principal (HTML + HTMX)
├── estilos.css         # Estilos personalizados
├── api/
│   ├── calcular.php    # Calcula IMC y devuelve <tr> nuevo
│   ├── eliminar.php    # Elimina una persona por índice
│   └── limpiar.php     # Vacía la sesión y devuelve fila vacía
├── AGENTS.md           # Instrucciones para agentes IA
└── README.md           # Este archivo
```

## Cómo funciona

| Componente | Tecnología | Qué hace |
|------------|------------|----------|
| Frontend | HTML + Bootstrap 5 + HTMX | UI, envía peticiones, actualiza DOM |
| Backend | PHP 8 (Apache) | Calcula, guarda en `$_SESSION`, devuelve HTML parcial |
| Persistencia | `$_SESSION` | Array `personas` en memoria del servidor (se pierde al reiniciar Apache) |

## Categorías IMC (OMS)

| IMC | Categoría |
|-----|-----------|
| < 18.5 | Bajo peso |
| 18.5 - 24.9 | Peso normal |
| 25 - 29.9 | Sobrepeso |
| 30 - 34.9 | Obesidad Grado 1 |
| 35 - 39.9 | Obesidad Grado 2 |
| ≥ 40 | Obesidad Grado 3 |

## Notas

- **Sin JavaScript propio**: HTMX maneja toda la interactividad (atributos `hx-*`)
- **Sesión en memoria**: Los datos se pierden al reiniciar Apache
- **Primera carga**: Descarga Bootstrap/HTMX desde CDN (~200 KB)
- **Rutas HTMX**: Usan rutas relativas (`api/calcular.php`) para funcionar bajo `http://localhost/estandarizacion/`
- **Compatible**: Funciona en cualquier navegador moderno sin configuración extra