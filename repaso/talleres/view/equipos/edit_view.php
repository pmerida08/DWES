<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/edit.css">
    <title>Editar equipo <?= $data['id'] ?></title>
</head>

<body>
    <a href="/gestor/equipos" class="btn btn-primary">Volver</a>
    <form action="" method="POST">
        <h2>Editar equipo <?= $data['id'] ?></h2>
        <div class="form-group">
            <label for="codigo">
                Código:
                <input type="text" name="codigo" id="exampleInputCodigo1" class="form-control" value="<?= $data['codigo'] ?>">
            </label>
        </div>
        <div class="form-group">
            <label for="descripcion">
                Descripción:
                <input type="text" name="descripcion" id="exampleInputNumMesas1" class="form-control" value="<?= $data['descripcion'] ?>">
            </label>
        </div>
        <div class="form-group">
            <label for="referencia_ja">
                Referencia JA:
                <input type="text" name="referencia_ja" id="exampleInputAgrupamiento1" class="form-control" value="<?= $data['referencia_ja'] ?>">
            </label>
        </div>
        <div class="form-group">
            <label for="imagen">
                Imagen:
                <input type="text" name="imagen" id="exampleInputAgrupamiento1" class="form-control" value="<?= $data['imagen'] ?>">
            </label>
        </div>
        <div class="form-group">
            <label for="t_estados_id">
                Estado:
                <select name="t_estados_id" id="t_estados_id" class="form-control">
                    <option value="1">Operativo</option>
                    <option value="2">Roto</option>
                </select>
            </label>
        </div>
        <div class="form-group">
            <label for="created_at">
                Fecha de creación:
                <input type="date" name="created_at" id="exampleInputAgrupamiento1" class="form-control" value="<?= $data['created_at'] ?>">
            </label>
        </div>
        <div class="form-group">
            <label for="updated_at">
                Fecha de actualización:
                <input type="date" name="updated_at" id="exampleInputAgrupamiento1" class="form-control" value="<?= $data['updated_at'] ?>">
            </label>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Guardar</button>
    </form>
</body>

</html>