<?php
$page = max(1, (int)($_GET['page'] ?? 1));

$limit = 10;

$offset = ($page - 1) * $limit;
$blog = $main->fetch_blogs_by_category([
    'limit' => $limit,
    'offset' => $offset,
    'slug' => $checker['data']['slug'] ?? ''
]) ?? [];

  include __DIR__."/component/header.php";
?>
<style>
        /* Custom UI Refinements */
        body {
            background-color: #f9f9f9;
        }
        .hover-lift {
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .hover-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0,0,0,0.08) !important;
        }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;  
            overflow: hidden;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;  
            overflow: hidden;
        }
        .hover-bg-light {
            transition: background-color 0.2s ease;
        }
        .hover-bg-light:hover {
            background-color: #e9ecef !important;
        }
        .pagination .page-item.active .page-link {
            background-color: #dc3545 !important;
            border-color: #dc3545 !important;
            color: #fff !important;
        }
    </style>

    <!-- SECTION 1: DYNAMIC CATEGORY JUMBOTRON -->
    <section class="bg-white border-bottom py-5 mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="">
                    <!-- Icon mapped dynamically from your category database table -->
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="bg-danger bg-opacity-10 text-danger rounded-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi <?= htmlspecialchars($checker['data']['icon']) ?> fs-3"></i>
                        </div>
                        <span class="text-muted text-uppercase tracking-wider fw-bold small"><a href="/">home</a> <span><?= htmlspecialchars($checker['data']['name']) ?></span></span>
                    </div>
                    <!-- Title & Description fields injected natively via slug verification -->
                    <h1 class="display-4 fw-bold text-dark mb-2" style="font-family: 'Georgia', serif;"><?= htmlspecialchars($checker['data']['name']) ?? '' ?></h1>
                    <p class="lead text-secondary mb-0 max-w-2xl" style="font-size: 1.1rem;">
                       <?= htmlspecialchars($checker['data']['description']) ?? '' ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 2: CENTRAL STORAGE GRID & ADVERT STREAK -->
    <div class="container mb-5">
        <div class="row g-4">
            
            <!-- Left Core Content: Post Feed Stack -->
            <div class="col-lg-8">
                
                <?php foreach($blog['data'] as $blogger): ?>
                <!-- Card 1: Horizontal Block Pattern -->
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 hover-lift bg-white">
                    <div class="row g-0">
                        <div class="col-md-5 position-relative style-min-height" style="min-height: 240px;">
                            <img src="<?= htmlspecialchars($blogger['image']) ?>" class="w-100 h-100 object-fit-cover position-absolute" alt="Quantum">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body p-4 h-100 d-flex flex-column justify-content-between">
                                <div>
                                    <h4 class="fw-bold mb-2">
                                        <a href="<?= htmlspecialchars($blogger['slug']) ?>" class="text-dark text-decoration-none stretched-link"><?= htmlspecialchars($blogger['title']) ?></a>
                                    </h4>
                                    <p class="card-text text-muted small line-clamp-3"><?= htmlspecialchars($blogger['description']) ?></p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between text-muted small mt-3">
                                    <span>By <strong><?= htmlspecialchars($company_info['name']) ?></strong></span>
                                    <span><i class="bi bi-eye me-1"></i> <?= htmlspecialchars($blogger['views']) ?> views</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <!-- INLINE INTEGRATED SPONSORED CONTENT ALERT ROW -->
                <div class="card border-0 rounded-4 overflow-hidden position-relative shadow-sm alert alert-dismissible fade show p-4 bg-light mb-4" role="alert">
                    <button type="button" class="btn-close m-2 z-1 position-absolute top-0 end-0" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="row align-items-center g-2">
                        <div class="col-sm-9">
                            <span class="text-uppercase text-muted fw-bold d-block mb-1" style="font-size: 0.65rem; letter-spacing: 1px;">Sponsor Placement</span>
                            <h5 class="fw-bold text-dark mb-1">Upgrade Workspace Assets with Next-Gen Ergonomics</h5>
                            <p class="text-secondary small mb-0">Discover the Pro-Series SmartDesk. AI posture mechanics built to stabilize computing fatigue vectors natively.</p>
                        </div>
                        <div class="col-sm-3 text-sm-end pt-2 pt-sm-0">
                            <a href="#" class="btn btn-dark btn-sm rounded-pill px-3 fw-bold text-nowrap">Shop Collection</a>
                        </div>
                    </div>
                </div>

<?php

$totalBlogs = (int)($blog['total_blogs'] ?? 0);

$perPage = 10;

// Current page
$currentPage = max(1, (int)($_GET['page'] ?? 1));

// Total pages
$totalPages = max(1, ceil($totalBlogs / $perPage));

// Offset
$offset = ($currentPage - 1) * $perPage;

// Showing range
$start = ($totalBlogs > 0) ? $offset + 1 : 0;

$end = min($offset + $perPage, $totalBlogs);

?>
<nav aria-label="Blog post navigation" class="my-5">
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-3 border-top pt-4">

        <!-- Status -->
        <div class="text-muted small order-2 order-sm-1">
            Showing
            <span class="fw-bold text-dark"><?= $start ?></span>–
            <span class="fw-bold text-dark"><?= $end ?></span>
            of
            <span class="fw-bold text-dark"><?= $totalBlogs ?></span>
            stories
        </div>

        <!-- Pagination -->
        <ul class="pagination pagination-sm m-0 order-1 order-sm-2 gap-1 border-0">

            <!-- Previous -->
            <li class="page-item <?= ($currentPage <= 1) ? 'disabled' : '' ?>">
                <a class="page-link rounded-pill px-3 border-0 bg-light text-muted"
                   href="?page=<?= $currentPage - 1 ?>">

                    <i class="bi bi-arrow-left me-1"></i> Previous
                </a>
            </li>

            <?php

            // Page range
            $startPage = max(1, $currentPage - 2);
            $endPage   = min($totalPages, $currentPage + 2);

            // First page
            if ($startPage > 1):
            ?>
                <li class="page-item">
                    <a class="page-link rounded-circle d-flex align-items-center justify-content-center"
                       style="width:32px;height:32px;"
                       href="?page=1">
                        1
                    </a>
                </li>

                <?php if ($startPage > 2): ?>
                    <li class="page-item d-none d-sm-inline-block">
                        <span class="page-link border-0 bg-transparent">...</span>
                    </li>
                <?php endif; ?>

            <?php endif; ?>

            <!-- Dynamic Pages -->
            <?php for($i = $startPage; $i <= $endPage; $i++): ?>

                <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">

                    <a class="page-link rounded-circle d-flex align-items-center justify-content-center 
                    <?= ($i == $currentPage) ? 'fw-bold' : 'text-dark' ?>"

                       style="width:32px;height:32px;font-size:0.85rem;"
                       href="?page=<?= $i ?>">

                        <?= $i ?>

                    </a>

                </li>

            <?php endfor; ?>

            <!-- Last page -->
            <?php if ($endPage < $totalPages): ?>

                <?php if ($endPage < $totalPages - 1): ?>
                    <li class="page-item d-none d-sm-inline-block">
                        <span class="page-link border-0 bg-transparent">...</span>
                    </li>
                <?php endif; ?>

                <li class="page-item">
                    <a class="page-link rounded-circle d-flex align-items-center justify-content-center"
                       style="width:32px;height:32px;"
                       href="?page=<?= $totalPages ?>">

                        <?= $totalPages ?>

                    </a>
                </li>

            <?php endif; ?>

            <!-- Next -->
            <li class="page-item <?= ($currentPage >= $totalPages) ? 'disabled' : '' ?>">

                <a class="page-link rounded-pill px-3 border-0 bg-dark text-white fw-medium shadow-sm"
                   href="?page=<?= $currentPage + 1 ?>">

                    Next <i class="bi bi-arrow-right ms-1"></i>

                </a>

            </li>

        </ul>

    </div>
</nav>
            </div>

            <!-- Right Core Content: Sidebar Filter Widgets -->
            <div class="col-lg-4" style="height: max-content;">
                <?php include __DIR__."/component/aside.php"; ?>
            </div>

        </div>
    </div>
<?php
  include __DIR__."/component/footer.php";
?>