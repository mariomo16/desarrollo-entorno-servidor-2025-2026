<!doctype html>

<head>
    <title>Ejercicios PHP: Constantes</title>
</head>

<body>

    <h1>Ejercicios sobre constantes (predefinidas, mágicas y definición)</h1>

    <p>Implementa las soluciones en este mismo archivo dentro de las secciones PHP indicadas. Cada sección contiene enunciados y sugerencias para experimentar.</p>

    <section>
        <h2>Ejercicio 1 — Constantes predefinidas</h2>
        <p>PHP incluye muchas constantes predefinidas útiles. Muestra el valor y explica brevemente cada una de las siguientes constantes:</p>
        <ul>
            <li>Versión de PHP</li>
            <?= PHP_VERSION ?> <span>: Versión de PHP que se esta usando (no es la version instalada en el equipo)</span>
            <li>Sistema operativo</li>
            <?= PHP_OS ?> <span>: Sistema operativo en el que se está ejecutando PHP</span>
            <li>Separador de directorios</li>
            <?= DIRECTORY_SEPARATOR ?> <span>: Separador de directorios del sistema operativo</span>
        </ul>
        <p>Además, usa <code>defined()</code> para comprobar si una constante predefinida existe antes de mostrarla.</p>

        <?php
        // EJERCICIO 1
        ?>

    </section>

    <section>
        <h2>Ejercicio 2 — Constantes "mágicas"</h2>
        <p>Las constantes mágicas cambian según el contexto (archivo, línea, clase, método...). Muestra el valor de estas constantes dentro del archivo y explica su comportamiento:</p>
        <ul>
            <li>Fichero actual</li>
            <?= __FILE__ ?> <span>: Ruta completa del archivo actual</span>
            <li>Directorio actual</li>
            <?= __DIR__ ?> <span>: Ruta del directorio del archivo actual</span>
            <li>Número de línea actual</li>
            <?= __LINE__ ?> <span>: Número de línea actual en el archivo</span>
        </ul>

        <?php
        // EJERCICIO 2
        ?>

    </section>

    <section>
        <?php
        define("constanteGlobal", "Constante Global");
        const constante = "Constante";
        ?>
        <h2>Ejercicio 3 — Definir tus propias constantes (define y const)</h2>
        <p>Practica la creación de constantes con <code>define()</code> y con <code>const</code> dentro y fuera de clases. En particular:</p>
        <ul>
            <li>Define una constante global usando <code>define</code> y muéstrala.</li>
            <?= constanteGlobal ?>
            <li>Define otra constante usando <code>const</code> dentro de una clase y accede a ella.</li>
            <?= constante ?>
            <li>Intenta redefinir una constante y observa el comportamiento.</li>
            <span>Expression is not writable</span>
            <li>Comprueba la diferencia entre constantes y variables (inmutabilidad).</li>
            <span>La principal diferencia es que las variables pueden cambiar su valor durante la ejecución del programa, se definen con el signo $ y tienen un ámbito que puede ser local o global. Las constantes, en cambio, son valores fijos que no se pueden modificar una vez definidos, se usan con la función define() y tienen un alcance global por defecto. </span>
        </ul>

        <?php
        // EJERCICIO 3
        ?>

    </section>

</body>

</html>