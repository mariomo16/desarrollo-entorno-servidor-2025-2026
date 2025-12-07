Aquí están todos los parámetros/tokens que acepta `isoFormat`:

## Tokens de Mes

- `M` - Número del mes (1-12)
- `Mo` - Número del mes con ordinal (1º, 2º, 3º...)
- `MM` - Número del mes con cero inicial (01-12)
- `MMM` - Nombre corto del mes (Ene, Feb, Mar...)
- `MMMM` - Nombre completo del mes (Enero, Febrero, Marzo...)

## Tokens de Trimestre

- `Q` - Trimestre (1-4)
- `Qo` - Trimestre con ordinal (1º, 2º, 3º, 4º)

## Tokens de Día del Mes

- `D` - Día del mes (1-31)
- `Do` - Día del mes con ordinal (1º, 2º, 3º...)
- `DD` - Día del mes con cero inicial (01-31)

## Tokens de Día del Año

- `DDD` - Día del año (1-365)
- `DDDo` - Día del año con ordinal
- `DDDD` - Día del año con ceros iniciales (001-365)

## Tokens de Día de la Semana

- `d` - Día de la semana en número (0-6, donde 0 es domingo)
- `do` - Día de la semana con ordinal
- `dd` - Nombre mínimo del día (Do, Lu, Ma...)
- `ddd` - Nombre corto del día (Dom, Lun, Mar...)
- `dddd` - Nombre completo del día (Domingo, Lunes, Martes...)

## Tokens de Día de la Semana (ISO)

- `e` - Día de la semana (0-6, localizado)
- `E` - Día de la semana ISO (1-7, donde 1 es lunes)

## Tokens de Semana del Año

- `w` - Semana del año (1-53)
- `wo` - Semana del año con ordinal
- `ww` - Semana del año con cero inicial (01-53)

## Tokens de Semana del Año (ISO)

- `W` - Semana del año ISO (1-53)
- `Wo` - Semana del año ISO con ordinal
- `WW` - Semana del año ISO con cero inicial (01-53)

## Tokens de Año

- `YY` - Año en dos dígitos (00-99)
- `YYYY` - Año en cuatro dígitos (0000-9999)
- `YYYYYY` - Año expandido (±000000-±999999)
- `Y` - Año completo (puede ser negativo)

## Tokens de Año (ISO Week)

- `gg` - Año de semana ISO en dos dígitos
- `gggg` - Año de semana ISO en cuatro dígitos
- `GG` - Año de semana en dos dígitos
- `GGGG` - Año de semana en cuatro dígitos

## Tokens de AM/PM

- `A` - AM o PM en mayúsculas
- `a` - am o pm en minúsculas

## Tokens de Hora

- `H` - Hora en formato 24h (0-23)
- `HH` - Hora en formato 24h con cero inicial (00-23)
- `h` - Hora en formato 12h (1-12)
- `hh` - Hora en formato 12h con cero inicial (01-12)
- `k` - Hora en formato 24h (1-24)
- `kk` - Hora en formato 24h con cero inicial (01-24)

## Tokens de Minutos

- `m` - Minutos (0-59)
- `mm` - Minutos con cero inicial (00-59)

## Tokens de Segundos

- `s` - Segundos (0-59)
- `ss` - Segundos con cero inicial (00-59)

## Tokens de Segundos Fraccionales

- `S` - Décimas de segundo (0-9)
- `SS` - Centésimas de segundo (00-99)
- `SSS` - Milésimas de segundo (000-999)
- `SSSS...SSSSSSSSS` - Fracciones de segundo con más precisión

## Tokens de Zona Horaria

- `z` o `zz` - Abreviatura de zona horaria (EST, PST...)
- `Z` - Offset de zona horaria (±HH:mm, ±HHmm, o Z)
- `ZZ` - Offset de zona horaria (±HHmm)

## Tokens de Timestamp Unix

- `X` - Timestamp Unix en segundos
- `x` - Timestamp Unix en milisegundos

## Ejemplo de uso en Laravel:

```php
use Carbon\Carbon;

$fecha = Carbon::now();

// Ejemplos
echo $fecha->isoFormat('dddd, D [de] MMMM [de] YYYY'); 
// Salida: sábado, 6 de diciembre de 2025

echo $fecha->isoFormat('DD/MM/YYYY HH:mm:ss');
// Salida: 06/12/2025 14:30:45

echo $fecha->isoFormat('LLLL');
// Salida: sábado, 6 de diciembre de 2025 14:30
```

**Nota importante**: El texto entre corchetes `[]` se escapa y se muestra literalmente sin ser interpretado como tokens de formato.