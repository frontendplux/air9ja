<?php include __DIR__.'/header.php'; ?>

<!-- HERO HEADER BANNER SECTION -->
<header class="position-relative overflow-hidden bg-gradient-hero py-5 border-bottom">
    <!-- Decorative Subtle Background Circles -->
    <div class="position-absolute rounded-circle bg-success opacity-10" style="width: 400px; height: 400px; top: -10%; right: -10%; filter: blur(80px);"></div>
    <div class="position-absolute rounded-circle bg-dark opacity-5" style="width: 300px; height: 300px; bottom: -10%; left: -5%; filter: blur(60px);"></div>

    <div class="container py-lg-5 position-relative" style="z-index: 2;">
        <div class="row align-items-center g-5">
            
            <!-- Left Column: Compelling Copy & Interactive CTAs -->
            <div class="col-lg-6 text-center text-lg-start reveal-fade-up">
                <!-- Promo Announcement Badge -->
                <div class="d-inline-flex align-items-center gap-2 bg-success bg-opacity-10 text-success fw-semibold rounded-pill px-3 py-1.5 mb-4 fs-6 border border-success border-opacity-20 shadow-sm">
                    <span class="badge bg-success text-white rounded-pill px-2 py-1 uppercase tracking-wider extra-small">NEW</span>
                    <span>Coding Cohort starts next week!</span>
                </div>
                
                <!-- Main Catchy Heading -->
                <h1 class="display-4 fw-black text-dark mb-3 lh-sm">
                    Launch Your Digital Ideas or <span class="text-success position-relative">Master Coding<span class="d-none d-md-inline-block position-absolute bottom-0 start-0 w-100 bg-success bg-opacity-20" style="height: 8px; z-index: -1;"></span></span> with Air9ja
                </h1>
                
                <!-- Subtext clarifying all offerings -->
                <p class="lead text-muted mb-4 fs-5" style="max-width: 540px;">
                    We design cutting-edge websites and mobile apps, author premium tech e-books, and run direct, hands-on coding academy bootcamps to kickstart your tech career.
                </p>
                
                <!-- Action Buttons with Auth Modal Hooks -->
                <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-lg-start gap-3 mb-5">
                    <button class="btn btn-success btn-lg text-white fw-bold px-4 py-3 shadow-sm d-inline-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#authModal">
                        <i class="bi bi-rocket-takeoff-fill me-2 fs-5"></i> Start Learning Now
                    </button>
                    <a href="#projects" class="btn btn-outline-dark btn-lg fw-semibold px-4 py-3 d-inline-flex align-items-center justify-content-center">
                        Explore Our Portfolio <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>

                <!-- Trust Signals / Key Metrics Icons -->
                <div class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-4 pt-4 border-top border-light-subtle">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-shield-check text-success fs-3 me-2"></i>
                        <div>
                            <p class="mb-0 fw-bold text-dark lh-1">100% Secure</p>
                            <span class="text-muted extra-small">Secure Payments</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-patch-check-fill text-success fs-3 me-2"></i>
                        <div>
                            <p class="mb-0 fw-bold text-dark lh-1">Elite Mentors</p>
                            <span class="text-muted extra-small">Industry Experts</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-journal-code text-success fs-3 me-2"></i>
                        <div>
                            <p class="mb-0 fw-bold text-dark lh-1">Interactive</p>
                            <span class="text-muted extra-small">Project-First Path</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Visual Component / Digital Banner -->
            <div class="col-lg-6 text-center reveal-cards">
                <div class="position-relative p-3 mx-auto" style="max-width: 520px;">
                    
                    <!-- Main Hero Mockup Banner -->
                    <div class="card border-0 shadow-lg p-2 rounded-4 bg-white overflow-hidden">
                        <img src="https://images-platform.99static.com//qJSFkEDrJ8G6ToT5J-UOIy9Lklk=/24x0:1467x1443/fit-in/590x590/99designs-contests-attachments/112/112542/attachment_112542414" alt="Air9ja Workspace Illustration" class="img-fluid rounded-3">
                    </div>
                    
                    <!-- Floating Badge 1: App Development (Top Right) -->
                    <div class="position-absolute top-0 end-0 bg-white p-3 rounded-3 shadow-lg d-flex align-items-center border-start border-success border-4 m-3 d-none d-sm-flex z-3">
                        <div class="bg-success bg-opacity-10 text-success p-2 rounded-2 me-3">
                            <i class="bi bi-phone-vibrate-fill fs-4"></i>
                        </div>
                        <div class="text-start">
                            <p class="mb-0 fw-bold text-dark small">Premium Mobile Apps</p>
                            <p class="mb-0 text-muted extra-small">iOS & Android Natives</p>
                        </div>
                    </div>
                    
                    <!-- Floating Badge 2: Coding (Bottom Left) -->
                    <div class="position-absolute bottom-0 start-0 bg-white p-3 rounded-3 shadow-lg d-flex align-items-center border-start border-dark border-4 m-3 d-none d-sm-flex z-3">
                        <div class="bg-dark bg-opacity-10 text-dark p-2 rounded-2 me-3">
                            <i class="bi bi-terminal-fill fs-4"></i>
                        </div>
                        <div class="text-start">
                            <p class="mb-0 fw-bold text-dark small">Modern Tech Academy</p>
                            <p class="mb-0 text-muted extra-small">Git, React, PHP & Python</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</header>

<!-- Styles for the Hero Section background gradient -->
<style>
    .bg-gradient-hero {
        background: radial-gradient(circle at 10% 20%, rgba(25, 135, 84, 0.03) 0%, rgba(255, 255, 255, 1) 90%);
    }
    .fw-black {
        font-weight: 900;
    }
    .extra-small {
        font-size: 0.75rem;
    }
</style>

<!-- PRODUCTS SLIDER SECTION -->
<section id="products" class="py-5 bg-white overflow-hidden">
    <div class="container py-4">
        
        <!-- Section Header with Navigation Arrows -->
        <div class="row align-items-end mb-4 g-3">
            <div class="col-md-8 text-center text-md-start reveal-fade-up">
                <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill mb-2 uppercase tracking-wider extra-small">DIGITAL SHOP</span>
                <h2 class="fw-bold text-dark mb-2">Our Premium E-Books & Code Starters</h2>
                <p class="text-secondary mb-0">Accelerate your build velocity and learning curve with elite resources curated by the Air9ja studio team.</p>
            </div>
            <!-- Slider Controls (Hooked into Swiper JS) -->
            <div class="col-md-4 d-flex justify-content-center justify-content-md-end gap-2 reveal-fade-up">
                <button class="btn btn-outline-dark rounded-circle d-flex align-items-center justify-content-center swiper-prev" style="width: 45px; height: 45px;">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="btn btn-success text-white rounded-circle d-flex align-items-center justify-content-center swiper-next" style="width: 45px; height: 45px;">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>
        </div>

        <!-- Swiper Container -->
        <div class="swiper projectSwiper pb-5 reveal-cards">
            <div class="swiper-wrapper">
                
                <!-- Product Card 1: E-Book -->
                <div class="swiper-slide h-auto">
                    <div class="card h-100 border border-light-subtle shadow-sm rounded-4 hover-lift overflow-hidden bg-light">
                        <div class="position-relative">
                            <span class="badge bg-dark text-white position-absolute top-0 start-0 m-3 z-3 shadow-sm px-2.5 py-1.5 extra-small">BEST SELLER</span>
                            <div class="bg-success bg-opacity-10 py-5 d-flex align-items-center justify-content-center border-bottom border-light-subtle">
                                <i class="bi bi-book-half text-success display-1"></i>
                            </div>
                        </div>
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-success fw-bold small uppercase">E-BOOK</span>
                                    <h5 class="fw-bold text-dark mb-0">$19.99</h5>
                                </div>
                                <h5 class="card-title fw-bold text-dark mb-2">Mastering Modern API Development</h5>
                                <p class="card-text text-secondary small mb-4">Learn RESTful and GraphQL design with authentication, security, and optimization paradigms from scratch.</p>
                            </div>
                            <button class="btn btn-outline-success w-100 fw-bold py-2 rounded-3" data-bs-toggle="modal" data-bs-target="#authModal">
                                Buy Now <i class="bi bi-cart3 ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 2: Code Starter kit -->
                <div class="swiper-slide h-auto">
                    <div class="card h-100 border border-light-subtle shadow-sm rounded-4 hover-lift overflow-hidden bg-light">
                        <div class="position-relative">
                            <span class="badge bg-success text-white position-absolute top-0 start-0 m-3 z-3 shadow-sm px-2.5 py-1.5 extra-small">SAAS TEMPLATE</span>
                            <div class="bg-dark bg-opacity-10 py-5 d-flex align-items-center justify-content-center border-bottom border-light-subtle">
                                <i class="bi bi-braces-asterisk text-dark display-1"></i>
                            </div>
                        </div>
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-secondary fw-bold small uppercase">PHP/REACTIVE KIT</span>
                                    <h5 class="fw-bold text-dark mb-0">$49.00</h5>
                                </div>
                                <h5 class="card-title fw-bold text-dark mb-2">Fullstack Bootstrap-Admin Boilerplate</h5>
                                <p class="card-text text-secondary small mb-4">A production-ready blueprint with fully integrated user profiles, DB queries, and pre-styled dashboard systems.</p>
                            </div>
                            <button class="btn btn-outline-success w-100 fw-bold py-2 rounded-3" data-bs-toggle="modal" data-bs-target="#authModal">
                                Get Blueprint <i class="bi bi-cart3 ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 3: Video Series Bundle -->
                <div class="swiper-slide h-auto">
                    <div class="card h-100 border border-light-subtle shadow-sm rounded-4 hover-lift overflow-hidden bg-light">
                        <div class="position-relative">
                            <span class="badge bg-success text-white position-absolute top-0 start-0 m-3 z-3 shadow-sm px-2.5 py-1.5 extra-small">POPULAR BUNDLE</span>
                            <div class="bg-success bg-opacity-10 py-5 d-flex align-items-center justify-content-center border-bottom border-light-subtle">
                                <i class="bi bi-camera-reels text-success display-1"></i>
                            </div>
                        </div>
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-success fw-bold small uppercase">TUTORIAL BUNDLE</span>
                                    <h5 class="fw-bold text-dark mb-0">$29.99</h5>
                                </div>
                                <h5 class="card-title fw-bold text-dark mb-2">Mobile UI Design System Crash Course</h5>
                                <p class="card-text text-secondary small mb-4">Over 5 hours of intensive visual breakdowns detailing grid alignments, dark mode optimization, and micro-interactions.</p>
                            </div>
                            <button class="btn btn-outline-success w-100 fw-bold py-2 rounded-3" data-bs-toggle="modal" data-bs-target="#authModal">
                                Buy Bundle <i class="bi bi-cart3 ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 4: Dev Ops Kit -->
                <div class="swiper-slide h-auto">
                    <div class="card h-100 border border-light-subtle shadow-sm rounded-4 hover-lift overflow-hidden bg-light">
                        <div class="position-relative">
                            <span class="badge bg-dark text-white position-absolute top-0 start-0 m-3 z-3 shadow-sm px-2.5 py-1.5 extra-small">DEVELOPER KIT</span>
                            <div class="bg-dark bg-opacity-10 py-5 d-flex align-items-center justify-content-center border-bottom border-light-subtle">
                                <i class="bi bi-shield-check text-dark display-1"></i>
                            </div>
                        </div>
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-secondary fw-bold small uppercase">DOCKER CONFIGS</span>
                                    <h5 class="fw-bold text-dark mb-0">$12.00</h5>
                                </div>
                                <h5 class="card-title fw-bold text-dark mb-2">Instant Local Env Docker Configurations</h5>
                                <p class="card-text text-secondary small mb-4">Fully optimized orchestrations for running PHP, Node, Postgres, and Redis side-by-side locally instantly.</p>
                            </div>
                            <button class="btn btn-outline-success w-100 fw-bold py-2 rounded-3" data-bs-toggle="modal" data-bs-target="#authModal">
                                Secure Source <i class="bi bi-cart3 ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            
            <!-- Pagination Bullets Indicator -->
            <div class="swiper-pagination mt-4 position-relative"></div>
        </div>

    </div>
</section>

<!-- Custom Styling to Add Elegant Hover Motions -->
<style>
    .hover-lift {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-lift:hover {
        transform: translateY(-8px);
        box-shadow: 0 .5rem 1.5rem rgba(0, 0, 0, 0.08) !important;
    }
</style>

<!-- GADGETS, BOOKS & LAPTOPS SLIDER SECTION -->
<section id="gadgets-shop" class="py-5 bg-light overflow-hidden">
    <div class="container py-4">
        
        <!-- Section Header with Navigation Arrows -->
        <div class="row align-items-end mb-4 g-3">
            <div class="col-md-8 text-center text-md-start reveal-fade-up">
                <span class="badge bg-dark text-white fw-bold px-3 py-2 rounded-pill mb-2 uppercase tracking-wider extra-small">HARDWARE &amp; GEAR</span>
                <h2 class="fw-bold text-dark mb-2">Developer Gear &amp; Hard-Copy Books</h2>
                <p class="text-secondary mb-0">Premium physical tools, handbooks, and ergonomic laptop essentials to supercharge your workspace.</p>
            </div>
            <!-- Slider Controls (Hooked into Gadget Swiper JS) -->
            <div class="col-md-4 d-flex justify-content-center justify-content-md-end gap-2 reveal-fade-up">
                <button class="btn btn-outline-dark rounded-circle d-flex align-items-center justify-content-center gadget-prev" style="width: 45px; height: 45px;">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="btn btn-success text-white rounded-circle d-flex align-items-center justify-content-center gadget-next" style="width: 45px; height: 45px;">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>
        </div>

        <!-- Swiper Container -->
        <div class="swiper gadgetSwiper pb-5 reveal-cards">
            <div class="swiper-wrapper">
                
                <!-- Product 1: Premium Laptop Stand -->
                <div class="swiper-slide h-auto">
                    <div class="card h-100 border-0 shadow-sm rounded-4 hover-lift overflow-hidden bg-white">
                        <div class="position-relative">
                            <span class="badge bg-success text-white position-absolute top-0 start-0 m-3 z-3 shadow-sm px-2.5 py-1.5 extra-small">ERGONOMICS</span>
                            <div class="bg-success bg-opacity-10 py-5 d-flex align-items-center justify-content-center border-bottom border-light-subtle">
                                <i class="bi bi-laptop text-success display-1"></i>
                            </div>
                        </div>
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-success fw-bold small uppercase">ACCESSORIES</span>
                                    <h5 class="fw-bold text-dark mb-0">$34.99</h5>
                                </div>
                                <h5 class="card-title fw-bold text-dark mb-2">Aluminium Ergonomic Laptop Stand</h5>
                                <p class="card-text text-secondary small mb-4">Fully adjustable, highly portable, and designed with optimal heat dissipation cutouts to keep your laptop cool under load.</p>
                            </div>
                            <button class="btn btn-outline-success w-100 fw-bold py-2 rounded-3" data-bs-toggle="modal" data-bs-target="#authModal">
                                Order Gear <i class="bi bi-bag-plus ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 2: Hard-Copy Developer Book -->
                <div class="swiper-slide h-auto">
                    <div class="card h-100 border-0 shadow-sm rounded-4 hover-lift overflow-hidden bg-white">
                        <div class="position-relative">
                            <span class="badge bg-dark text-white position-absolute top-0 start-0 m-3 z-3 shadow-sm px-2.5 py-1.5 extra-small">HARDCOVER</span>
                            <div class="bg-dark bg-opacity-10 py-5 d-flex align-items-center justify-content-center border-bottom border-light-subtle">
                                <i class="bi bi-journal-richtext text-dark display-1"></i>
                            </div>
                        </div>
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-secondary fw-bold small uppercase">GUIDES &amp; BOOKS</span>
                                    <h5 class="fw-bold text-dark mb-0">$45.00</h5>
                                </div>
                                <h5 class="card-title fw-bold text-dark mb-2">Software Architecture Blueprints</h5>
                                <p class="card-text text-secondary small mb-4">A visual guide with over 200 real-world microservice flowcharts, architectural case studies, and code templates.</p>
                            </div>
                            <button class="btn btn-outline-success w-100 fw-bold py-2 rounded-3" data-bs-toggle="modal" data-bs-target="#authModal">
                                Purchase Book <i class="bi bi-bag-plus ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 3: Type-C Workspace Dock -->
                <div class="swiper-slide h-auto">
                    <div class="card h-100 border-0 shadow-sm rounded-4 hover-lift overflow-hidden bg-white">
                        <div class="position-relative">
                            <span class="badge bg-success text-white position-absolute top-0 start-0 m-3 z-3 shadow-sm px-2.5 py-1.5 extra-small">CONNECTIVITY</span>
                            <div class="bg-success bg-opacity-10 py-5 d-flex align-items-center justify-content-center border-bottom border-light-subtle">
                                <i class="bi bi-usb-c-fill text-success display-1"></i>
                            </div>
                        </div>
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-success fw-bold small uppercase">GADGETS</span>
                                    <h5 class="fw-bold text-dark mb-0">$59.99</h5>
                                </div>
                                <h5 class="card-title fw-bold text-dark mb-2">8-in-1 Multi-Port USB-C Hub</h5>
                                <p class="card-text text-secondary small mb-4">Engineered with dual HDMI ports supporting 4K output, high-speed ethernet, and a PD 100W laptop pass-through charger.</p>
                            </div>
                            <button class="btn btn-outline-success w-100 fw-bold py-2 rounded-3" data-bs-toggle="modal" data-bs-target="#authModal">
                                Order Hub <i class="bi bi-bag-plus ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 4: Ergonomic Coding Mouse -->
                <div class="swiper-slide h-auto">
                    <div class="card h-100 border-0 shadow-sm rounded-4 hover-lift overflow-hidden bg-white">
                        <div class="position-relative">
                            <span class="badge bg-dark text-white position-absolute top-0 start-0 m-3 z-3 shadow-sm px-2.5 py-1.5 extra-small">HARDWARE</span>
                            <div class="bg-dark bg-opacity-10 py-5 d-flex align-items-center justify-content-center border-bottom border-light-subtle">
                                <i class="bi bi-mouse3 text-dark display-1"></i>
                            </div>
                        </div>
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-secondary fw-bold small uppercase">PERIPHERALS</span>
                                    <h5 class="fw-bold text-dark mb-0">$24.50</h5>
                                </div>
                                <h5 class="card-title fw-bold text-dark mb-2">Wireless Quiet-Click Mouse</h5>
                                <p class="card-text text-secondary small mb-4">Silent switches, customizable DPI, and long-lasting rechargeable battery life tailored for long-haul development sessions.</p>
                            </div>
                            <button class="btn btn-outline-success w-100 fw-bold py-2 rounded-3" data-bs-toggle="modal" data-bs-target="#authModal">
                                Buy Mouse <i class="bi bi-bag-plus ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            
            <!-- Pagination Bullets Indicator -->
            <div class="swiper-pagination-gadget mt-4 text-center"></div>
        </div>

    </div>
</section>
<?php include __dir__."/footer.php"; ?>