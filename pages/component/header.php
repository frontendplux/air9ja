<!DOCTYPE html>
<html lang="en">
<head>
   <?php
    $category=$main->fetch_all_category();
    $blogtrending=$main->fetch_trending_blog([
    'offset'=>0,
    'limit'=>4
    ]);
    ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- SEO Meta Tags -->
    <title>Air9ja - <?= $company_info['title'] ?></title>
    <meta name="description" content="<?= $company_info['description'] ?>" />
    <meta name="keywords" content="<?= $company_info['keywords'] ?>" />
    <meta name="author" content="Air9ja" />
    <meta name="robots" content="index, follow" />

    <!-- Open Graph SEO -->
    <meta property="og:title" content="Air9ja - <?= $company_info['title'] ?>" />
    <meta property="og:description" content="<?= $company_info['description'] ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://air9ja.com" />
    <meta property="og:image" content="<?= $company_info['image'] == '' ? $company_info['icon'] : $company_info['image'] ?>" />

    <!-- Twitter SEO -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Air9ja - <?= $company_info['title'] ?>" />
    <meta name="twitter:description" content="<?= $company_info['description'] ?>" />
    <meta name="twitter:image" content="<?= $company_info['image'] == '' ? $company_info['icon'] : $company_info['image'] ?> " />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?= $company_info['icon'] ?>" />

    <!-- Bootstrap CSS -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    />

    <!-- Bootstrap Icons -->
    <link 
        rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    />

    <!-- Bootstrap JS -->
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js">
    </script>

</head>
<body>

 <style>
        /* Custom tweaks to elevate the design */
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }
        .nav-link {
            font-weight: 500;
            transition: color 0.2s ease;
        }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;  
            overflow: hidden;
        }
        .bg-gradient-dark {
            background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.3) 50%, rgba(0,0,0,0) 100%);
        }
    </style>

    <!-- 1. TOP TICKER BAR -->
    <div class="bg-dark text-white py-2 d-none d-md-block border-bottom border-secondary border-opacity-25">
        <div class="container d-flex justify-content-between align-items-center small">
            <div class="d-flex align-items-center">
                <span class="badge bg-danger text-uppercase me-3 px-2 py-1">Breaking</span>
                <div class="text-truncate" style="max-width: 500px;">
                    <marquee>
                        <?php foreach($blogtrending['data'] as $trend): ?>
                        <a href="/<?= htmlspecialchars($trend['slug']) ?>" class="text-white text-decoration-none me-5"><i class="bi bi-circle-fill text-danger me-2"></i><?= htmlspecialchars($trend['title']) ?></a>
                        <?php endforeach ?>
                    </marquee>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span><i class="bi bi-calendar3 me-1"></i> <?= date("M d, Y"); ?></span>
                <span class="vr"></span>
                <a href="<?= $company_info['social-info']['twitter'] ?>" class="text-white-50 hover-white"><i class="bi bi-twitter-x"></i></a>
                <a href="<?= $company_info['social-info']['facebook'] ?>" class="text-white-50 hover-white"><i class="bi bi-facebook"></i></a>
                <a href="<?= $company_info['social-info']['instagram'] ?>" class="text-white-50 hover-white"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
    </div>

    <!-- 2. MAIN HEADER & BRANDING -->
    <header class="py-4 bg-white border-bottom shadow-sm sticky-top">
        <div class="container">
            <div class="row align-items-center g-3">
                <!-- Mobile Menu Toggle -->
                <div class="col-2 d-md-none">
                    <button class="btn btn-link text-dark p-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                        <i class="bi bi-list fs-1"></i>
                    </button>
                </div>
                
                <!-- Logo / Brand -->
                <div class="col-8 col-md-4 text-center text-md-start">
                    <a href="#" class="text-dark text-decoration-none">
                        <h1 class="fw-black mb-0 tracking-tight" style="font-family: 'Georgia', serif; font-weight: 900; letter-spacing: -1px;">
                            <?= $company_info['name'] ?>
                        </h1>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="col-12 col-md-6 collapse d-md-block" id="mainNav">
                    <nav class="d-flex flex-column flex-md-row justify-content-md-center gap-3 gap-md-4 pt-3 pt-md-0">
                        <!-- <a href="/" class="nav-link text-danger border-bottom border-danger border-2 d-inline-block pb-1">Home</a> -->
                        <a href="/" class="nav-link text-secondary">Home</a>
                        <?php foreach($category['data'] as $cat): ?>
                         <a href="/<?= $cat['slug'] ?>" class="nav-link text-secondary"><?= htmlspecialchars($cat['name'] )?></a>
                        <?php endforeach ?>
                    </nav>
                </div>

                <!-- Actions (Search / Subscribe) -->
                <div class="col-2 col-md-2 text-end d-flex justify-content-end align-items-center gap-3">
                    <button class="btn btn-link text-dark p-0 d-none d-sm-inline-block" type="button">
                        <i class="bi bi-search fs-5"></i>
                    </button>
                    <a href="/auth/" class="btn btn-outline-dark p-2 px-lg-5 px-3 btn-sm rounded-pill  fw-bold">Login&nbsp;/&nbsp;signup</a>
                </div>
            </div>
        </div>
    </header>