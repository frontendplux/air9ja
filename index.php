<?php
$parseURL=parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$company = [
    "name"        => "Air9ja",
    "title"       => "Air9ja - Web, Apps, Ebooks & Coding Training",
    "description" => "Empowering tech minds across Nigeria. Air9ja offers world-class web and mobile application development, premium tech ebooks, and hands-on coding academy training.",
    "favicon"     => "assets/images/favicon.png",
    "logo"        => "assets/images/logo.png",
    "keywords"    => "coding school Nigeria, learn web development, mobile app development, tech ebooks, coding academy, learn to code, software engineering Lagos",
    "social"      => [
        "facebook"  => "https://facebook.com/air9ja",
        "twitter"   => "https://twitter.com/air9ja",
        "instagram" => "https://instagram.com/air9ja",
        "linkedin"  => "https://linkedin.com/company/air9ja",
        "github"    => "https://github.com/air9ja"
    ],
    "phone"       => [
        "primary"   => "+234 808 279 2432",
        "whatsapp"  => "+2348082792432" // Numeric equivalent for +234 800 AIR9JA (247952)
    ],
];
switch ($parseURL) {
    case '/':
    case '/home':
        include __DIR__."/pages/home.php";
        break;
    
    default:
        include __DIR__."/pages/404.php";
        break;
}