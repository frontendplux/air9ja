<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - <?= htmlspecialchars($company_info['name'])  ?></title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .brand-logo {
            font-family: 'Georgia', serif;
            font-weight: 900;
            letter-spacing: -1px;
        }
        /* Fixed Sidebar Navigation Sizing rules */
        .sidebar-fixed {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            background-color: #1e293b;
        }
        /* Dynamic main body sizing calculation offsets wrapper */
        .main-content-offset {
            margin-left: 260px;
        }
        .nav-link-custom {
            color: #94a3b8;
            transition: all 0.2s ease;
            font-size: 0.9rem;
        }
        .nav-link-custom:hover, .nav-link-custom.active {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.08);
        }
        .card-stat {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        }
        /* Mobile View Restructuring Overwrite */
        @media (max-width: 991.98px) {
            .sidebar-fixed {
                display: none;
            }
            .main-content-offset {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <!-- MOBILE VIEW HEADER OVERLAY CONTROLLER -->
    <header class="navbar navbar-dark sticky-top bg-dark p-3 d-lg-none shadow-sm">
        <a href="#" class="navbar-brand brand-logo m-0 fs-4"><?= htmlspecialchars($company_info['name'])  ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </header>