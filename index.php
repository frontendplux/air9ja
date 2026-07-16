<?php
$parseURL=parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
switch ($parseURL) {
    case '/':
    case '/home':
        include __DIR__."/pages/home.php";
        break;
    
    default:
        # code...
        break;
}