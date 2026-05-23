 <!-- 1. DESKTOP PERMANENT SIDEBAR DRAWER PANEL -->
    <div class="sidebar-fixed d-none d-lg-flex flex-column p-4 text-white justify-content-between">
        <div>
            <div class="mb-2">
                <h3 class="brand-logo text-center m-0 text-white"><?= htmlspecialchars($company_info['name'])  ?></h3>
                <span class="text-muted small text-uppercase tracking-wider font-monospace" style="font-size: 0.65rem;">Workspace Console</span>
            </div>
            
            <nav class="nav flex-column gap-1">
                <a class="nav-link nav-link-custom <?= $route2 == '/' ? 'active' : '' ?> rounded-3 px-3 py-2.5 d-flex align-items-center gap-3" href="/member">
                    <i class="bi bi-speedometer2 fs-5"></i> Overview Dashboard
                </a>
                <a class="nav-link nav-link-custom <?= $route2 == '/post' ? 'active' : '' ?> rounded-3 px-3 py-2.5 d-flex align-items-center gap-3" href="/member/post">
                    <i class="bi bi-journal-text fs-5"></i> Stories & Archives
                </a>
                <a class="nav-link nav-link-custom <?= $route2 == '/category' ? 'active' : '' ?> rounded-3 px-3 py-2.5 d-flex align-items-center gap-3" href="/member/category">
                    <i class="bi bi-journal-text fs-5"></i> Category
                </a>
                <a class="nav-link nav-link-custom <?= $route2 == '/coin' ? 'active' : '' ?> rounded-3 px-3 py-2.5 d-flex align-items-center gap-3" href="/member/coin">
                    <i class="bi bi-wallet fs-5"></i> Wallet & Article
                </a>
                <a class="nav-link nav-link-custom <?= $route2 == '/subscriber' ? 'active' : '' ?>  rounded-3 px-3 py-2.5 d-flex align-items-center gap-3" href="/member/subscriber">
                    <i class="bi bi-people fs-5"></i> Subscribers
                </a>
            </nav>
        </div>

        <!-- User Profile Card (Footer Side) -->
        <a href="/member/profile" class="border-top border-secondary border-opacity-25 pt-3 d-flex align-items-center gap-3">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" 
                 class="rounded-circle object-fit-cover" style="width: 40px; height: 40px;" alt="User Avatar">
            <div class="overflow-hidden">
                <h6 class="m-0 fw-bold text-truncate text-white" style="font-size: 0.85rem;">Sarah Jenkins</h6>
                <small class="text-muted text-truncate d-block" style="font-size: 0.75rem;">Senior Editor</small>
            </div>
        </a>
    </div>

      <!-- 2. MOBILE RESPONSIVE OFFCANVAS DRAWER PANEL -->
    <div class="offcanvas offcanvas-start bg-dark text-white p-3" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel" style="width: 280px;">
        <div class="offcanvas-header border-bottom border-secondary border-opacity-25 pb-3">
            <h5 class="offcanvas-title brand-logo" id="mobileSidebarLabel"><?= htmlspecialchars($company_info['name'])  ?></h5>
            <button type="button" class="btn-close btn-close-white" data-bs-toggle="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column justify-content-between p-0 pt-4">
            <nav class="nav flex-column gap-1">
                <a class="nav-link nav-link-custom <?= $route2 == '/' ? 'active' : '' ?> active rounded-3 px-3 py-2.5 d-flex align-items-center gap-3" href="/member/"><i class="bi bi-speedometer2"></i> Overview Dashboard</a>
                <a class="nav-link nav-link-custom <?= $route2 == '/post' ? 'active' : '' ?> rounded-3 px-3 py-2.5 d-flex align-items-center gap-3" href="/member/post"><i class="bi bi-journal-text"></i> Stories & Archives</a>
                <a class="nav-link nav-link-custom <?= $route2 == '/category' ? 'active' : '' ?> rounded-3 px-3 py-2.5 d-flex align-items-center gap-3" href="/member/category"><i class="bi bi-journal-text"></i> Category</a>
                <a class="nav-link nav-link-custom <?= $route2 == '/coin' ? 'active' : '' ?> rounded-3 px-3 py-2.5 d-flex align-items-center gap-3" href="/member/coin"><i class="bi bi-graph-up"></i> Wallet & Article</a>
                <a class="nav-link nav-link-custom <?= $route2 == '/subscriber' ? 'active' : '' ?> rounded-3 px-3 py-2.5 d-flex align-items-center gap-3" href="/member/subscriber"><i class="bi bi-people"></i> Subscribers</a>
            </nav>
              <a href="/member/profile" class="border-top border-secondary border-opacity-25 pt-3 d-flex align-items-center gap-3">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" 
                        class="rounded-circle object-fit-cover" style="width: 40px; height: 40px;" alt="User Avatar">
                    <div class="overflow-hidden">
                        <h6 class="m-0 fw-bold text-truncate text-white" style="font-size: 0.85rem;">Sarah Jenkins</h6>
                        <small class="text-muted text-truncate d-block" style="font-size: 0.75rem;">Senior Editor</small>
                    </div>
                </a>
        </div>
    </div>