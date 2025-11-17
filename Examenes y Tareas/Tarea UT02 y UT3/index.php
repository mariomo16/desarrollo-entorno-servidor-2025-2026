<?php
require_once __DIR__ . '/data/catalogo_productos.php';
require_once __DIR__ . '/funciones.php';

// Mostrar la tabla con todos los campos nada mas abrir la página, lo hago así para que al enviar el formulario se elimine
$formularioEnviado = $_SERVER['REQUEST_METHOD'] === 'POST';
if (!$formularioEnviado) {
    $campos_seleccionados = array_keys($productos[0]);

    echo "<table id=\"tabla-inicial\">";
    echo "<tr>";
    foreach ($campos_seleccionados as $campo) {
        echo "<th>" . ucfirst($campo) . "</th>";
    }
    echo "</tr>";
    foreach ($productos as $producto) {
        echo "<tr>";
        foreach ($campos_seleccionados as $campo) {
            echo "<td>" . $producto[$campo] . "</td>";
        }
        echo "</tr>";
    }
    echo "</table";
}

// Verificar si el formulario ha sido enviado usando $_POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los campos seleccionados
    $campos_seleccionados = $_POST['campos_seleccionados'] ?? [];

    // Aplicar filtros si se han especificado
    $productos_filtrados = $productos;
    $campo_filtrar = $_POST['campo_filtrar'] ?? '';
    $operador = $_POST['operador'] ?? '';
    $valor = $_POST['valor'] ?? '';

    // Mónica: $campo_filtrar && $operador && $valor !== '' (también funciona)
    if (!empty($campo_filtrar) && !empty($operador) && !empty($valor)) {
        // Que bonito es el match comparado al switch
        match ($operador) {
            'igualque' => $productos_filtrados = filtrar_igual($productos_filtrados, $campo_filtrar, $valor),
            'mayorque' => $productos_filtrados = filtrar_mayor_que($productos_filtrados, $campo_filtrar, $valor),
            'menorque' => $productos_filtrados = filtrar_menor_que($productos_filtrados, $campo_filtrar, $valor),
            'contiene' => $productos_filtrados = filtrar_contiene($productos_filtrados, $campo_filtrar, $valor)
        };
    }

    // Si no se han seleccionado campos, se muestran todas las categorías
    if (empty($campos_seleccionados)) {
        $campos_seleccionados = array_keys($productos[0]);
    }

    // Mostrar la tabla con los productos ya filtrados según la función escogida
    if (!empty($productos_filtrados)) {
        echo "<table>";
        echo "<tr>";
        foreach ($campos_seleccionados as $campo) {
            echo "<th>" . ucfirst($campo) . "</th>";
        }
        echo "</tr>";
        foreach ($productos_filtrados as $producto) {
            echo "<tr>";
            foreach ($campos_seleccionados as $campo) {
                echo "<td>" . $producto[$campo] . "</td>";
            }
            echo "</tr>";
        }
        echo "</tr>";
        echo "</table";
    } else {
        echo "<p>No se han encontrado productos con los criterios especificados.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos</title>
    <style>
        /* Para que no quede tan feo */
        :root {
            font-family: sans-serif, Arial;
        }

        table,
        tr,
        th,
        td {
            border: 1px solid gray;
            border-collapse: collapse;
            text-align: center;
            padding: 2px 5px;
        }
    </style>
</head>

<body>
    <hr>
    <form action="" method="POST">
        <label>Campos a seleccionar: </label>
        <?php // Mostrar campos dinamicamente
        $campos = array_keys($productos[0]);
        foreach ($campos as $name) {
            echo "<input type=\"checkbox\" name=\"campos_seleccionados[]\" id=\"$name\" value=\"$name\">";
            echo "<label for=\"$name\">" . ucfirst($name) . "</label>";
            echo "<span> </span>";
        }
        ?>
        <br><br>

        <label for="campo_filtrar">Campo a filtrar:</label>
        <select name="campo_filtrar" id="campo_filtrar">
            <option value="">Sin campo</option>
            <?php
            // Mostrar campos dinamicamente (de nuevo)
            foreach ($campos as $name) {
                echo "<option value=\"$name\">$name</option>";
            }
            ?>
        </select>
        <br><br>

        <label for="operador">Función de filtrado:</label>
        <select name="operador" id="operador">
            <option value="">Sin filtrado</option>
            <option value="igualque">Igual a</option>
            <option value="contiene">Contiene</option>
            <option value="mayorque">Mayor que</option>
            <option value="menorque">Menor que</option>
        </select>
        <br><br>

        <label for="valor">Criterio:</label>
        <input type="text" name="valor" id="valor">
        <br><br>

        <input type="submit" value="Enviar">
    </form>
</body>

</html>