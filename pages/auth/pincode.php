<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Security PIN - The Chronicle</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            background-color: #f8f9fa;
        }
        .verify-container {
            min-height: 100vh;
        }
        .brand-logo {
            font-family: 'Georgia', serif;
            font-weight: 900;
            letter-spacing: -1px;
        }
        /* Styling the standalone Pin Input Boxes */
        .pin-field {
            width: 56px;
            height: 64px;
            font-size: 1.75rem;
            font-weight: 700;
            text-align: center;
            border-radius: 12px;
            border: 2px solid #dee2e6;
            background-color: #fff;
            transition: all 0.2s ease;
        }
        .pin-field:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.25px rgba(220, 53, 69, 0.25);
            outline: none;
        }
        /* Hide standard spin numeric arrows inside input elements */
        .pin-field::-webkit-outer-spin-button,
        .pin-field::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .pin-field[type=number] {
            -moz-appearance: textfield;
        }
        .bg-gradient-dark {
            background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.3) 100%);
        }
    </style>
</head>
<body>

    <div class="container-fluid p-0">
        <div class="row g-0 verify-container">
            
            <!-- LEFT PANEL: Security Context Branding (Hidden on Mobile) -->
            <div class="col-md-6 col-lg-7 d-none d-md-block position-relative bg-dark">
                <img src="https://images.unsplash.com/photo-1614064641938-3bbee52942c7?auto=format&fit=crop&w=1200&q=80" 
                     class="w-100 h-100 object-fit-cover position-absolute opacity-40" alt="Encrypted security interface">
                
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-gradient-dark d-flex flex-column justify-content-between p-5">
                    <a href="category.html" class="text-white text-decoration-none">
                        <span class="brand-logo fs-3">THE <span class="text-danger">CHRONICLE</span></span>
                    </a>
                    <div class="text-white">
                        <span class="badge bg-danger mb-3 text-uppercase px-2.5 py-1.5 small">Two-Factor Auth</span>
                        <h2 class="display-6 fw-bold mb-3" style="font-family: 'Georgia', serif;">Identity Verification Mandatory</h2>
                        <p class="text-white-50 max-w-md">We value your privacy constraints. To continue viewing subscription-protected data files, verify your identity with the generated numeric passkey.</p>
                    </div>
                    <div class="text-white-50 small">
                        &copy; 2026 The Chronicle Media Group.
                    </div>
                </div>
            </div>

            <!-- RIGHT PANEL: 4-Digit PIN Box Input -->
            <div class="col-md-6 col-lg-5 d-flex align-items-center bg-white p-4 p-sm-5">
                <div class="w-100 mx-auto" style="max-width: 400px;">
                    
                    <!-- Mobile Branding -->
                    <div class="d-md-none mb-5 text-center">
                        <a href="category.html" class="text-dark text-decoration-none">
                            <h1 class="brand-logo h2 m-0">THE <span class="text-danger">CHRONICLE</span></h1>
                        </a>
                    </div>

                    <!-- Step Back Controller link -->
                    <a href="login.html" class="text-decoration-none text-danger small fw-semibold d-inline-flex align-items-center mb-4">
                        <i class="bi bi-arrow-left me-2"></i> Cancel verification
                    </a>

                    <div class="mb-4">
                        <h2 class="fw-bold text-dark">Enter security PIN</h2>
                        <p class="text-muted small">
                            A secure 4-digit code was sent to your registered validation apparatus. Please confirm access below.
                        </p>
                    </div>

                    <!-- PIN Entry Form Layout -->
                    <form id="pinVerificationForm" autocomplete="off">
                        
                        <!-- 4 Grid Input Slots -->
                        <div class="d-flex justify-content-between gap-2 mb-4">
                            <input type="number" class="pin-field" maxlength="1" pattern="[0-9]*" inputmode="numeric" required>
                            <input type="number" class="pin-field" maxlength="1" pattern="[0-9]*" inputmode="numeric" required>
                            <input type="number" class="pin-field" maxlength="1" pattern="[0-9]*" inputmode="numeric" required>
                            <input type="number" class="pin-field" maxlength="1" pattern="[0-9]*" inputmode="numeric" required>
                        </div>

                        <!-- Main Submit Button -->
                        <div class="d-grid mb-4">
                            <button type="submit" id="verifyBtn" class="btn btn-dark rounded-3 py-2.5 fw-bold shadow-sm" disabled>
                                Verify & Proceed
                            </button>
                        </div>

                    </form>

                    <!-- Cooldown Action Feedback -->
                    <div class="text-center small text-muted">
                        Didn't receive the numeric code? <br class="d-block d-sm-none">
                        <button id="resendCodeBtn" class="btn btn-link text-decoration-none text-danger small fw-bold p-0 border-0 align-baseline" disabled>
                            Resend Code (<span id="timerCountdown">30</span>s)
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- Smart Input Control Script Logic -->
    <script>
        const pinInputs = document.querySelectorAll('.pin-field');
        const verifyBtn = document.getElementById('verifyBtn');
        const resendCodeBtn = document.getElementById('resendCodeBtn');
        const timerCountdown = document.getElementById('timerCountdown');

        // 1. Handle auto focus-shift behavior across individual fields
        pinInputs.forEach((input, index) => {
            // Handle active typing numerical inputs
            input.addEventListener('input', (e) => {
                if (input.value.length > 1) {
                    input.value = input.value.slice(0, 1); // Clamp length to single digit
                }
                
                if (input.value !== "" && index < pinInputs.length - 1) {
                    pinInputs[index + 1].focus(); // Advance to next field slot
                }
                checkPinCompletionState();
            });

            // Handle functional backspacing shifts
            input.addEventListener('keydown', (e) => {
                if (e.key === "Backspace" && input.value === "" && index > 0) {
                    pinInputs[index - 1].focus(); // Drop back a step to preceding entry slot
                }
            });
        });

        // 2. Button Activation Check Rule
        function checkPinCompletionState() {
            const allFilled = Array.from(pinInputs).every(input => input.value !== "");
            verifyBtn.disabled = !allFilled;
        }

        // 3. Form submission intercept routine
        document.getElementById('pinVerificationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const compiledPin = Array.from(pinInputs).map(input => input.value).join('');
            alert(`PIN Compiled Safely for processing: ${compiledPin}`);
            // Logic to verify PIN natively over network layer goes here
        });

        // 4. Clean 30-Second Security Resend Timer Simulation
        let timeRemaining = 30;
        const cooldownTimer = setInterval(() => {
            timeRemaining--;
            if (timeRemaining <= 0) {
                clearInterval(cooldownTimer);
                resendCodeBtn.disabled = false;
                resendCodeBtn.innerText = "Resend Code Now";
            } else {
                timerCountdown.innerText = timeRemaining;
            }
        }, 1000);
    </script>
</body>
</html>