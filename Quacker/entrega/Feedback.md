# Análisis de diseño

## Clases identificadas

### Relaciones

Descripción muy escueta

Idealmente deberíais haber mencionado la forma en que esas relaciones se traducen a BBDD. Por ejemplo:

- Quack: mensajes públicos. Pertenecen a un usuario (relación one to many). La forma de representar esta relación es mediante una clave foránea en la tabla `quack`

### Descripción

Muy desordenada, empezáis indicando "Clase User" y sus relaciones, pero no indicáis "Clase Quack" y sus relaciones ni "Clase Quashtag" y sus relaciones

En Quavs y Requacks tneéis PK compuesta, pero habéis añadido un "id(PK)". O lo uno o lo otro. Yo no recomiendo PKs compuestas

## Diagrama UML

En un diagrama de clases no hay que reflejar información de BBDD, sino del modelo. No habría sido necesario poner aquí los atributos, ya que sólo me interesaba las clases y sus relaciones, pero poner información de BBDD sí que es erróneo

En las relaciones hay que indicar la cardinalidad en ambos lados. Por ejemplo:

- En relación "Quackea" habéis puesto 0:N. Eso iría en el lado del Quack, ¿y en el de User?

# CRUD

## Migraciones

## Rutas

## Modelo

## Vistas

Faltan las vistas para mostrar y editar Quashtags
