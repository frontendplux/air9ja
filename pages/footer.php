<!-- FOOTER SECTION -->
<footer class="bg-dark text-white pt-5 pb-3">
    <div class="container">
        <div class="row g-4 mb-5">
            
            <!-- Column 1: Brand, Bio & Socials -->
            <div class="col-lg-4 col-md-6">
                <a class="fw-bold fs-3 text-success d-flex align-items-center text-decoration-none mb-3" href="#">
                    <i class="bi bi-cloud-lightning-fill me-2"></i>Air<span class="text-white">9ja</span>
                </a>
                <p class="text-secondary small mb-4" style="max-width: 320px;">
                    Empowering your digital future. We deliver world-class websites, scalable mobile applications, premium educational resources, and elite coding bootcamps.
                </p>
                <!-- Social Connections -->
                <div class="d-flex gap-2">
                    <a href="#" class="btn btn-outline-success text-white btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;"><i class="bi bi-linkedin"></i></a>
                    <a href="#" class="btn btn-outline-success text-white btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="btn btn-outline-success text-white btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;"><i class="bi bi-github"></i></a>
                    <a href="#" class="btn btn-outline-success text-white btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;"><i class="bi bi-instagram"></i></a>
                </div>
            </div>

            <!-- Column 2: Quick Navigation -->
            <div class="col-lg-2 col-6 col-md-6">
                <h6 class="fw-bold text-white uppercase tracking-wider mb-3">Quick Links</h6>
                <ul class="list-unstyled d-flex flex-column gap-2 small">
                    <li><a href="#" class="text-secondary text-decoration-none hover-success-link">Home</a></li>
                    <li><a href="#about" class="text-secondary text-decoration-none hover-success-link">About Us</a></li>
                    <li><a href="#products" class="text-secondary text-decoration-none hover-success-link">E-Books Store</a></li>
                    <li><a href="#gadgets-shop" class="text-secondary text-decoration-none hover-success-link">Developer Gear</a></li>
                    <li><a href="#academy" class="text-secondary text-decoration-none hover-success-link">Coding Academy</a></li>
                </ul>
            </div>

            <!-- Column 3: Studio Offerings -->
            <div class="col-lg-3 col-6 col-md-6">
                <h6 class="fw-bold text-white uppercase tracking-wider mb-3">Our Offerings</h6>
                <ul class="list-unstyled d-flex flex-column gap-2 small">
                    <li><a href="#websites" class="text-secondary text-decoration-none hover-success-link"><i class="bi bi-laptop text-success me-1"></i> Web Development</a></li>
                    <li><a href="#apps" class="text-secondary text-decoration-none hover-success-link"><i class="bi bi-phone text-success me-1"></i> App Engineering</a></li>
                    <li><a href="#consulting" class="text-secondary text-decoration-none hover-success-link"><i class="bi bi-patch-check text-success me-1"></i> Cloud Architecture</a></li>
                    <li><a href="#academy" class="text-secondary text-decoration-none hover-success-link"><i class="bi bi-terminal text-success me-1"></i> 1-on-1 Mentorship</a></li>
                </ul>
            </div>

            <!-- Column 4: Newsletter Subscription -->
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold text-white uppercase tracking-wider mb-3">Join Our Newsletter</h6>
                <p class="text-secondary small mb-3">Subscribe to get free learning materials, tech insights, and cohort notifications.</p>
                <form action="#" method="POST" class="needs-validation" novalidate>
                    <div class="input-group mb-2">
                        <input type="email" class="form-control bg-dark text-white border-secondary small" placeholder="Your Email" required>
                        <button class="btn btn-success text-white" type="submit">
                            <i class="bi bi-send-fill"></i>
                        </button>
                    </div>
                    <span class="text-muted extra-small" style="font-size: 0.7rem;">We promise not to spam. Unsubscribe anytime.</span>
                </form>
            </div>

        </div>

        <!-- Divider Line -->
        <hr class="border-secondary opacity-25 my-4">

        <!-- Bottom Copyright Row -->
        <div class="row align-items-center g-3">
            <div class="col-md-6 text-center text-md-start">
                <p class="text-secondary small mb-0">&copy; <?php echo date("Y"); ?> Air9ja. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <ul class="list-inline mb-0 small">
                    <li class="list-inline-item"><a href="#privacy" class="text-secondary text-decoration-none hover-success-link">Privacy Protocol</a></li>
                    <li class="list-inline-item text-secondary mx-2">|</li>
                    <li class="list-inline-item"><a href="#terms" class="text-secondary text-decoration-none hover-success-link">Terms of Service</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Custom Hover styling block to preserve CSS structure directly -->
<style>
    .hover-success-link {
        transition: color 0.2s ease-in-out;
    }
    .hover-success-link:hover {
        color: #198754 !important; /* Bootstrap success color */
    }
    .extra-small {
        font-size: 0.75rem;
    }
</style>

<!-- Bootstrap JS Bundle (Includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Swiper JS & ScrollReveal Hook Configurations -->
<script>
    // 1. Initialize E-books / Digital Products Slider 
    const swiper = new Swiper('.projectSwiper', {
        slidesPerView: 1.2,
        spaceBetween: 24,
        loop: true,
        grabCursor: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            dynamicBullets: true,
        },
        navigation: {
            nextEl: '.swiper-next',
            prevEl: '.swiper-prev',
        },
        breakpoints: {
            576: { slidesPerView: 1.5 },
            768: { slidesPerView: 2 },
            1200: { slidesPerView: 3 }
        }
    });

    // 2. Initialize Gadgets & Laptop Gear Slider
    const gadgetSwiper = new Swiper('.gadgetSwiper', {
        slidesPerView: 1.2,
        spaceBetween: 24,
        loop: true,
        grabCursor: true,
        pagination: {
            el: '.swiper-pagination-gadget',
            clickable: true,
            dynamicBullets: true,
        },
        navigation: {
            nextEl: '.gadget-next',
            prevEl: '.gadget-prev',
        },
        breakpoints: {
            576: { slidesPerView: 1.5 },
            768: { slidesPerView: 2 },
            1200: { slidesPerView: 3 }
        }
    });

    // 3. Initialize ScrollReveal Animations 
    ScrollReveal({ 
        reset: false,
        distance: '60px',
        duration: 1200,
        delay: 200
    });

    ScrollReveal().reveal('.reveal-fade-up', { origin: 'top' });
    ScrollReveal().reveal('.reveal-cards', { origin: 'bottom', delay: 400 });
</script>
</body>
</html>