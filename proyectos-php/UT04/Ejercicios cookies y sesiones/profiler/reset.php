<?php
// Borrar cookies y redirigir a index
setcookie("categorias", "", -0, "/");
header("Location: index.php");