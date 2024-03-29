<?php

session_start();

// Автозареждане на класове
spl_autoload_register(function($class) {
    include 'app/classes/' . $class . '.php';
});

// Routing
$route = $_SERVER['REQUEST_URI'];

if ($route === '/') {
    $controller = new HomeController();
    $controller->index();
} else {
    // ... (дефиниране на маршрути за други страници)
}
