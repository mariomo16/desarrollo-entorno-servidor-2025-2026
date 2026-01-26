## Sintaxis Básica

```php
diffForHumans($other = null, $syntax = null, $short = false, $parts = 1, $options = null)
```

## Parámetros

### 1. `$other` (Carbon|null)
Fecha con la que comparar. Si es `null`, usa la fecha actual.

```php
$fecha = Carbon::parse('2025-12-01');

echo $fecha->diffForHumans();
// "hace 5 días"

echo $fecha->diffForHumans(Carbon::parse('2025-12-10'));
// "9 días antes"
```

### 2. `$syntax` (int|null)
Controla el estilo de la salida:

- `Carbon::DIFF_RELATIVE_TO_NOW` (o `null`) - Relativo a ahora: "hace 5 días"
- `Carbon::DIFF_RELATIVE_TO_OTHER` - Relativo a otra fecha: "5 días antes"
- `Carbon::DIFF_ABSOLUTE` - Absoluto: "5 días"

```php
$fecha = Carbon::parse('2025-12-01');
$otra = Carbon::parse('2025-12-10');

echo $fecha->diffForHumans($otra, Carbon::DIFF_RELATIVE_TO_NOW);
// "hace 5 días"

echo $fecha->diffForHumans($otra, Carbon::DIFF_RELATIVE_TO_OTHER);
// "9 días antes"

echo $fecha->diffForHumans($otra, Carbon::DIFF_ABSOLUTE);
// "9 días"
```

### 3. `$short` (bool)
Usa formato corto en lugar del formato largo.

```php
$fecha = Carbon::parse('2025-11-01');

echo $fecha->diffForHumans(null, null, false);
// "hace 1 mes"

echo $fecha->diffForHumans(null, null, true);
// "hace 1 m" (abreviado)
```

### 4. `$parts` (int)
Número de partes de tiempo a mostrar (por defecto 1).

```php
$fecha = Carbon::parse('2025-10-01 10:30:00');

echo $fecha->diffForHumans(null, null, false, 1);
// "hace 2 meses"

echo $fecha->diffForHumans(null, null, false, 2);
// "hace 2 meses 5 días"

echo $fecha->diffForHumans(null, null, false, 3);
// "hace 2 meses 5 días 3 horas"
```

### 5. `$options` (int|null)
Opciones adicionales usando constantes bit a bit:

- `Carbon::JUST_NOW` - Muestra "justo ahora" para diferencias muy pequeñas
- `Carbon::NO_ZERO_DIFF` - No muestra "hace 0 segundos"
- `Carbon::ONE_DAY_WORDS` - Usa "ayer" y "mañana" en lugar de "hace 1 día"
- `Carbon::TWO_DAY_WORDS` - Usa "anteayer" y "pasado mañana"

```php
$ahora = Carbon::now();
$hace5seg = Carbon::now()->subSeconds(5);

echo $hace5seg->diffForHumans();
// "hace 5 segundos"

echo $hace5seg->diffForHumans(null, null, false, 1, Carbon::JUST_NOW);
// "justo ahora"

$ayer = Carbon::yesterday();
echo $ayer->diffForHumans();
// "hace 1 día"

echo $ayer->diffForHumans(null, null, false, 1, Carbon::ONE_DAY_WORDS);
// "ayer"
```

## Métodos Auxiliares

Carbon también proporciona métodos más específicos:

### `diffForHumansTo($other)`
Diferencia hacia otra fecha.

```php
$fecha1 = Carbon::parse('2025-12-01');
$fecha2 = Carbon::parse('2025-12-10');

echo $fecha1->diffForHumansTo($fecha2);
// "9 días antes"
```

### `from($other)` y `fromNow()`
Equivalente a diffForHumans con sintaxis relativa.

```php
$fecha = Carbon::parse('2025-12-01');

echo $fecha->fromNow();
// "hace 5 días"

echo $fecha->from(Carbon::parse('2025-12-10'));
// "9 días antes"
```

### `to($other)` y `toNow()`
Diferencia hacia una fecha.

```php
$fecha = Carbon::parse('2025-12-01');

echo $fecha->toNow();
// "dentro de 5 días" (si la fecha es futura)

echo $fecha->to(Carbon::parse('2025-12-10'));
// "9 días después"
```

## Ejemplos Prácticos

```php
// Uso común en vistas de Laravel
$post->created_at->diffForHumans();
// "hace 3 horas"

// Con múltiples partes
$fecha = Carbon::parse('2025-10-01 14:25:30');
echo $fecha->diffForHumans(null, null, false, 4);
// "hace 2 meses 5 días 30 minutos 15 segundos"

// Formato corto con múltiples partes
echo $fecha->diffForHumans(null, null, true, 3);
// "hace 2 m 5 d 30 min"

// Combinando opciones con OR bitwise
$opciones = Carbon::JUST_NOW | Carbon::ONE_DAY_WORDS | Carbon::TWO_DAY_WORDS;
echo $fecha->diffForHumans(null, null, false, 1, $opciones);
```

## Localización

El método respeta la configuración de idioma de Carbon:

```php
Carbon::setLocale('es'); // Español
$fecha->diffForHumans(); // "hace 5 días"

Carbon::setLocale('en'); // Inglés
$fecha->diffForHumans(); // "5 days ago"

Carbon::setLocale('fr'); // Francés
$fecha->diffForHumans(); // "il y a 5 jours"
```
