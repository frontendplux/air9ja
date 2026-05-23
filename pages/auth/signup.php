<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - The Chronicle</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            background-color: #f8f9fa;
        }
        .signup-container {
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
            background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.3) 100%);
        }
    </style>
</head>
<body>

    <div class="container-fluid p-0">
        <div class="row g-0 signup-container">
            
            <!-- LEFT PANEL: Brand Benefits Block (Hidden on mobile) -->
            <div class="col-md-5 col-xl-6 d-none d-md-block position-relative bg-dark">
                <!-- Background Image -->
                <img src="https://images.unsplash.com/photo-1457369804613-52c61a468e7d?auto=format&fit=crop&w=1200&q=80" 
                     class="w-100 h-100 object-fit-cover position-absolute opacity-50" alt="Library workspace books">
                
                <!-- Content Overlay -->
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-gradient-dark d-flex flex-column justify-content-between p-5">
                    <a href="category.html" class="text-white text-decoration-none">
                        <span class="brand-logo fs-3">THE <span class="text-danger">CHRONICLE</span></span>
                    </a>
                    
                    <div class="text-white">
                        <span class="badge bg-danger mb-3 text-uppercase px-2.5 py-1.5 small">Premium Tier</span>
                        <h2 class="display-6 fw-bold mb-4" style="font-family: 'Georgia', serif;">Unlock Full Access</h2>
                        
                        <!-- Value Checklist -->
                        <div class="d-flex flex-column gap-3 fs-6 opacity-90">
                            <div class="d-flex align-items-start gap-3">
                                <i class="bi bi-check-circle-fill text-danger mt-1"></i>
                                <span>Unlimited deep-dive editorial logs and archiving directories.</span>
                            </div>
                            <div class="d-flex align-items-start gap-3">
                                <i class="bi bi-check-circle-fill text-danger mt-1"></i>
                                <span>Real-time technical alerts and tailored breaking insights.</span>
                            </div>
                            <div class="d-flex align-items-start gap-3">
                                <i class="bi bi-check-circle-fill text-danger mt-1"></i>
                                <span>Weekly custom-curated audio newsletters straight to your device.</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-white-50 small">
                        &copy; 2026 The Chronicle Media Group. Trusted since 2012.
                    </div>
                </div>
            </div>

            <!-- RIGHT PANEL: Registration Entry Canvas -->
            <div class="col-md-7 col-xl-6 d-flex align-items-center bg-white p-4 p-sm-5 overflow-y-auto">
                <div class="w-100 mx-auto" style="max-width: 480px;">
                    
                    <!-- Mobile Layout Branding -->
                    <div class="d-md-none mb-4 text-center">
                        <a href="category.html" class="text-dark text-decoration-none">
                            <h1 class="brand-logo h2 m-0">THE <span class="text-danger">CHRONICLE</span></h1>
                        </a>
                    </div>

                    <!-- Intro Text -->
                    <div class="mb-4">
                        <h2 class="fw-bold text-dark">Create your account</h2>
                        <p class="text-muted small">Join a global community of thinkers, operators, and industry leaders.</p>
                    </div>

                    <!-- Quick OAuth Action -->
                    <button class="btn btn-google w-100 rounded-3 py-2 d-flex align-items-center justify-content-center gap-2 small fw-semibold mb-4">
                        <i class="bi bi-google text-danger"></i> Sign up with Google
                    </button>

                    <!-- Divider Separator -->
                    <div class="d-flex align-items-center my-4 text-muted">
                        <hr class="w-100 my-0 opacity-25">
                        <span class="mx-3 text-uppercase text-nowrap tracking-wider font-monospace" style="font-size: 0.65rem; letter-spacing: 1px;">Or register below</span>
                        <hr class="w-100 my-0 opacity-25">
                    </div>

                    <!-- Input Data Layout Form -->
                    <form autocomplete="off" id="registerForm">
                        
                        <!-- Row 1: First and Last Names -->
                        <div class="row g-3 mb-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label small fw-bold text-secondary">First name</label>
                                <input type="text" class="form-control rounded-3 py-2" id="firstName" placeholder="Jane" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="lastName" class="form-label small fw-bold text-secondary">Last name</label>
                                <input type="text" class="form-control rounded-3 py-2" id="lastName" placeholder="Doe" required>
                            </div>
                        </div>

                        <!-- Row 2: Email Configuration -->
                        <div class="mb-3">
                            <label for="regEmail" class="form-label small fw-bold text-secondary">Email address</label>
                            <input type="email" class="form-control rounded-3 py-2" id="regEmail" placeholder="jane.doe@example.com" required>
                        </div>

                        <!-- Row 3: Security Password Formulation -->
                        <div class="mb-3">
                            <label for="regPassword" class="form-label small fw-bold text-secondary">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control rounded-start-3 py-2" id="regPassword" placeholder="Minimum 8 characters" required>
                                <button class="btn btn-outline-secondary rounded-end-3 px-3 border border-start-0 text-muted" type="button" id="toggleRegPassword">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            
                            <!-- Visual Security Matrix Indicator -->
                            <div class="progress mt-2" style="height: 4px;">
                                <div id="passStrengthBar" class="progress-bar bg-muted" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span id="passStrengthText" class="text-muted d-block mt-1 text-end" style="font-size: 0.75rem;">Password must include symbols.</span>
                        </div>

                        <!-- Terms of Compliance Checkbox -->
                        <div class="mb-4 form-check align-middle">
                            <input type="checkbox" class="form-check-input" id="termsAgreement" required>
                            <label class="form-check-label text-muted small" for="termsAgreement">
                                I agree to the <a href="#" class="text-danger text-decoration-none">Terms of Service</a> and acknowledge the <a href="#" class="text-danger text-decoration-none">Privacy Directive</a>.
                            </label>
                        </div>

                        <!-- Execution Trigger Button -->
                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-dark rounded-3 py-2.5 fw-bold shadow-sm">Register Membership</button>
                        </div>

                    </form>

                    <!-- Core Context Link Router -->
                    <div class="text-center text-muted small">
                        Already have an active pass? <a href="login.html" class="text-danger text-decoration-none fw-bold">Sign In here</a>
                    </div>

                </div>
            </div>

        </div>
    </div>

   <script>

    const passToggleBtn = document.querySelector('#toggleRegPassword');

    const passFieldInput = document.querySelector('#regPassword');

    const passStrengthBar = document.querySelector('#passStrengthBar');

    const passStrengthText = document.querySelector('#passStrengthText');

    // Toggle password visibility
    passToggleBtn.addEventListener('click', function () {

        const resolvedType =
            passFieldInput.getAttribute('type') === 'password'
            ? 'text'
            : 'password';

        passFieldInput.setAttribute('type', resolvedType);

        this.querySelector('i').classList.toggle('bi-eye');

        this.querySelector('i').classList.toggle('bi-eye-slash');
    });


    // Password strength
    passFieldInput.addEventListener('input', function() {

        const value = this.value;

        let score = 0;

        if(value.length >= 8) score++;

        if(/[A-Z]/.test(value)) score++;

        if(/[0-9]/.test(value)) score++;

        if(/[^A-Za-z0-9]/.test(value)) score++;

        if (value.length === 0) {

            passStrengthBar.style.width = '0%';

            passStrengthText.innerText =
                'Password must include symbols.';

            passStrengthBar.className = "progress-bar";

        } else if (score <= 1) {

            passStrengthBar.style.width = '30%';

            passStrengthText.innerText =
                'Weak password';

            passStrengthBar.className =
                "progress-bar bg-danger";

        } else if (score <= 3) {

            passStrengthBar.style.width = '70%';

            passStrengthText.innerText =
                'Medium security profile';

            passStrengthBar.className =
                "progress-bar bg-warning";

        } else {

            passStrengthBar.style.width = '100%';

            passStrengthText.innerText =
                'Excellent complexity configuration';

            passStrengthBar.className =
                "progress-bar bg-success";
        }

    });



    // Registration submit
    document.getElementById('registerForm')
    .addEventListener('submit', async function(e){
        e.preventDefault();

        const firstName =
            document.getElementById('firstName').value.trim();

        const lastName =
            document.getElementById('lastName').value.trim();

        const email =
            document.getElementById('regEmail').value.trim();

        const password =
            document.getElementById('regPassword').value;

        const terms =
            document.getElementById('termsAgreement').checked;

        const submitBtn =
            this.querySelector('button[type="submit"]');

        // Validation
        if(!firstName || !lastName || !email || !password){

            alert('Please complete all fields');

            return;
        }

        if(password.length < 8){

            alert('Password must be at least 8 characters');

            return;
        }

        if(!terms){

            alert('You must agree to the terms');

            return;
        }

        // Loading state
        submitBtn.disabled = true;

        submitBtn.innerHTML = `
            <span class="spinner-border spinner-border-sm me-2"></span>
            Creating Account...
        `;

        try{

            const req = await fetch('/api/index.php', {

                method: 'POST',

                headers: {
                    'Content-Type': 'application/json'
                },

                body: JSON.stringify({

                    action: 'auth/register',

                    fullname: firstName + ' ' + lastName,

                    email: email,

                    password: password

                })

            });

            const ress = await req.text();
            // console.log(ress);
            const res=JSON.parse(ress);
            // Success
            if(res.status){

                submitBtn.innerHTML = `
                    <i class="bi bi-check-circle-fill me-2"></i>
                    Registration Successful
                `;

                setTimeout(() => {

                    window.location.href =
                        res.redirect ?? '/login';

                }, 1200);

            }else{

                submitBtn.disabled = false;

                submitBtn.innerHTML =
                    'Register Membership';

                alert(res.message || 'Registration failed');
            }

        }catch(err){

            console.error(err);

            submitBtn.disabled = false;

            submitBtn.innerHTML =
                'Register Membership';

            alert('Network error occurred');

        }

    });

</script>
</body>
</html>