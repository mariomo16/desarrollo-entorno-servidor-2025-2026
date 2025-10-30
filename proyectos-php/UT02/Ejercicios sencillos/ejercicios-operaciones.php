<!doctype html>

<head>
    <title>Ejercicios PHP: Operaciones</title>
</head>

<body>

    <h1>Ejercicios sobre operaciones (aritméticas, comparación y lógicas)</h1>

    <p>Cada ejercicio incluye solo el enunciado. Implementa las soluciones en este mismo archivo dentro de las secciones PHP indicadas.</p>

    <section>
        <h2>Ejercicio 1 — Operaciones aritméticas</h2>
        <p>Declara dos variables numéricas y realiza las siguientes operaciones, mostrando el resultado y el tipo:</p>
        <?php
        $numero1 = 10;
        $numero2 = 3.2;
        $celsius = 25;
        $fahrenheit = ($celsius * 9 / 5) + 32;
        $kelvin = $celsius + 273.15;
        ?>
        <ul>
            <li>Suma</li>
            <?= $numero1 + $numero2 ?>
            <li>Resta</li>
            <?= $numero1 - $numero2 ?>
            <li>Multiplicación</li>
            <?= $numero1 * $numero2 ?>
            <li>División</li>
            <?= $numero1 / $numero2 ?>
            <li>Resto (módulo)</li>
            <?= $numero1 % $numero2 ?>
            <li>Potencia (usar **)</li>
            <?= $numero1 ** $numero2 ?>
        </ul>
        <p>Muestra además una operación con mezcla de int/float y observa el tipo resultante.</p>
        <p>Haz una operación de conversión de temperatura. Declara una variable para la temperatura en grados Celsius y conviértela a Fahrenheit y a Kelvin.</p>
        <span>La temperatura en Fahrenheit es: <?= $fahrenheit . "°F" ?> y la temperatura en Kelvin es: <?= $kelvin . "K" ?> </span>

        <?php
        // EJERCICIO 1
        ?>

    </section>

    <section>
        <h2>Ejercicio 2 — Operadores de comparación</h2>
        <p>Usa distintos operadores de comparación entre varias parejas de valores y muestra el resultado (true/false) y una explicación breve:</p>
        <?php

        ?>
        <ul>
            <li>== y === entre "123" y 123</li>
            <li>!= y !== entre 0 y false</li>
            <li>>, &lt;, &gt;=, &lt;= entre números</li>
            <li>Comparación entre arrays con == y === (explica la diferencia)</li>
        </ul>

        <?php
        // EJERCICIO 2
        ?>

    </section>

    <section>
        <h2>Ejercicio 3 — Operadores lógicos</h2>
        <p>Comprueba combinaciones de expresiones booleanas usando AND, OR, XOR y NOT (&&, ||, xor, !). Para cada combinación, muestra la expresión, su valor y una breve explicación del porqué.</p>
        <ul>
            <li>(true && false)</li>
            <li>(true || false)</li>
            <li>(true xor true)</li>
            <li>!false</li>
            <li>Combina condiciones con parentesis para mostrar precedencia (por ejemplo: true || false && false)</li>
        </ul>

        <?php
        // EJERCICIO 3
        ?>

    </section>

    <section>
        <h2>Ejercicio 4 — Mini-retos</h2>
        <p>Resuelve los siguientes mini-retos y muestra cómo los resolverías en PHP:</p>
        <ol>
            <li>Intercambia los valores de dos variables sin usar una tercera variable (usa operadores aritméticos o bit a bit).</li>
            <li>Comprueba si un número es par o impar usando operadores (sin usar funciones).</li>
            <li>Evalúa si una variable está entre dos valores (inclusive) usando operadores de comparación y lógicos.</li>
        </ol>

        <?php
        // EJERCICIO 4
        ?>

    </section>

</body>

</html>