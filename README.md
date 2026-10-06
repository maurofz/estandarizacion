# Calculadora IMC - Versión PHP + HTMX

Aplicación web para calcular el Índice de Masa Corporal (IMC) usando PHP en el servidor y HTMX para interactividad sin JavaScript propio.

## Requisitos

- **PHP 8.0+** instalado y en el PATH del sistema
- Navegador web moderno
- Conexión a internet (para cargar Bootstrap y HTMX desde CDN)

## Instalación de PHP en Windows

### Opción 1: Chocolatey (recomendado)
```powershell
# Abrir PowerShell como Administrador
Set-ExecutionPolicy Bypass -Scope Process -Force
[System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072
iex ((New-Object System.Net.WebClient).DownloadString('https://community.chocolatey.org/install.ps1'))

# Instalar PHP
choco install php -y

# Verificar instalación
php -v
```

### Opción 2: Descarga manual
1. Ir a https://windows.php.net/download/
2. Descargar "VS16 x64 Thread Safe" (ZIP)
3. Extraer en `C:\php`
4. Renombrar `php.ini-development` a `php.ini`
5. En `php.ini` descomentar: `extension_dir = "ext"`
6. Agregar `C:\php` a la variable de entorno PATH del sistema
7. Reiniciar terminal y verificar con `php -v`

## Cómo probar la aplicación

1. **Clonar el repositorio y cambiar a la rama php-version:**
   ```powershell
   git clone <url-del-repo>
   cd estandarizacion
   git checkout php-version
   ```

2. **Iniciar el servidor PHP integrado:**
   ```powershell
   php -S localhost:8000
   ```
   *Se mostrará: `PHP 8.x.x Development Server (http://localhost:8000) started`*

3. **Abrir en el navegador:**
   - Ir a: http://localhost:8000/index.php
   - O desde PowerShell: `Start-Process "http://localhost:8000/index.php"`

4. **Usar la calculadora:**
   - Completar los 4 campos: Nombre, Edad, Peso (kg), Altura (m)
   - Pulsar "Calcular IMC" → la fila aparece en la tabla sin recargar la página
   - Repetir para agregar más personas
   - Pulsar "Eliminar" en una fila para borrarla
   - Pulsar "Limpiar Tabla" para borrar todos los registros

5. **Detener el servidor:**
   - En la terminal: `Ctrl + C`

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
| Backend | PHP 8 (built-in server) | Calcula, guarda en `$_SESSION`, devuelve HTML parcial |
| Persistencia | `$_SESSION` | Array `personas` en memoria del servidor (se pierde al reiniciar servidor) |

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
- **Sesión en memoria**: Los datos se pierden al reiniciar `php -S`
- **Primera carga**: Descarga Bootstrap/HTMX desde CDN (~200 KB)
- **Compatible**: Funciona en cualquier navegador moderno sin configuración extra