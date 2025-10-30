<?php

// config.php
// Iniciar la sesión
session_start();
// Configuración de cookies
define('COOKIE_PREFERENCES_NAME', 'user_prefs');
define('COOKIE_EXPIRES_THIRTY_DAYS', 60 * 60 * 24 * 30);

// index.php
require_once 'config.php';