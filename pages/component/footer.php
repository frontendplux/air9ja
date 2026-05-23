
    <!-- 6. PREMIUM FOOTER SECTION -->
    <footer class="bg-dark text-white pt-5 pb-4 mt-5 border-top border-secondary border-opacity-25">
        <div class="container">
            <div class="row g-4">
                
                <!-- Column 1: Brand & About -->
                <div class="col-lg-4 col-md-10">
                    <h2 class="fw-black text-white mb-3" style="font-family: 'Georgia', serif; font-weight: 900; letter-spacing: -1px;">
                        <?= htmlspecialchars($company_info['name']); ?>
                    </h2>
                    <p class="text-white-50 small pe-lg-4 mb-4">
                        <?= htmlspecialchars($company_info['description']) ?>
                    </p>
                    <!-- Social Links -->
                    <div class="d-flex gap-3 fs-5">
                        <a href="<?= $company_info['social-info']['twitter'] ?>" class="text-white-50 hover-white transition-all"><i class="bi bi-twitter-x"></i></a>
                        <a href="<?= $company_info['social-info']['facebook'] ?>" class="text-white-50 hover-white transition-all"><i class="bi bi-facebook"></i></a>
                        <a href="<?= $company_info['social-info']['instagram'] ?>" class="text-white-50 hover-white transition-all"><i class="bi bi-instagram"></i></a>
                        <a href="<?= $company_info['social-info']['linkedin'] ?>" class="text-white-50 hover-white transition-all"><i class="bi bi-linkedin"></i></a>
                        <a href="<?= $company_info['social-info']['youtube'] ?>" class="text-white-50 hover-white transition-all"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>

                <!-- Column 2: News Categories -->
                <div class="col-6 col-sm-4 col-lg-2">
                    <h6 class="text-uppercase fw-bold text-white mb-3 tracking-wider" style="font-size: 0.8rem; letter-spacing: 1px;">News</h6>
                    <ul class="list-unstyled d-flex flex-column gap-2 small">
                        <?php foreach($category['data'] as $cat): ?>
                         <li><a href="/<?= $cat['name'] ?>" class="text-white-50 text-decoration-none hover-white"><?= htmlspecialchars($cat['name'] )?></a></li>
                        <?php endforeach ?>
                        <li><a href="#" class="text-white-50 text-decoration-none hover-white">World Politics</a></li>
                    </ul>
                </div>

                <!-- Column 3: Lifestyle & Culture -->
                <div class="col-6 col-sm-4 col-lg-2">
                    <h6 class="text-uppercase fw-bold text-white mb-3 tracking-wider" style="font-size: 0.8rem; letter-spacing: 1px;">Culture</h6>
                    <ul class="list-unstyled d-flex flex-column gap-2 small">
                        <li><a href="#" class="text-white-50 text-decoration-none hover-white">Arts & Literature</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none hover-white">Travel & Leisure</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none hover-white">Food & Dining</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none hover-white">Book Reviews</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none hover-white">Podcasts</a></li>
                    </ul>
                </div>

                <!-- Column 4: Corporate / Support -->
                <div class="col-sm-4 col-lg-2">
                    <h6 class="text-uppercase fw-bold text-white mb-3 tracking-wider" style="font-size: 0.8rem; letter-spacing: 1px;">Company</h6>
                    <ul class="list-unstyled d-flex flex-column gap-2 small">
                        <li><a href="#" class="text-white-50 text-decoration-none hover-white">About Us</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none hover-white">Careers</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none hover-white">Advertise</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none hover-white">Press Room</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none hover-white">Contact & Support</a></li>
                    </ul>
                </div>

                <!-- Column 5: Legal & Preferences -->
                <div class="col-lg-2 text-start text-lg-end d-flex flex-column justify-content-between">
                    <div>
                        <h6 class="text-uppercase fw-bold text-white mb-3 tracking-wider" style="font-size: 0.8rem; letter-spacing: 1px;">Edition</h6>
                        <div class="dropdown d-inline-block">
                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle text-white border-secondary border-opacity-50" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-globe me-1"></i> English (US)
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end shadow">
                                <li><a class="dropdown-item active" href="#">English (US)</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Smooth Scroll Back to Top Button -->
                    <div class="mt-4 mt-lg-0">
                        <button onclick="window.scrollTo({top: 0, behavior: 'smooth'});" class="btn btn-dark border border-secondary border-opacity-50 btn-sm rounded-circle" title="Back to Top" style="width: 38px; height: 38px; padding: 0;">
                            <i class="bi bi-arrow-up"></i>
                        </button>
                    </div>
                </div>

            </div>

            <!-- Horizontal Break -->
            <hr class="my-4 opacity-10 border-white">

            <!-- Bottom Bar: Legal Notices & Rights -->
            <div class="row align-items-center g-3 small">
                <div class="col-md-6 text-center text-md-start text-white-50">
                    &copy; 2026 <?= htmlspecialchars($company_info['name']) ?>. All rights reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="d-flex justify-content-center justify-content-md-end gap-3 text-nowrap">
                        <a href="#" class="text-white-50 text-decoration-none hover-white">Privacy Policy</a>
                        <span class="text-white-50 opacity-25">|</span>
                        <a href="#" class="text-white-50 text-decoration-none hover-white">Terms of Service</a>
                    </div>
                </div>
            </div>

        </div>
    </footer>
    
    <!-- Add these extra tiny inline styles into your page <style> section for perfect states -->
    <style>
        .hover-white { transition: color 0.2s ease-in-out; }
        .hover-white:hover { color: #fff !important; }
        .transition-all { transition: all 0.2s ease-in-out; }
    </style>
</body>
</html>