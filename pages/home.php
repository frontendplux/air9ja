<?php
$page = max(1, (int)($_GET['page'] ?? 1));

$limit = 10;

$offset = ($page - 1) * $limit;

$blog = $main->fetch_all_blog([
    'limit' => $limit,
    'offset' => $offset
]);


// $blog=$main->fetch_all_blog([
//     'offset'=>isset($_GET['page']) ? $_GET['page'] + 10 : 0,
//     'limit'=>10
//     ]);
include __DIR__."/component/header.php";
?>
    <!-- 3. HERO NEWS SECTION -->
    <?php if(!isset($_GET['page'])): ?>
    <section class="container my-4">
        <div class="row g-4">
            
            <!-- Main Featured Story (Left Side) -->
            <div class="col-lg-8">
                <div class="card border-0 rounded-4 overflow-hidden shadow-sm bg-dark text-white position-relative" style="min-height: 500px;">
                    <!-- Background Image Placeholder -->
                    <img src="<?= htmlspecialchars($blogtrending['data'][0]['image']) ?>" class="card-img h-100 object-fit-cover position-absolute" alt="Featured News">
                    <!-- Overlay Gradient -->
                    <div class="card-img-overlay bg-gradient-dark d-flex flex-column justify-content-end p-4 p-md-5">
                        <div>
                            <a href="/<?= htmlspecialchars($blogtrending['data'][0]['cat_slug']) ?>" class="badge bg-danger text-decoration-none mb-3 px-3 py-2 text-uppercase tracking-wider"><?= htmlspecialchars($blogtrending['data'][0]['cat_name']) ?></a>
                            <h2 class="card-title display-6 fw-bold mb-3 lh-sm">
                                <a href="/<?= $blogtrending['data'][0]['slug'] ?>" class="text-white text-decoration-none stretched-link">
                                    <?= htmlspecialchars($blogtrending['data'][0]['title']) ?>
                                </a>
                            </h2>
                            <p class="card-text text-white-50 max-w-xl d-none d-md-block">
                               <?= htmlspecialchars($blogtrending['data'][0]['description']) ?>
                            </p>
                            <div class="d-flex align-items-center gap-2 small text-white-50 mt-3">
                                <span class="fw-bold text-white">By <?= htmlspecialchars($company_info['name']) ?></span>
                                <span>•</span>
                                <span><?= timeAgo($blogtrending['data'][0]['created_at']) ?> read</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Trending Sidebar (Right Side) -->
            <div class="col-lg-4 d-flex flex-column justify-content-between gap-3">
                <div class="p-3 bg-white rounded-4 shadow-sm border-0 h-100">
                    <h4 class="fw-bold mb-4 d-flex align-items-center text-dark">
                        <i class="bi bi-lightning-charge-fill text-warning me-2"></i> Trending News
                    </h4>
                    
                    <!-- Trending Item 1 -->
                    <?php foreach($blogtrending['data'] as $key => $blogtrend): ?>
                    <div class="d-flex gap-3 pb-3 mb-3 border-top align-items-center">
                        <span class="display-6 fw-bold text-black-50 lh-1" style="width: 50px;">0<?= $key+1 ?></span>
                        <div>
                            <a href="/<?= $blogtrend['cat_slug'] ?>" class="text-uppercase text-decoration-none text-muted fw-bold small" style="font-size: 0.75rem;"><?= htmlspecialchars($blogtrend['cat_name']) ?></a>
                            <h6 class="mb-1 fw-bold line-clamp-2">
                                <a href="/<?= $blogtrend['slug'] ?>" class="text-dark text-decoration-none"><?= htmlspecialchars($blogtrend['title']) ?></a>
                            </h6>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>

        </div>
    </section>
    <?php endif; ?>
<!-- 4. POST FEED SECTION -->
    <section class="container mb-5 my-4">
        <!-- Section Title -->
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
            <h3 class="fw-bold m-0" style="font-family: 'Georgia', serif;"><?= !isset($_GET['page']) ? 'Latest Stories':'More Post' ?></h3>
            <a href="#" class="text-danger d-none text-decoration-none fw-bold small">View All <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="row g-4">
            <!-- Left Side: Main Post Feed Grid -->
            <div class="col-lg-8">
                <div class="row g-4">
                    <!-- Post Card 1 (Standard Image Top) -->
                    <?php $keyblog=0; foreach($blog['data'] as $blogpost): $keyblog+=1?>
                    <?php  if($keyblog == 3): $keyblog = 0?>
 <!-- Post Card 3 (Horizontal Format) -->
                    <div class="col-12">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden hover-lift bg-white">
                            <div class="row g-0">
                                <div class="col-md-5 position-relative" style="min-height: 200px;">
                                    <img src="<?= $blogpost['image'] ?>" class="w-100 h-100 object-fit-cover position-absolute" alt="News image">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body p-4 h-100 d-flex flex-column justify-content-between">
                                        <div>
                                            <a href="/<?= $blogpost['cat_slug'] ?>" class="text-danger text-decoration-none fw-bold tracking-wider small text-uppercase mb-2 d-inline-block"><?= htmlspecialchars($blogpost['cat_name']) ?></a>
                                            <h4 class="card-title fw-bold mb-2">
                                                <a href="/<?= $blogpost['slug'] ?>" class="text-dark text-decoration-none stretched-link"><?= htmlspecialchars($blogpost['title']) ?></a>
                                            </h4>
                                            <p class="card-text text-muted small d-none d-sm-block"><?= htmlspecialchars($blogpost['description']) ?></p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-3 text-muted small">
                                            <span>By <strong><?= $company_info['name'] ?></strong></span>
                                            <span class="d-none"><i class="bi bi-chat-right-text me-1"></i> 14 comments</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php  else: ?>
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden hover-lift bg-white">
                            <div class="position-relative">
                                <img src="<?= $blogpost['image'] ?>" class="card-img-top object-fit-cover" style="height: 220px;" alt="News image">
                                <a href="/<?= $blogpost['cat_slug'] ?>" class="badge bg-dark position-absolute top-0 start-0 m-3 rounded-pill text-decoration-none"><?= htmlspecialchars($blogpost['cat_name']) ?></a>
                            </div>
                            <div class="card-body p-4 d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="card-title fw-bold mb-2">
                                        <a href="/<?= $blogpost['slug'] ?>" class="text-dark text-decoration-none stretched-link"><?= htmlspecialchars($blogpost['title']) ?></a>
                                    </h5>
                                    <p class="card-text text-muted small line-clamp-2"><?= htmlspecialchars($blogpost['description']) ?></p>
                                </div>
                                <div class="d-flex align-items-center gap-2 mt-3 pt-3 border-top text-muted small">
                                    <i class="bi bi-clock"></i> <span><?= timeAgo($blogpost['created_at']) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endif; endforeach ?>
                   
                    <!-- 8. PREMIUM PAGINATION SECTION -->

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

    <!-- Tiny inline adjustments to ensure smooth custom hovers -->
    <style>
        .pagination .page-item.active .page-link {
            background-color: #dc3545 !important; /* Custom brand red match */
            border-color: #dc3545 !important;
            color: #fff !important;
        }
        .hover-bg-light {
            background-color: transparent;
            transition: background-color 0.2s ease;
        }
        .hover-bg-light:hover {
            background-color: #e9ecef !important;
        }
    </style>
                </div>
            </div>

            <!-- Right Side: Editors Picks & Quick Text Links -->
            <div class="col-lg-4">
               <?php include __DIR__.'/component/aside.php'; ?>
            </div>
        </div>
    </section>
    <!-- 5. SPONSORED ADVERTISEMENT BANNER -->
    <section class="container my-5">
        <!-- Wrapper Card with subtle border and premium background color -->
         <?php include __DIR__.'/component/ads.php'; ?>
    </section>
 <?php include __DIR__.'/component/footer.php'; ?>