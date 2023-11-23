<?php
include("conf/conf.php");
session_start();

function generaMinas()
{
    for ($i = 0; $i < NUMEROMINAS; $i++) {
        do {
            $fila = mt_rand(0, 9);
            $columna = mt_rand(0, 9);
        } while ($_SESSION["tablero"][$fila][$columna] == 9);
        $_SESSION["tablero"][$fila][$columna] = 9;
        for ($f = max(0, $fila - 1); $f <= min(TAMANOTABLERO - 1, $fila + 1); $f++) {
            for ($c = max(0, $columna - 1); $c <= min(TAMANOTABLERO - 1, $columna + 1); $c++) {
                if ($_SESSION["tablero"][$f][$c] != 9) {
                    $_SESSION["tablero"][$f][$c]++;
                }
            }
        }
    }
}
// function mostrarTablero(array $tablero)
// {
//     for ($f = 0; $f < TAMANOTABLERO; $f++) {
//         for ($c = 0; $c < TAMANOTABLERO; $c++) {
//             echo $tablero[$f][$c] . ' ';
//         }
//         echo "<br/>";
//     }
// }

function jugadaGanadora()
{
    $num_invisible = 0;
    $bool =  false;
    foreach ($_SESSION["visible"] as $fila => $columna) {
        foreach ($columna as $casilla) {
            if ($casilla == 0) {
                $num_invisible++;
            }
        }
    }
    if ($num_invisible == NUMEROMINAS) {
        $bool =  true;
    }
    return $bool;
}
function clickCasilla($f, $c)
{
    if ($_SESSION["visible"][$f][$c] == 0) {
        $_SESSION["visible"][$f][$c] = 1;
        if ($_SESSION["tablero"][$f][$c] == 9) {
            return 0;
        } else if (jugadaGanadora()) {
            return 1;
        } else if ($_SESSION["tablero"][$f][$c] == 0) {
            for ($fila = max(0, $f - 1); $fila <= min(TAMANOTABLERO - 1, $f + 1); $fila++) {
                for ($columna = max(0, $c - 1); $columna <= min(TAMANOTABLERO - 1, $c + 1); $columna++) {
                    if ($_SESSION["tablero"][$f][$c] != 9) {
                        clickCasilla($fila, $columna);
                    }
                }
            }
        }
    }
}

if (!isset($_SESSION["tablero"])) {
    $_SESSION["tablero"] = array();
    $_SESSION["visible"] = array();

    for ($f = 0; $f < TAMANOTABLERO; $f++) {
        for ($c = 0; $c < TAMANOTABLERO; $c++) {

            $_SESSION["tablero"][$f][$c] = 0; // Tablero no visible, valores que oscilan del 0 al 8 (9 reservado para la mina)
            $_SESSION["visible"][$f][$c] = 0; // Tablero visible, valores 0 y 1.
        }
    }
    generaMinas();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscaminas</title>
    <link rel="stylesheet" href="styles/buscaminas.css">
</head>

<body>
    <div id="tablero">
        <?php
        echo "<a href=\"cerrarsesion.php\"> Reiniciar Juego </a>";
        if (isset($_GET["f"]) && isset($_GET["c"])) {
            $resp = clickCasilla($_GET["f"], $_GET["c"]) ?? "";
            echo $resp;
        }
        // mostrarTablero($_SESSION["tablero"]);
        echo "<br/>";

        for ($f = 0; $f < TAMANOTABLERO; $f++) {
            for ($c = 0; $c < TAMANOTABLERO; $c++) {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST["marcarCas"]) && $_POST["marcarCas"] == "1") {
                        echo 'Yepa ya estoy por aqui';
                    }
                }
                if ($_SESSION["visible"][$f][$c] == 0) {
                    echo "<a href=\"index.php?f=$f&c=$c\"> * </a>";
                } else {
                    echo "<a id='casilla-revelada'>" . $_SESSION['tablero'][$f][$c] . "</a>";
                }
            }
            echo "<br/>";
        }
        ?>
    </div>
    <form action="procesar_form.php" method="post">
        <label for="marcarCas">Marcar casilla</label>
        <input type="checkbox" name="marcarCas" id="marcarCas" value="1">
        </div>
    </form>


</body>

</html>