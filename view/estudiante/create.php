<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/tallerphp16/routes.php');
    require_once(CONTROLLER_PATH.'estudianteController.php');
    $object = new estudianteController();
    $cursos = $object->combolist();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM PHP</title>
    <?php
        require_once(ROOT_PATH.'header.php');
    ?>
</head>

<body>
    <?php
        require_once(VIEW_PATH.'navbar/navbar.php');
    ?>
    <div class="container">
        <div class="container">
            <h2>Agregando nuevo registro</h2>
        </div>
        <form id="formPersona" action="store.php" method="post" class="g-3 needs-validation" novalidate>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" autofocus required>
                <div class="invalid-feedback">Ingrese un nombre valido</div>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido">
                <div class="invalid-feedback">Ingrese un apellido valido</div>
            </div>
            <div class="mb-3">
                <label for="idCurso" class="form-label">Codigo Curso</label>
                <select class="form-control" name="idCurso" id="idCurso" require>
                    <option selected disabled value="">Seleccione un valor válido!!</option>
                    <?php foreach($cursos as $curso) { ?>
                        <option value="<?=$curso['idCurso']?>"><?=$curso['nombre']?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</body>
    <?php
        require_once(ROOT_PATH.'footer.php');
    ?>
</html>