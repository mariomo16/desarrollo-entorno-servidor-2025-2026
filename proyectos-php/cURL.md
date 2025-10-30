Descargar [cacert.pem](https://curl.se/ca/cacert.pem)

En la carpeta de instalación de PHP busca `php.ini`
Si no existe copiar y cambiar el nombre de `php.ini-production` o `php.ini-development` a `php.ini`

Descomentar las siguientes lineas dentro del archivo `php.ini`

extension=curl
curl.cainfo = "C:\php\extras\ssl\cacert.pem"
openssl.cafile="C:\php\extras\ssl\cacert.pem"