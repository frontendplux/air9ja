<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Air9ja - Web, Apps, Ebooks & Coding Training</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .swiper {
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-light"> 
    <div class="bg-light border-bottom py-2 d-none d-md-block">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="small text-muted">
                <span class="me-3"><i class="bi bi-envelope-fill text-success me-1"></i> info@air9ja.com</span>
                <span><i class="bi bi-telephone-fill text-success me-1"></i> +234 800 AIR9JA</span>
            </div>
            <div>
                <a href="#registration" class="btn btn-sm btn-success text-white fw-semibold rounded-pill px-3">
                    <i class="bi bi-pencil-square me-1"></i> Register for Coding
                </a>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm py-3">

            
        <div class="container">
            <!-- 1. Brand / Logo (Always Left) -->
            <a class="navbar-brand fw-bold fs-3 text-success d-flex align-items-center" href="#">
                <i class="bi bi-cloud-lightning-fill me-2"></i>Air<span class="text-dark">9ja</span>
            </a>

            <!-- 3. Mobile Toggle Button (Sits right after the actions on mobile) -->
            <button class="navbar-toggler border-0 bg-transparent p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list fs-1 text-success"></i>
            </button>

            <!-- 2. Action Wrapper (Always Right on small screens) -->
            <div class="d-flex align-items-center gap-3 ms-auto me-2 me-lg-0 order-lg-last">

                <!-- Contact Us Button -->
                <a href="#contact" class="btn btn-outline-success fw-semibold btn-sm btn-lg-md px-3 px-lg-4  d-sm-inline-block">Contact Us</a>
                <!-- Cart Icon with badge -->
                <a href="#cart" class="position-relative text-dark fs-4 me-1">
                    <i class="bi bi-bag-heart text-success"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger p-1 fs-6 border border-white" style="font-size: 0.65rem !important;">
                        0
                    </span>
                </a>

                <!-- User Profile Dropdown -->
                <div class="dropdown">
                    <a class="d-flex align-items-center text-decoration-none dropdown-toggle text-dark fw-medium" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-4 text-success me-1"></i>
                        <span class="d-none d-sm-inline ms-1">Hi, John</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm bg-white mt-2" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item py-2" href="#profile">
                                <i class="bi bi-person me-2 text-success"></i>My Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2" href="#dashboard">
                                <i class="bi bi-speedometer2 me-2 text-success"></i>Dashboard
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item py-2 text-danger" href="#logout">
                                <i class="bi bi-box-arrow-right me-2"></i>Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- 4. Navigation Links (Collapses on mobile, centers on desktop) -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fw-medium">
                    <li class="nav-item">
                        <a class="nav-link active text-success" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm bg-light" aria-labelledby="servicesDropdown">
                            <li><a class="dropdown-item" href="#websites"><i class="bi bi-laptop text-success me-2"></i>Website Development</a></li>
                            <li><a class="dropdown-item" href="#apps"><i class="bi bi-phone text-success me-2"></i>App Development</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#ebooks">E-Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#academy">Coding Academy</a>
                    </li>
                    <!-- Contact Us link fallback for tiny mobile screens -->
                    <li class="nav-item d-block d-sm-none">
                        <a class="nav-link text-dark" href="#contact">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>