<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $islogin=0;
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $company['description'] ?>">
    <meta name="keywords" content="<?= $company['keywords'] ?>">
    <title><?= $company['title'] ?></title>
    <link rel="icon" href="<?= $company['logo'] ?>" type="image/x-icon">
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
        /* Floating Buttons Custom CSS */
.btn-float {
    width: 52px;
    height: 52px;
    position: relative;
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.hover-scale:hover {
    transform: scale(1.15) translateY(-2px);
    box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.18) !important;
}

/* Pulsing Notification Dot on Rewards button */
@keyframes pulse {
    0% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.7);
    }
    70% {
        transform: scale(1);
        box-shadow: 0 0 0 6px rgba(220, 53, 69, 0);
    }
    100% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 rgba(220, 53, 69, 0);
    }
}

.animate-pulse {
    animation: pulse 2s infinite;
}
    </style>
</head>
<body class="bg-light"> 
    <div class="bg-light border-bottom py-2 d-none d-md-block">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="small text-muted">
                <span class="me-3"><i class="bi bi-envelope-fill text-success me-1"></i> info@air9ja.com</span>
                <span><i class="bi bi-telephone-fill text-success me-1"></i> <?= $company['phone']['primary'] ?></span>
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
                <!-- Cart Icon with badge -->
                <a href="#cart" class="position-relative text-dark fs-4 me-1">
                    <i class="bi bi-bag-heart text-success"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger p-1 fs-6 border border-white" style="font-size: 0.65rem !important;">
                        0
                    </span>
                </a>
                <a href="#contact" class="btn btn-outline-success fw-semibold btn-sm btn-lg-md px-3 px-lg-4 d-none d-sm-inline-block">Contact Us</a>
                <?php if($islogin): ?>
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
                <?php else: ?>
                <a href="/login" class="btn btn-success fw-semibold btn-sm btn-lg-md px-3 px-lg-4  d-sm-inline-block">Get Started</a>
                <?php endif ?>

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





    <!-- FLOATING ACTION BUTTONS (BOTTOM RIGHT) -->
<div class="position-fixed bottom-0 end-0 m-3 d-flex flex-column gap-2 z-3" style="z-index: 1040;">
    
    <!-- Rewards Widget Trigger -->
    <button class="btn btn-warning text-dark rounded-circle d-flex align-items-center justify-content-center shadow-lg border-0 btn-float hover-scale" 
            data-bs-toggle="modal" data-bs-target="#rewardsModal" 
            title="Air9ja Rewards">
        <i class="bi bi-gift-fill fs-5"></i>
        <!-- Pulse Indicator for Engagement -->
        <span class="position-absolute top-0 start-100 translate-middle p-1.5 bg-danger border border-light rounded-circle animate-pulse"></span>
    </button>

    <!-- WhatsApp Quick Chat Link -->
    <!-- Replace '2348000000000' with your actual WhatsApp business number -->
    <a href="https://wa.me/2348000000000?text=Hello%20Air9ja%20Team!%20I'm%20interested%20in%20your%20services/academy." 
       target="_blank" 
       rel="noopener noreferrer" 
       class="btn btn-success rounded-circle d-flex align-items-center justify-content-center shadow-lg border-0 btn-float hover-scale" 
       title="Chat with us on WhatsApp"
       style="background-color: #25D366 !important;">
        <i class="bi bi-whatsapp fs-5 text-white"></i>
    </a>
</div>

<!-- MINI REWARDS MODAL -->
<div class="modal fade" id="rewardsModal" tabindex="-1" aria-labelledby="rewardsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header bg-warning border-0 pb-3 rounded-top-4 text-dark position-relative">
                <div class="text-center w-100 pt-2">
                    <i class="bi bi-trophy-fill display-6 text-dark mb-1 d-block"></i>
                    <h5 class="modal-title fw-bold" id="rewardsModalLabel">Air9ja Club Rewards</h5>
                </div>
                <button type="button" class="btn-close btn-close-dark position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 text-center">
                <p class="text-secondary small mb-4">Earn points on every book purchase, course enrollment, or developer tool you unlock!</p>
                
                <!-- Rewards List -->
                <div class="d-flex flex-column gap-3 text-start mb-4">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-warning bg-opacity-10 text-warning px-2.5 py-1.5 rounded-3 fw-bold small">100 pts</div>
                        <span class="text-dark small fw-semibold">Sign Up Account Bonus</span>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-warning bg-opacity-10 text-warning px-2.5 py-1.5 rounded-3 fw-bold small">10 pts</div>
                        <span class="text-dark small fw-semibold">Every $1 spent on Shop</span>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-warning bg-opacity-10 text-warning px-2.5 py-1.5 rounded-3 fw-bold small">250 pts</div>
                        <span class="text-dark small fw-semibold">Refer a Friend to Academy</span>
                    </div>
                </div>

                <!-- Action Button -->
                <button class="btn btn-dark text-warning w-100 fw-bold py-2 rounded-3 shadow-sm" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#authModal">
                    Claim My 100 Points <i class="bi bi-chevron-right ms-1"></i>
                </button>
            </div>
        </div>
    </div>
</div>