<?php
$profesores = $data['profesores'];
$equipos = $data['equipos'];
$aulas = $data['aulas'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir reserva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/add.css">
</head>

<body>
    <a href="/gestor/reservas" class="btn btn-primary">Volver</a>
    <div class="container mt-5">
        <h2>Añadir Reserva</h2>
        <form action="/reservas/add" method="POST">
            <span class="text-danger"><?= isset($_SESSION['error']) ? $_SESSION['error'] : '' ?></span>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control">
            </div>
            <div class="mb-3">
                <label for="fecha_inicio" class="form-label">Fecha inicio</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control">
            </div>
            <div class="mb-3">
                <label for="fecha_final" class="form-label">Fecha fin</label>
                <input type="date" name="fecha_final" id="fecha_final" class="form-control">
            </div>
            <div class="mb-3">
                <label for="created_at" class="form-label">Creada a las: </label>
                <input type="time" name="created_at" id="created_at" class="form-control">
            </div>
            <div class="mb-3">
                <label for="updated_at" class="form-label">Modificado a las:</label>
                <input type="time" name="updated_at" id="updated_at" class="form-control">
            </div>
            <div class="mb-3">
                <label for="t_equipos_id" class="form-label
                ">Equipo</label>
                <select name="t_equipos_id" id="t_equipos_id" class="form-select">
                    <?php foreach ($equipos as $equipo) : ?>
                        <option value="<?php echo $equipo['id'] ?>"><?php echo $equipo['codigo'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="profesores_id" class="form-label">Profesor</label>
                <select name="profesores_id" id="profesores_id" class="form-select">
                    <?php foreach ($profesores as $profesor) : ?>
                        <option value="<?php echo $profesor['id'] ?>"><?php echo $profesor['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Añadir</button>
        </form>
    </div>

</body>

</html>