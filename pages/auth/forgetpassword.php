<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - The Chronicle</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            background-color: #f8f9fa;
        }
        .recovery-container {
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
        .bg-gradient-dark {
            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.2) 100%);
        }
        /* CSS State Visibility Helper for Smooth UI Transition */
        .d-none {
            display: none !important;
        }
    </style>
</head>
<body>

    <div class="container-fluid p-0">
        <div class="row g-0 recovery-container">
            
            <!-- LEFT PANEL: Brand Context Layout (Hidden on Mobile) -->
            <div class="col-md-6 col-lg-7 d-none d-md-block position-relative bg-dark">
                <!-- Background Image -->
                <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&w=1200&q=80" 
                     class="w-100 h-100 object-fit-cover position-absolute opacity-50" alt="Workspace verification table">
                
                <!-- Content Overlay -->
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-gradient-dark d-flex flex-column justify-content-between p-5">
                    <a href="category.html" class="text-white text-decoration-none">
                        <span class="brand-logo fs-3">THE <span class="text-danger">CHRONICLE</span></span>
                    </a>
                    <div class="text-white">
                        <h2 class="display-6 fw-bold mb-3" style="font-family: 'Georgia', serif;">Secure Account Restoration</h2>
                        <p class="text-white-50 max-w-md">Our continuous compliance protocols protect long-standing account profiles using encrypted one-time magic-link authorization checks.</p>
                    </div>
                    <div class="text-white-50 small">
                        &copy; 2026 The Chronicle Media Group.
                    </div>
                </div>
            </div>

            <!-- RIGHT PANEL: Action Form Frame -->
            <div class="col-md-6 col-lg-5 d-flex align-items-center bg-white p-4 p-sm-5">
                <div class="w-100 mx-auto" style="max-width: 420px;">
                    
                    <!-- Mobile View Branding Wrapper -->
                    <div class="d-md-none mb-5 text-center">
                        <a href="category.html" class="text-dark text-decoration-none">
                            <h1 class="brand-logo h2 m-0">THE <span class="text-danger">CHRONICLE</span></h1>
                        </a>
                    </div>

                    <!-- STATE A: The Standard Input Request Form -->
                    <div id="requestState">
                        <!-- Navigation Back Hook -->
                        <a href="login.html" class="text-decoration-none text-danger small fw-semibold d-inline-flex align-items-center mb-4">
                            <i class="bi bi-arrow-left me-2"></i> Back to sign in
                        </a>

                        <div class="mb-4">
                            <h2 class="fw-bold text-dark">Forgot password?</h2>
                            <p class="text-muted small">No worries. Input your authenticated registration email, and we will route a localized restoration credential package directly to you.</p>
                        </div>

                        <form id="recoveryForm">
                            <div class="mb-4">
                                <label for="recoveryEmail" class="form-label small fw-bold text-secondary">Account email address</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-envelope"></i></span>
                                    <input type="email" class="form-control rounded-end-3 py-2 border-start-0" id="recoveryEmail" placeholder="you@example.com" required>
                                </div>
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-dark rounded-3 py-2.5 fw-bold shadow-sm">Send Reset Instructions</button>
                            </div>
                        </form>
                    </div>

                    <!-- STATE B: Success Acknowledgment Canvas (Hidden by default via d-none class) -->
                    <div id="successState" class="text-center d-none">
                        <!-- Big verification check visual icon element -->
                        <div class="bg-danger bg-opacity-10 text-danger rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4" style="width: 72px; height: 72px;">
                            <i class="bi bi-envelope-check-fill fs-2"></i>
                        </div>

                        <h3 class="fw-bold text-dark mb-2">Check your inbox</h3>
                        <p class="text-muted small mb-4">
                            We have dispatched an encrypted link directly to <br>
                            <span id="displayEmail" class="fw-bold text-dark">your-email@example.com</span>. 
                            Click the token inside to securely reset your credentials.
                        </p>

                        <div class="d-grid gap-2 mb-4">
                            <a href="https://mail.google.com" target="_blank" rel="noopener" class="btn btn-dark rounded-3 py-2 fw-bold">Open Email App</a>
                            <button id="retryBtn" class="btn btn-link text-secondary text-decoration-none small">Didn't receive email? Try again</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script>

    const recoveryForm = document.getElementById('recoveryForm');

    const requestState = document.getElementById('requestState');

    const successState = document.getElementById('successState');

    const recoveryEmailInput =
        document.getElementById('recoveryEmail');

    const displayEmailLabel =
        document.getElementById('displayEmail');

    const retryBtn =
        document.getElementById('retryBtn');



    // Submit reset request
    recoveryForm.addEventListener('submit', async function(e) {

        e.preventDefault();

        const email =
            recoveryEmailInput.value.trim();

        const submitBtn =
            this.querySelector('button[type="submit"]');

        // Validation
        if(!email){

            alert('Enter your email address');

            return;
        }

        // Loading state
        submitBtn.disabled = true;

        submitBtn.innerHTML = `
            <span class="spinner-border spinner-border-sm me-2"></span>
            Sending...
        `;

        try{

            const req = await fetch('/api/index.php', {

                method: 'POST',

                headers: {
                    'Content-Type': 'application/json'
                },

                body: JSON.stringify({

                    action: 'auth/forgot-password',

                    email: email

                })

            });

            const res = await req.json();

            // Success
            if(res.status){

                displayEmailLabel.innerText = email;

                requestState.classList.add('d-none');

                successState.classList.remove('d-none');

            }else{

                alert(res.message || 'Failed to send reset email');

            }

        }catch(err){

            console.error(err);

            alert('Network error occurred');

        }

        submitBtn.disabled = false;

        submitBtn.innerHTML =
            'Send Reset Instructions';

    });



    // Retry
    retryBtn.addEventListener('click', function() {

        successState.classList.add('d-none');

        requestState.classList.remove('d-none');

    });

</script>
</body>
</html>