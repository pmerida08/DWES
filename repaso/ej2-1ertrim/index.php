<?php

require_once 'config.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <style>
        .correcto {
            background-color: #00FF00;
        }
    </style>
</head>

<body>
    <h1>Test de inglés</h1>
    <form action="" method="post">
        <?php
        if (!isset($_POST['submit'])) {
        ?>
            <label for='nombre'>Nombre:
                <input type='text' name='nombre'>
            </label>
            <br>
            <label for='idioma'>Idioma:
            <?php
            foreach ($idiomas as $num => $value) {
                echo "<br>" . "<input type='checkbox' name='idioma$num' value='$value'>$value";
            }
            echo "</label>";
        }

        if (isset($_POST['submit'])) {
            echo "<br>Nombre: " . $_POST['nombre'];
            echo "<br>Idiomas seleccionados: ";
            foreach ($idiomas as $num => $value) {
                if (isset($_POST["idioma$num"])) {

                    echo $_POST["idioma$num"] . " ";
                }
            }
        }
            ?>
            <br>
            <h2>Contesta las siguientes preguntas:</h2>
            <?php
            foreach ($cuestionario as $key => $value) {
                echo "<p>" . $value['pregunta'] . "</p>";
                if ($value['Tipo'] == "text") {
                    if (isset($_POST['submit'])) {

                        if (in_array($_POST["respuesta$key"], $value['Respuesta'])) {
                            echo "<input type='text' class='correcto' name='respuesta$key' value='" . ($_POST["respuesta$key"] ? $_POST["respuesta$key"] : "") . "'>";
                        } else {
                            echo "<input type='text' name='respuesta$key' value='" . ($_POST["respuesta$key"] ? $_POST["respuesta$key"] : "") . "'>";
                        }
                    } else {
                        echo "<input type='text' name='respuesta$key'>";
                    }
                } else {
                    foreach ($value['Opciones'] as $opcion) {
                        if (isset($_POST['submit'])) {
                            if ($opcion == $value['Respuesta']) {
                                echo "<div class='correcto'>";
                            } else {
                                echo "<div>";
                            }
                            
                            // ¿Por qué se queda con la última respuesta?
                            if ($opcion == $_POST["respuesta$key"]) { 
                                echo "<input type='checkbox' checked name='respuesta$key' value='$opcion'>$opcion" . 
                                "</div>";
                            } else {
                                echo "<input type='checkbox' name='respuesta$key' value='$opcion'>$opcion" . "</div>";
                            }
                        } else {
                            echo "<input type='checkbox' name='respuesta$key' value='$opcion'>$opcion" . "<br>";
                        }
                    }
                }
            }
            ?>
            <br>
            <input type="submit" name="submit" value="Enviar">
    </form>

    <?php
    if (isset($_POST['submit'])) {

        $post = $_POST;

        $aciertos = 0;
        $fallos = 0;

        foreach ($cuestionario as $key => $value) {
            if ($value['Tipo'] == "text") {
                if (in_array($post["respuesta$key"], $value['Respuesta'])) {
                    $aciertos += $value['Acierto'];
                } else {
                    $fallos += $value['Fallo'];
                }
            } else {
                if ($post["respuesta$key"] == $value['Respuesta']) {
                    $aciertos += $value['Acierto'];
                } else {
                    $fallos += $value['Fallo'];
                }
            }
            echo "</ul>";
        }

        $puntuacion = $aciertos + $fallos;
        echo "<br><h2>Puntuación: " . $puntuacion . "/5</h2>";
    }
    ?>
</body>

</html>