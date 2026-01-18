# Relaciones

Os faltan muchas migraciones, no habéis definido ninguna many-to-many, ya que no hay tablas intermedias

Relaciones de `Quack` que no funcionan:

- quashtag(): definida como one-to-many. La consulta busca un `quack_id` en la tabla `quashtags`, que no existe

Relaciones de `Quashtag` que no funcionan:

- quack(): definida como one-to-many. La consulta busca un `quashtag_id` en la tabla `quacks`, que no existe

Relaciones que os faltan, según vuestra especificación de los hitos 1 y 2:

- quav: afecta a User y a Quack (quavea/quaveado)
- requack: afecta a User y a Quack (requackea/requackeado)
- follow: afecta a User (following/followed)

Migraciones que os faltan, según vuestra especificación de los hitos 1 y 2:

- quack_quashtag
- quavs
- requacks
- follows

# Autenticación

## Formulario de login

## Validación de datos

Lo único es que debería ser suficiente pasándole a `User::create` directamente todo el array `$data`. La contraseña debería hashearse automáticamente gracias al método `casts()` de User

## Feedback de login
