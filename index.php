<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Calculadora IMC</title>
    <link rel="stylesheet" href="estilos.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
    <script src="https://unpkg.com/htmx.org@1.9.10"></script>
  </head>
  <body class="bg-light min-vh-100 d-flex align-items-center py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
          
          <header class="text-center mb-4">
            <h1 class="display-5 fw-bold text-primary">Calculadora de IMC</h1>
          </header>

          <div class="card shadow-sm mb-4 tarjeta">
            <div class="card-header bg-primary text-white tarjeta-encabezado">
              <h5 class="mb-0">Nuevo Registro</h5>
            </div>
            <div class="card-body tarjeta-cuerpo">
              <form hx-post="api/calcular.php" hx-target="#tablaPersonas" hx-swap="innerHTML" class="needs-validation" novalidate>
                <div class="row g-3">
                  <div class="col-12 col-md-6">
                    <label for="nombre" class="form-label fw-medium etiqueta-formulario">Nombre</label>
                    <input type="text" class="form-control campo-formulario" id="nombre" name="nombre" required placeholder="Juan Pérez" />
                    <div class="invalid-feedback">Por favor ingrese un nombre</div>
                  </div>
                  
                  <div class="col-12 col-md-6">
                    <label for="edad" class="form-label fw-medium etiqueta-formulario">Edad</label>
                    <input type="number" class="form-control campo-formulario" id="edad" name="edad" required min="1" max="120" placeholder="25" />
                    <div class="invalid-feedback">Edad entre 1 y 120 años</div>
                  </div>
                  
                  <div class="col-12 col-md-6">
                    <label for="peso" class="form-label fw-medium etiqueta-formulario">Peso (kg)</label>
                    <input type="number" class="form-control campo-formulario" id="peso" name="peso" required min="1" max="300" step="0.1" placeholder="70.5" />
                    <div class="invalid-feedback">Peso entre 1 y 300 kg</div>
                  </div>
                  
                  <div class="col-12 col-md-6">
                    <label for="altura" class="form-label fw-medium etiqueta-formulario">Altura (m)</label>
                    <input type="number" class="form-control campo-formulario" id="altura" name="altura" required min="0.50" max="2.50" step="0.01" placeholder="1.75" />
                    <div class="invalid-feedback">Altura entre 0.50 y 2.50 m</div>
                  </div>
                </div>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                  <button type="submit" class="btn btn-primary btn-lg px-4 boton boton-principal">
                    Calcular IMC
                  </button>
                </div>
              </form>
            </div>
          </div>

          <div class="card shadow-sm tarjeta">
            <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center tarjeta-encabezado">
              <h5 class="mb-0">Resultados</h5>
              <button type="button" hx-post="api/limpiar.php" hx-target="#tablaPersonas" hx-swap="innerHTML" class="btn btn-outline-light btn-sm boton boton-esquema-claro boton-pequeno">
                Limpiar Tabla
              </button>
            </div>
            <div class="card-body p-0 tarjeta-cuerpo">
              <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 tabla-datos" id="resultado">
                  <thead class="table-dark encabezado-oscuro">
                    <tr>
                      <th>Usuario</th>
                      <th>Edad</th>
                      <th>Peso (kg)</th>
                      <th>Altura (m)</th>
                      <th>IMC</th>
                      <th>Categoría</th>
                      <th class="text-center">Acción</th>
                    </tr>
                  </thead>
                  <tbody id="tablaPersonas">
                    <tr class="fila-vacia">
                      <td colspan="7" class="text-center text-muted py-4">No hay registros aún</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="text-center text-muted small mt-3">
            <p class="mb-1">Categorías OMS: Bajo peso < 18.5 | Normal 18.5-24.9 | Sobrepeso 25-29.9 | Obesidad ≥ 30</p>
          </div>

        </div>
      </div>
    </div>
    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
  </body>
</html>