<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password - The Chronicle</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            background-color: #f8f9fa;
        }
        .change-container {
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
            background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.3) 100%);
        }
    </style>
</head>
<body>

    <div class="container-fluid p-0">
        <div class="row g-0 change-container">
            
            <!-- LEFT PANEL: Security Context Branding (Hidden on Mobile) -->
            <div class="col-md-5 col-xl-6 d-none d-md-block position-relative bg-dark">
                <img src="https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=1200&q=80" 
                     class="w-100 h-100 object-fit-cover position-absolute opacity-40" alt="Secure digital dashboard encryption">
                
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-gradient-dark d-flex flex-column justify-content-between p-5">
                    <a href="category.html" class="text-white text-decoration-none">
                        <span class="brand-logo fs-3">THE <span class="text-danger">CHRONICLE</span></span>
                    </a>
                    <div class="text-white">
                        <span class="badge bg-danger mb-3 text-uppercase px-2.5 py-1.5 small">Account Safety</span>
                        <h2 class="display-6 fw-bold mb-3" style="font-family: 'Georgia', serif;">Update Your Security Profile</h2>
                        <p class="text-white-50 max-w-md">We recommend choosing a unique phrase variation combined with special symbols to shield your subscription history and digital wallet tokens effectively.</p>
                    </div>
                    <div class="text-white-50 small">
                        &copy; 2026 The Chronicle Media Group.
                    </div>
                </div>
            </div>

            <!-- RIGHT PANEL: Update Passwords Entry Form -->
            <div class="col-md-7 col-xl-6 d-flex align-items-center bg-white p-4 p-sm-5 overflow-y-auto">
                <div class="w-100 mx-auto" style="max-width: 440px;">
                    
                    <!-- Mobile View Branding Layout -->
                    <div class="d-md-none mb-4 text-center">
                        <a href="category.html" class="text-dark text-decoration-none">
                            <h1 class="brand-logo h2 m-0">THE <span class="text-danger">CHRONICLE</span></h1>
                        </a>
                    </div>

                    <div class="mb-4">
                        <h2 class="fw-bold text-dark">Change your password</h2>
                        <p class="text-muted small">Please input your current authenticated credential followed by your target new secure password profile selection.</p>
                    </div>

                    <form id="changePasswordForm" autocomplete="off">
                        
                        <!-- Input 1: Current Existing Password -->
                        <div class="mb-4">
                            <label for="currentPassword" class="form-label small fw-bold text-secondary">Current Password</label>
                            <input type="password" class="form-control rounded-3 py-2" id="currentPassword" placeholder="Enter current password" required>
                        </div>

                        <hr class="my-4 opacity-10">

                        <!-- Input 2: The New Password Candidate -->
                        <div class="mb-3">
                            <label for="newPassword" class="form-label small fw-bold text-secondary">New Password</label>
                            <input type="password" class="form-control rounded-3 py-2" id="newPassword" placeholder="Minimum 8 characters" required>
                            
                            <!-- Complexity Progress Line Feedback Indicator -->
                            <div class="progress mt-2" style="height: 4px;">
                                <div id="strengthMeterBar" class="progress-bar" role="progressbar" style="width: 0%"></div>
                            </div>
                            <small id="strengthMeterText" class="text-muted d-block mt-1 text-end" style="font-size: 0.75rem;">Enter a complex string mix.</small>
                        </div>

                        <!-- Input 3: Confirming Password Match -->
                        <div class="mb-4">
                            <label for="confirmPassword" class="form-label small fw-bold text-secondary">Confirm New Password</label>
                            <input type="password" class="form-control rounded-3 py-2" id="confirmPassword" placeholder="Repeat new password" required>
                            
                            <!-- Dynamic Matching Alert Banner Element -->
                            <div id="matchAlertMessage" class="form-text small mt-2 d-none"></div>
                        </div>

                        <!-- Submission Core Execution Hook Trigger -->
                        <div class="d-grid pt-2">
                            <button type="submit" id="submitChangeBtn" class="btn btn-dark rounded-3 py-2.5 fw-bold shadow-sm" disabled>
                                Update Security Password
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

   <script>

    const newPassInput =
        document.getElementById('newPassword');

    const confirmPassInput =
        document.getElementById('confirmPassword');

    const currentPassInput =
        document.getElementById('currentPassword');

    const strengthBar =
        document.getElementById('strengthMeterBar');

    const strengthText =
        document.getElementById('strengthMeterText');

    const matchAlert =
        document.getElementById('matchAlertMessage');

    const submitBtn =
        document.getElementById('submitChangeBtn');

    const form =
        document.getElementById('changePasswordForm');

    let isStrong = false;

    let isMatched = false;



    // Password strength checker
    newPassInput.addEventListener('input', function() {

        const val = this.value;

        let secureScore = 0;

        if (val.length >= 8) secureScore += 25;

        if (/[A-Z]/.test(val)) secureScore += 25;

        if (/[0-9]/.test(val)) secureScore += 25;

        if (/[^A-Za-z0-9]/.test(val)) secureScore += 25;

        strengthBar.style.width =
            secureScore + '%';

        if (secureScore === 0) {

            strengthBar.className =
                "progress-bar";

            strengthText.innerText =
                "Enter a complex string mix.";

            isStrong = false;

        } else if (secureScore <= 50) {

            strengthBar.className =
                "progress-bar bg-danger";

            strengthText.innerText =
                "Weak password profile";

            isStrong = false;

        } else if (secureScore <= 75) {

            strengthBar.className =
                "progress-bar bg-warning";

            strengthText.innerText =
                "Medium security balance";

            isStrong = true;

        } else {

            strengthBar.className =
                "progress-bar bg-success";

            strengthText.innerText =
                "Strong safe configuration";

            isStrong = true;
        }

        validateFormState();

    });



    // Password match checker
    function checkPasswordMatches() {

        const passA = newPassInput.value;

        const passB = confirmPassInput.value;

        if (passB.length === 0) {

            matchAlert.classList.add('d-none');

            isMatched = false;

            return;
        }

        matchAlert.classList.remove('d-none');

        if (passA === passB) {

            matchAlert.className =
                "form-text small mt-2 text-success";

            matchAlert.innerHTML =
                '<i class="bi bi-check-circle-fill me-1"></i> Passwords match correctly.';

            isMatched = true;

        } else {

            matchAlert.className =
                "form-text small mt-2 text-danger";

            matchAlert.innerHTML =
                '<i class="bi bi-x-circle-fill me-1"></i> Passwords do not match.';

            isMatched = false;
        }

        validateFormState();
    }

    newPassInput.addEventListener(
        'keyup',
        checkPasswordMatches
    );

    confirmPassInput.addEventListener(
        'keyup',
        checkPasswordMatches
    );



    // Enable/disable button
    function validateFormState() {

        submitBtn.disabled =
            !(isStrong && isMatched);
    }



    // Submit form
    form.addEventListener('submit', async function(e) {

        e.preventDefault();

        const currentPassword =
            currentPassInput.value;

        const newPassword =
            newPassInput.value;

        const confirmPassword =
            confirmPassInput.value;

        if(!currentPassword ||
           !newPassword ||
           !confirmPassword){

            alert('Please fill all fields');

            return;
        }

        if(newPassword !== confirmPassword){

            alert('Passwords do not match');

            return;
        }

        // Loading
        submitBtn.disabled = true;

        submitBtn.innerHTML = `
            <span class="spinner-border spinner-border-sm me-2"></span>
            Updating...
        `;

        try{

            const req = await fetch('/api/index.php', {

                method: 'POST',

                headers: {
                    'Content-Type': 'application/json'
                },

                body: JSON.stringify({

                    action: 'auth/change-password',

                    current_password: currentPassword,

                    new_password: newPassword

                })

            });

            const res = await req.json();

            if(res.status){

                submitBtn.innerHTML = `
                    <i class="bi bi-check-circle-fill me-2"></i>
                    Password Updated
                `;

                setTimeout(() => {

                    window.location.href =
                        '/login';

                }, 1500);

            }else{

                submitBtn.disabled = false;

                submitBtn.innerHTML =
                    'Update Security Password';

                alert(
                    res.message ||
                    'Failed to update password'
                );
            }

        }catch(err){

            console.error(err);

            submitBtn.disabled = false;

            submitBtn.innerHTML =
                'Update Security Password';

            alert('Network error occurred');

        }

    });

</script>
</body>
</html>