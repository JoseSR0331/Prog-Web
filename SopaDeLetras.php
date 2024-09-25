<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sopa de Letras - Programcacion Web</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px auto;
        }
        td {
            width: 30px;
            height: 30px;
            text-align: center;
            font-size: 20px;
            border: 1px solid black;
        }
        td.highlight {
            background-color: yellow;
            color: red;
            font-weight: bold;
        }
        h1, h2, p {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Sopa de Letras - Programacion Web</h1>

    <?php
    define("TAMAÑO", 11);

    // Matriz de la sopa de letras
    $matriz = [
        ['A', 'F', 'J', 'S', 'F', 'V', 'L', 'S', 'Q', 'L', 'J'],
        ['N', 'Q', 'E', 'Q', 'E', 'Q', 'Z', 'H', 'G', 'F', 'A'],
        ['J', 'G', 'A', 'V', 'U', 'R', 'H', 'T', 'M', 'L', 'V'],
        ['F', 'C', 'N', 'D', 'A', 'E', 'V', 'Y', 'S', 'G', 'A'],
        ['H', 'F', 'G', 'H', 'T', 'P', 'R', 'E', 'R', 'I', 'S'],
        ['J', 'K', 'A', 'R', 'L', 'A', 'A', 'Y', 'R', 'Y', 'C'],
        ['R', 'H', 'L', 'T', 'C', 'P', 'K', 'C', 'R', 'G', 'R'],
        ['D', 'P', 'A', 'P', 'G', 'S', 'N', 'C', 'H', 'K', 'I'],
        ['R', 'F', 'R', 'P', 'F', 'L', 'S', 'G', 'G', 'E', 'P'],
        ['S', 'U', 'L', 'A', 'R', 'A', 'V', 'E', 'L', 'I', 'T'],
        ['I', 'K', 'L', 'G', 'F', 'G', 'R', 'J', 'H', 'F', 'M']
    ];

    // Mostrar la matriz con las coordenadas de la palabra resaltadas
    function mostrarMatriz($matriz, $inicioX = -1, $inicioY = -1, $finX = -1, $finY = -1, $palabra = '') {
        $direcciones = [
            [0, 1], [1, 0], [1, 1], [1, -1],
            [0, -1], [-1, 0], [-1, -1], [-1, 1]
        ];

        echo '<table>';
        for ($i = 0; $i < TAMAÑO; $i++) {
            echo '<tr>';
            for ($j = 0; $j < TAMAÑO; $j++) {
                $highlight = false;

                if ($inicioX != -1 && $inicioY != -1 && $finX != -1 && $finY != -1 && !empty($palabra)) {
                    $tamañoPalabra = strlen($palabra);

                    // Detectar la dirección de la palabra
                    for ($d = 0; $d < 8; $d++) {
                        $dx = $direcciones[$d][0];
                        $dy = $direcciones[$d][1];
                        if (($finX == $inicioX + ($tamañoPalabra - 1) * $dx) && ($finY == $inicioY + ($tamañoPalabra - 1) * $dy)) {
                            // Resaltar solo las posiciones de la palabra encontrada
                            for ($k = 0; $k < $tamañoPalabra; $k++) {
                                if ($i == $inicioX + $k * $dx && $j == $inicioY + $k * $dy) {
                                    $highlight = true;
                                    break;
                                }
                            }
                        }
                    }
                }

                // Resaltar celdas si corresponde
                if ($highlight) {
                    echo '<td class="highlight">' . $matriz[$i][$j] . '</td>';
                } else {
                    echo '<td>' . $matriz[$i][$j] . '</td>';
                }
            }
            echo '</tr>';
        }
        echo '</table>';
    }

    // Función para buscar palabras en la matriz
    function encontrarPalabra($matriz, $palabra) {
        $tamañoPalabra = strlen($palabra);
        $direcciones = [
            [0, 1], [1, 0], [1, 1], [1, -1],
            [0, -1], [-1, 0], [-1, -1], [-1, 1]
        ];

        for ($x = 0; $x < TAMAÑO; $x++) {
            for ($y = 0; $y < TAMAÑO; $y++) {
                for ($d = 0; $d < 8; $d++) {
                    $dx = $direcciones[$d][0];
                    $dy = $direcciones[$d][1];
                    $finXTemp = $x + ($tamañoPalabra - 1) * $dx;
                    $finYTemp = $y + ($tamañoPalabra - 1) * $dy;

                    if ($finXTemp >= 0 && $finXTemp < TAMAÑO && $finYTemp >= 0 && $finYTemp < TAMAÑO) {
                        $k;
                        for ($k = 0; $k < $tamañoPalabra; $k++) {
                            $nx = $x + $k * $dx;
                            $ny = $y + $k * $dy;
                            if ($matriz[$nx][$ny] != $palabra[$k]) {
                                break;
                            }
                        }
                        if ($k == $tamañoPalabra) {
                            return ["inicio" => [$x, $y], "fin" => [$finXTemp, $finYTemp]];
                        }
                    }
                }
            }
        }
        return null;
    }

    // Inicialmente mostrar la matriz
    $inicioX = $inicioY = $finX = $finY = -1;
    $palabraEncontrada = '';

    // Procesar si el formulario se envía
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $palabra = strtoupper(trim($_POST['palabra']));
        $resultado = encontrarPalabra($matriz, $palabra);
        if ($resultado) {
            echo "<p>Palabra encontrada: $palabra</p>";
            echo "<p>Coordenada de inicio: (" . $resultado['inicio'][0] . ", " . $resultado['inicio'][1] . ")</p>";
            echo "<p>Coordenada de fin: (" . $resultado['fin'][0] . ", " . $resultado['fin'][1] . ")</p>";
            $inicioX = $resultado['inicio'][0];
            $inicioY = $resultado['inicio'][1];
            $finX = $resultado['fin'][0];
            $finY = $resultado['fin'][1];
            $palabraEncontrada = $palabra;
        } else {
            echo "<p>Palabra no encontrada en la sopa de letras.</p>";
        }
    }

    // Mostrar matriz con resaltado si se encontró la palabra
    mostrarMatriz($matriz, $inicioX, $inicioY, $finX, $finY, $palabraEncontrada);
    ?>

    <form method="post">
        <label for="palabra">¿Qué palabra deseas buscar?</label>
        <input type="text" id="palabra" name="palabra" required>
        <button type="submit">Buscar</button>
    </form>
</body>
</html>