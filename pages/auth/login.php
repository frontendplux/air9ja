<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $company_info['name'] ?> - Sign In</title>
    <link rel="icon" href="<?= $company_info['icon'] ?>" type="image/x-icon">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            background-color: #f8f9fa;
        }
        .login-container {
            min-height: 100vh;
        }
        .brand-logo {
            font-family: 'Georgia', serif;
            font-weight: 900;
            letter-spacing: -1px;
        }
        .form-control:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.25px rgba(220, 53, 69, 0.25);
        }
        .btn-google {
            background-color: #fff;
            border-color: #dee2e6;
            color: #212529;
            transition: all 0.2s ease;
        }
        .btn-google:hover {
            background-color: #f8f9fa;
            border-color: #c3c6c9;
        }
        .bg-gradient-dark {
            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.2) 100%);
        }
    </style>
</head>
<body>

    <div class="container-fluid p-0">
        <div class="row g-0 login-container">
            
            <!-- LEFT PANEL: Visual Content Block (Hidden on mobile viewports) -->
            <div class="col-md-6 col-lg-7 d-none d-md-block position-relative bg-dark">
                <!-- Background Image -->
                <img src="https://images.unsplash.com/photo-1505664194779-8beaceb93744?auto=format&fit=crop&w=1200&q=80" 
                     class="w-100 h-100 object-fit-cover position-absolute opacity-75" alt="Editorial building architecture">
                
                <!-- Linear Gradient Overlay & Messaging -->
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-gradient-dark d-flex flex-column justify-content-between p-5">
                    <a href="category.html" class="text-white text-decoration-none">
                        <span class="brand-logo fs-3"><?= htmlspecialchars($company_info['name'] ) ?></span>
                    </a>
                    <div class="text-white">
                        <h2 class="display-6 fw-bold mb-3" style="font-family: 'Georgia', serif;"><?= htmlspecialchars($company_info['title'] ) ?></h2>
                        <p class="text-white-50 max-w-md"><?= htmlspecialchars($company_info['description'] ) ?></p>
                    </div>
                    <div class="text-white-50 small">
                        &copy; 2026 <?= htmlspecialchars($company_info['name'] ) ?> project teams.
                    </div>
                </div>
            </div>

            <!-- RIGHT PANEL: Authentic Access Form -->
            <div class="col-md-6 col-lg-5 d-flex align-items-center bg-white p-4 p-sm-5">
                <div class="w-100 mx-auto" style="max-width: 420px;">
                    
                    <!-- Mobile View Header Branding (Hidden on desktop) -->
                    <div class="d-md-none mb-5 text-center">
                        <a href="category.html" class="text-dark text-decoration-none">
                            <h1 class="brand-logo h2 m-0"><?= htmlspecialchars($company_info['name'] ) ?></h1>
                        </a>
                    </div>

                    <!-- Intro Title -->
                    <div class="mb-4">
                        <h2 class="fw-bold text-dark">Welcome back</h2>
                        <p class="text-muted small">Enter your credentials below to access your  membership portal.</p>
                    </div>

                    <!-- Social Sign-In Options -->
                    <div class="d-grid gap-2 mb-4">
                        <button onclick="alert('comming soon')" class="btn btn-google rounded-3 py-2 d-flex align-items-center justify-content-center gap-2 small fw-semibold">
                            <i class="bi bi-google text-danger"></i> Continue with Google
                        </button>
                    </div>

                    <!-- Decorative Divider Splitter -->
                    <div class="d-flex align-items-center my-4 text-muted">
                        <hr class="w-100 my-0 opacity-25">
                        <span class="mx-3 text-uppercase text-nowrap tracking-wider font-monospace" style="font-size: 0.65rem; letter-spacing: 1px;">Or email access</span>
                        <hr class="w-100 my-0 opacity-25">
                    </div>

                    <!-- Primary Auth Form -->
                    <form autocomplete="on" id="loginpage">
                        
                        <!-- Input Node: Email Field -->
                        <div class="mb-3">
                            <label for="userEmail" class="form-label small fw-bold text-secondary">Email address</label>
                            <input type="email" class="form-control rounded-3 py-2" id="userEmail" placeholder="name@example.com" required>
                        </div>

                        <!-- Input Node: Password Field -->
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <label for="userPassword" class="form-label small fw-bold text-secondary mb-0">Password</label>
                                <a href="/auth/forget-password" class="text-danger text-decoration-none small" style="font-size: 0.8rem;">Forgot password?</a>
                            </div>
                            <div class="input-group">
                                <input type="password" class="form-control rounded-start-3 py-2" id="userPassword" placeholder="••••••••" required>
                                <button class="btn btn-outline-secondary rounded-end-3 px-3 border border-start-0 text-muted" type="button" id="togglePassword">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Remembering Cookie Toggle Control -->
                        <div class="mb-4 form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label text-muted small" for="rememberMe">Keep me signed in on this device</label>
                        </div>

                        <!-- Primary Form Submission Trigger -->
                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-dark rounded-3 py-2.5 fw-bold shadow-sm">Sign In to Account</button>
                        </div>

                    </form>

                    <!-- Bottom Navigation Context Link -->
                    <div class="text-center text-muted small">
                        Don't have an account? <a href="/auth/signup" class="text-danger text-decoration-none fw-bold">Create one free</a>
                    </div>

                </div>
            </div>

        </div>
    </div>

   <script>
    const togglePasswordBtn = document.querySelector('#togglePassword');
    const passwordField = document.querySelector('#userPassword');

    togglePasswordBtn.addEventListener('click', function () {

        const currentType =
            passwordField.getAttribute('type') === 'password'
            ? 'text'
            : 'password';

        passwordField.setAttribute('type', currentType);

        // Toggle icon
        const iconNode = this.querySelector('i');

        iconNode.classList.toggle('bi-eye');
        iconNode.classList.toggle('bi-eye-slash');
    });


    document.getElementById('loginpage').onsubmit = async (e) => {

        e.preventDefault();
        const email = document.getElementById('userEmail').value.trim();

        const password = document.getElementById('userPassword').value;

        const submitBtn = e.target.querySelector('button[type="submit"]');

        // Validation
        if (!email || !password) {

            alert('Please fill all fields');

            return;
        }

        // Loading state
        submitBtn.disabled = true;
        submitBtn.innerHTML = `
            <span class="spinner-border spinner-border-sm me-2"></span>
            Signing In...
        `;

        try {

            const req = await fetch('/api/index.php', {

                method: "POST",

                headers: {
                    "Content-Type": "application/json"
                },

                body: JSON.stringify({

                    action: 'auth/login',

                    email: email,

                    password: password

                })

            });

            var ress = await req.text();
            console.log(ress);
            const res= JSON.parse(ress);
            

            // Success
            if (res.status) {

                submitBtn.innerHTML = `
                    <i class="bi bi-check-circle-fill me-2"></i>
                    Login Successful
                `;

                // Redirect
                setTimeout(() => {

                    window.location.href =
                        res.redirect ?? '/member/';

                }, 1000);

            } else {

                submitBtn.disabled = false;

                submitBtn.innerHTML = `Sign In to Account`;

                alert(res.message || 'Invalid login credentials');
            }

        } catch (err) {

            console.error(err);

            submitBtn.disabled = false;

            submitBtn.innerHTML = `Sign In to Account`;

            alert('Network error occurred');

        }

    };
</script>
</body>
</html>