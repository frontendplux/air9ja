<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found (404) - The Chronicle</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .brand-logo {
            font-family: 'Georgia', serif;
            font-weight: 900;
            letter-spacing: -1px;
        }
        .error-code {
            font-size: 8rem;
            font-weight: 900;
            line-height: 1;
            letter-spacing: -4px;
            color: #212529;
            font-family: 'Georgia', serif;
        }
        .form-control:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.25px rgba(220, 53, 69, 0.25);
        }
        .hover-bg-light {
            transition: background-color 0.2s ease, transform 0.2s ease;
        }
        .hover-bg-light:hover {
            background-color: #f8f9fa !important;
            transform: translateX(4px);
        }
    </style>
</head>
<body>

    <!-- MINIMAL HEADER BRANDING -->
    <header class="py-4 bg-white border-bottom shadow-sm">
        <div class="container text-center">
            <a href="category.html" class="text-dark text-decoration-none">
                <h1 class="brand-logo mb-0">THE <span class="text-danger">CHRONICLE</span></h1>
            </a>
        </div>
    </header>

    <!-- CORE 404 CONTENT CANVAS -->
    <main class="container my-auto py-5">
        <div class="row justify-content-center align-items-center g-5">
            
            <!-- Left Side: Massive Error Status Indicator -->
            <div class="col-md-5 text-center text-md-end border-md-end pe-md-5 border-secondary border-opacity-25">
                <div class="error-code text-danger">404</div>
                <span class="text-uppercase tracking-widest font-monospace text-muted small fw-bold" style="letter-spacing: 2px;">
                    Error: Page Not Found
                </span>
            </div>

            <!-- Right Side: Navigation Solutions & Context Help -->
            <div class="col-md-7 text-center text-md-start ps-md-5">
                <h2 class="fw-bold mb-3" style="font-family: 'Georgia', serif;">Lost in the archives?</h2>
                <p class="text-secondary mb-4 max-w-md">
                    The story or breaking documentation vector you are trying to pull down has either been re-indexed, moved to an alternative directory link, or deleted from our active media stream server nodes.
                </p>

                <!-- Search Recovery Form Integration -->
                <form class="mb-4" style="max-width: 440px;" autocomplete="off">
                    <label class="form-label small fw-bold text-secondary">Search the global directory</label>
                    <div class="input-group shadow-sm">
                        <input type="text" class="form-control border-end-0 py-2" placeholder="Search technology, world, politics...">
                        <button class="btn btn-dark px-4" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>

                <!-- Helpful Router Quick Links -->
                <div class="d-flex flex-wrap justify-content-center justify-content-md-start gap-3">
                    <a href="category.html" class="btn btn-danger rounded-pill px-4 py-2 fw-bold shadow-sm">
                        <i class="bi bi-house-door me-2"></i> Return to Homepage
                    </a>
                    <button onclick="window.history.back()" class="btn btn-outline-dark rounded-pill px-4 py-2 fw-bold">
                        <i class="bi bi-arrow-left me-2"></i> Go Back One Step
                    </button>
                </div>
            </div>

        </div>

        <!-- RECENTLY POPULAR LOWER BAR (Optional Content Booster) -->
        <div class="row justify-content-center mt-5 pt-5 border-top border-secondary border-opacity-10">
            <div class="col-lg-9">
                <h6 class="text-muted text-uppercase fw-bold text-center text-md-start mb-4" style="font-size: 0.75rem; letter-spacing: 1px;">
                    Or inspect these popular directory links:
                </h6>
                <div class="row g-3">
                    <div class="col-sm-4">
                        <a href="#" class="d-block p-3 bg-white border rounded-3 text-dark text-decoration-none hover-bg-light">
                            <div class="fw-bold text-danger mb-1"><i class="bi bi-cpu me-1"></i> Technology</div>
                            <span class="text-muted small">Systems, AI & hardware changes.</span>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="#" class="d-block p-3 bg-white border rounded-3 text-dark text-decoration-none hover-bg-light">
                            <div class="fw-bold text-dark mb-1"><i class="bi bi-globe me-1"></i> World News</div>
                            <span class="text-muted small">Global summits & policy tracks.</span>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="#" class="d-block p-3 bg-white border rounded-3 text-dark text-decoration-none hover-bg-light">
                            <div class="fw-bold text-dark mb-1"><i class="bi bi-graph-up-arrow me-1"></i> Markets</div>
                            <span class="text-muted small">Financial streams and analytics.</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- STANDARD STABLE SYSTEM FOOTER -->
    <footer class="bg-dark text-white py-4 mt-auto border-top border-secondary border-opacity-25">
        <div class="container text-center text-md-start small">
            <div class="row align-items-center g-3">
                <div class="col-md-6 text-white-50">
                    &copy; 2026 The Chronicle Media Group. All rights reserved.
                </div>
                <div class="col-md-6 text-md-end text-white-50">
                    <a href="#" class="text-reset text-decoration-none me-3">Report a broken link</a>
                    <span>|</span>
                    <a href="#" class="text-reset text-decoration-none ms-3">System Status</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>