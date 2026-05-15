<?php

function loadPage($path){
    $company_info = [
        'name' => 'Air9ja',
        'description' => 'Air9ja official website and blog platform',
        'keywords' => 'Air9ja, blog, travel, news',
        'icon' => '/assets/favicon.png',
        'title' => 'Air9ja',
        'email' => [],
        'phone' => [],
        'social-info' => [
            'facebook' => '',
            'twitter' => '',
            'tictok' => '',
            'instagram' => ''
        ],
    ];

    $path = explode('/', trim($path, '/'));

    $route = '/' . ($path[0] ?? '');

    switch ($route) {

        case '/':
        case '/home':
        case '':
            include __DIR__ . "/pages/home.php";
            break;

        case '/about':
            include __DIR__ . "/pages/about.php";
            break;

        case '/contact':
            include __DIR__ . "/pages/contact.php";
            break;

        default:
            $checker= end($path);
            switch ($checker) {
                case 'value':
                    # code...
                    break;
                
                default:
                    # code...
                    break;
            }    
            include __DIR__ . "/pages/404.php";
            break;
    }
}

$pageLoader = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

loadPage($pageLoader);

?>