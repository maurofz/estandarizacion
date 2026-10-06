<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

$nombre = trim($_POST['nombre'] ?? '');
$edad = (int)($_POST['edad'] ?? 0);
$peso = (float)($_POST['peso'] ?? 0);
$altura = (float)($_POST['altura'] ?? 0);

if (!$nombre || !$edad || !$peso || !$altura) {
    echo '<tr><td colspan="7" class="text-danger text-center">Por favor, complete todos los campos correctamente.</td></tr>';
    exit;
}

$imc = $peso / ($altura * $altura);

if ($imc < 18.5) {
    $categoria = "Bajo peso";
} elseif ($imc < 24.9) {
    $categoria = "Peso normal";
} elseif ($imc < 29.9) {
    $categoria = "Sobrepeso";
} elseif ($imc < 34.9) {
    $categoria = "Obesidad Grado 1";
} elseif ($imc < 39.9) {
    $categoria = "Obesidad Grado 2";
} else {
    $categoria = "Obesidad Grado 3";
}

if (!isset($_SESSION['personas'])) {
    $_SESSION['personas'] = [];
}

$_SESSION['personas'][] = [
    'nombre' => $nombre,
    'edad' => $edad,
    'peso' => $peso,
    'altura' => $altura,
    'imc' => $imc,
    'categoria' => $categoria
];

$personas = $_SESSION['personas'];
?>
<?php if (empty($personas)): ?>
<tr class="fila-vacia">
  <td colspan="7" class="text-center text-muted py-4">No hay registros aún</td>
</tr>
<?php else: ?>
<?php foreach ($personas as $indice => $persona): ?>
<tr>
  <td class="fw-medium"><?= htmlspecialchars($persona['nombre']) ?></td>
  <td><?= $persona['edad'] ?></td>
  <td><?= $persona['peso'] ?></td>
  <td><?= $persona['altura'] ?></td>
  <td class="fw-bold text-primary"><?= number_format($persona['imc'], 2) ?></td>
  <td><span class="badge bg-secondary etiqueta"><?= $persona['categoria'] ?></span></td>
  <td class="text-center">
    <button class="btn btn-outline-danger btn-sm boton-eliminar"
            hx-post="api/eliminar.php"
            hx-vals='{"indice": <?= $indice ?>}'
            hx-target="#tablaPersonas"
            hx-swap="innerHTML"
            title="Eliminar">
      Eliminar
    </button>
  </td>
</tr>
<?php endforeach; ?>
<?php endif; ?>