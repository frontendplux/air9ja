<?php
session_start();
function loadPage($path){
include __DIR__."/api/conn.php";
include __DIR__."/api/main.php";
function timeAgo($datetime) {
    $timezone = new DateTimeZone("Africa/Lagos");

    $now = new DateTime("now", $timezone);
    $time = new DateTime($datetime, $timezone);

    $diff = $now->getTimestamp() - $time->getTimestamp();

    if ($diff < 60) {
        return $diff . " seconds ago";
    }

    $minutes = floor($diff / 60);
    if ($minutes < 60) {
        return $minutes . " minute" . ($minutes > 1 ? "s" : "") . " ago";
    }

    $hours = floor($diff / 3600);
    if ($hours < 24) {
        return $hours . " hour" . ($hours > 1 ? "s" : "") . " ago";
    }

    $days = floor($diff / 86400);
    if ($days < 7) {
        return $days . " day" . ($days > 1 ? "s" : "") . " ago";
    }

    $weeks = floor($days / 7);
    if ($weeks < 4) {
        return $weeks . " week" . ($weeks > 1 ? "s" : "") . " ago";
    }

    $months = floor($days / 30);
    if ($months < 12) {
        return $months . " month" . ($months > 1 ? "s" : "") . " ago";
    }

    $years = floor($days / 365);
    return $years . " year" . ($years > 1 ? "s" : "") . " ago";
}

    $main=new Main($conn);
    $company_info = [
        'name' => 'Air9ja',
        'description' => 'Air9ja Blog shares the latest news, travel updates, lifestyle tips, technology insights, and inspiring stories across Nigeria and beyond.',
        'keywords' => 'Air9ja, Nigeria blog, travel blog, lifestyle, news, technology, tourism',
        'icon' => '/assets/favicon.png',
        'image' => '',
        'title' => 'Air9ja Blog - News, Travel & Lifestyle Updates',
        'email' => [],
        'phone' => [],
        'social-info' => [
            'facebook' => '',
            'twitter' => '',
            'tictok' => '',
            'instagram' => '',
            'linkedin' => '',
            'youtube' => ''
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

        case '/auth':
            $route2 = '/' . ($path[1] ?? '');
            switch ($route2) {
                case '/':
                case '/login':
                    include __DIR__."/pages/auth/login.php";
                    break;

                case '/signup':
                    include __DIR__."/pages/auth/signup.php";
                    break;

                case '/forget-password':
                    include __DIR__."/pages/auth/forgetpassword.php";
                    break;
                
                case '/pin-code':
                    include __DIR__."/pages/auth/pincode.php";
                    break;
                
                case '/new-password':
                    include __DIR__."/pages/auth/newpassword.php";
                    break;
                
                default:
                    include __DIR__."/pages/404.php";
                    break;
            }
            break;

        case '/member':
            $route2 = '/' . ($path[1] ?? '');
            include __DIR__."/api/admin.php";
            $admin=new member($conn);
            if(!$admin->getUser(['id'=>$_SESSION['id'] ?? 0,'uid' => $_SESSION['uid'] ?? '' ])['status'])return header('location:/auth');
            switch ($route2) {
                case '/':
                case '/home':
                    include __DIR__."/pages/users/home.php";
                    break;

                case '/create':
                    include __DIR__."/pages/users/create.php";
                    break;

                case '/post':
                    include __DIR__."/pages/users/article-list.php";
                    break;

                case '/category':
                    include __DIR__."/pages/users/category.php";
                    break;
                
                case '/users':
                    include __DIR__."/pages/users/user.php";
                    break;

                case '/profile':
                    include __DIR__."/pages/users/profile.php";
                    break;
                
                case '/subscriber':
                    include __DIR__."/pages/users/subscribers.php";
                    break;

                case '/coin':
                       include __DIR__."/pages/users/coin.php";
                    break;

                default:
                    include __DIR__."/pages/404.php";
                    break;
            }
            break;

        default:
            $checker= $main->checker(['slug' =>end($path)]);
            switch ('/'.$checker['type']) {
                case '/blog':
                         include __DIR__ . "/pages/landing.php";
                    break;
                case '/category':
                        include __DIR__ . "/pages/category.php";
                    break;
                
                default:
                     include __DIR__ . "/pages/404.php";
                    break;
            }    
            break;
    }
}

$pageLoader = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

loadPage($pageLoader);

?>