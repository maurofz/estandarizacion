<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

$indice = (int)($_POST['indice'] ?? -1);

if (isset($_SESSION['personas'][$indice])) {
    unset($_SESSION['personas'][$indice]);
    $_SESSION['personas'] = array_values($_SESSION['personas']);
}

$personas = $_SESSION['personas'] ?? [];
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
            hx-post="../api/eliminar.php"
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