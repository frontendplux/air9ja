<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - The Chronicle</title>
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
        <a href="#" class="navbar-brand brand-logo m-0 fs-4">THE <span class="text-danger">CHRONICLE</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </header>

    <!-- 1. DESKTOP PERMANENT SIDEBAR DRAWER PANEL -->
   
    <?php include __DIR__."/compo/sidebar.php"; ?>
    <!-- 2. MOBILE RESPONSIVE OFFCANVAS DRAWER PANEL -->
    <div class="offcanvas offcanvas-start bg-dark text-white p-3" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel" style="width: 280px;">
        <div class="offcanvas-header border-bottom border-secondary border-opacity-25 pb-3">
            <h5 class="offcanvas-title brand-logo" id="mobileSidebarLabel">THE <span class="text-danger">CHRONICLE</span></h5>
            <button type="button" class="btn-close btn-close-white" data-bs-toggle="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column justify-content-between p-0 pt-4">
            <nav class="nav flex-column gap-1">
                <a class="nav-link nav-link-custom active rounded-3 px-3 py-2.5 d-flex align-items-center gap-3" href="#"><i class="bi bi-speedometer2"></i> Overview Dashboard</a>
                <a class="nav-link nav-link-custom rounded-3 px-3 py-2.5 d-flex align-items-center gap-3" href="#"><i class="bi bi-journal-text"></i> Stories & Archives</a>
                <a class="nav-link nav-link-custom rounded-3 px-3 py-2.5 d-flex align-items-center gap-3" href="#"><i class="bi bi-graph-up"></i> Traffic Metrics</a>
                <a class="nav-link nav-link-custom rounded-3 px-3 py-2.5 d-flex align-items-center gap-3" href="#"><i class="bi bi-people"></i> Subscribers Tier</a>
            </nav>
            <div class="border-top border-secondary border-opacity-25 p-3 d-flex align-items-center gap-3">
                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" class="rounded-circle object-fit-cover" style="width: 40px; height: 40px;" alt="Avatar">
                <div>
                    <h6 class="m-0 fw-bold text-white text-truncate" style="font-size: 0.85rem;">Sarah Jenkins</h6>
                    <small class="text-muted text-truncate d-block" style="font-size: 0.75rem;">Senior Editor</small>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. MAIN DASHBOARD CONTENT AREA OVERVIEW -->
<style>
        .form-control:focus, .form-select:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.25px rgba(220, 53, 69, 0.25);
        }
        .profile-avatar-wrapper {
            width: 100px;
            height: 100px;
            border: 4px solid #fff;
        }
        .nav-pills-custom .nav-link {
            color: #475569;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.2s;
        }
        .nav-pills-custom .nav-link.active {
            background-color: #dc3545 !important;
            color: #fff !important;
        }
        .nav-pills-custom .nav-link:hover:not(.active) {
            background-color: #f1f5f9;
            color: #0f172a;
        }
        .metric-mini-card {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
        }
    </style>

    <main class="main-content-offset p-4 p-md-5">
        
        <!-- TOP PROFILE OVERVIEW HERO BANNER -->
        <div class="bg-dark text-white rounded-4 p-4 p-md-5 mb-5 shadow-sm position-relative overflow-hidden" style="background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);">
            <div class="position-relative d-flex flex-column flex-md-row align-items-center align-items-md-start gap-4 text-center text-md-start">
                <!-- Avatar Holder Frame -->
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=120&q=80" class="rounded-circle profile-avatar-wrapper shadow" alt="Creator Profile Photo">
                    <span class="position-absolute bottom-0 end-0 bg-success border border-white border-3 p-2 rounded-circle" title="Account Verification Node Active"></span>
                </div>
                <!-- Identity Context Copy -->
                <div class="flex-grow-1 mt-2">
                    <div class="d-flex flex-column flex-md-row align-items-center gap-2 mb-2">
                        <h2 class="h4 fw-bold m-0" style="font-family: 'Georgia', serif;">Elena Rostova</h2>
                        <span class="badge bg-danger bg-opacity-25 text-danger border border-danger border-opacity-50 px-2.5 py-1 small">Senior Journalist</span>
                    </div>
                    <p class="text-muted small mb-3">Covering computing architectures, policy matrices, and global climate treaty compliance streams.</p>
                    <div class="d-flex flex-wrap justify-content-center justify-content-md-start gap-3 text-muted small">
                        <span><i class="bi bi-geo-alt me-1"></i> Geneva, CH</span>
                        <span><i class="bi bi-calendar3 me-1"></i> Joined March 2024</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- RE-ENGINEERED MULTI-MENU INTERFACE MATRIX -->
        <div class="row g-4">
            
            <!-- LEFT VERTICAL PILOT NAVIGATION MENU PANEL -->
            <div class="col-xl-3">
                <div class="bg-white border rounded-4 shadow-sm p-3">
                    <div class="nav flex-column nav-pills nav-pills-custom gap-1" id="profileSettingsTabs" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active text-start py-2.5 px-3 d-flex align-items-center gap-2.5" id="tab-identity" data-bs-toggle="pill" data-bs-target="#pane-identity" type="button" role="tab">
                            <i class="bi bi-person-gear fs-5"></i> Public Profile Details
                        </button>
                        <button class="nav-link text-start py-2.5 px-3 d-flex align-items-center gap-2.5" id="tab-monetization" data-bs-toggle="pill" data-bs-target="#pane-monetization" type="button" role="tab">
                            <i class="bi bi-currency-exchange fs-5"></i> Monetization Engine
                        </button>
                        <button class="nav-link text-start py-2.5 px-3 d-flex align-items-center gap-2.5" id="tab-auth" data-bs-toggle="pill" data-bs-target="#pane-auth" type="button" role="tab">
                            <i class="bi bi-shield-lock fs-5"></i> Security & Authentication
                        </button>
                    </div>
                </div>
            </div>

            <!-- RIGHT INTERACTIVE CARD WORKSPACE CANVAS -->
            <div class="col-xl-9">
                <div class="tab-content" id="profileSettingsPanes">
                    
                    <!-- MENU PANE 1: Public Identity Profiles Form Configuration -->
                    <div class="tab-pane fade show active" id="pane-identity" role="tabpanel" aria-labelledby="tab-identity">
                        <div class="bg-white border rounded-4 shadow-sm p-4">
                            <h4 class="h5 fw-bold text-dark mb-4" style="font-family: 'Georgia', serif;">Public Identity Metadata</h4>
                            <form id="profileIdentityForm">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-secondary">Display Full Name</label>
                                        <input type="text" class="form-control rounded-3 py-2" value="Elena Rostova" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-secondary">Public Routing Handle</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-muted small">@</span>
                                            <input type="text" class="form-control rounded-3 py-2" value="elenarostova" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label small fw-bold text-secondary">Professional Author Bio</label>
                                        <textarea class="form-control rounded-3" rows="4">Covering computing architectures, policy matrices, and global climate treaty compliance streams across sovereign economic nodes.</textarea>
                                    </div>
                                </div>
                                <hr class="my-4 opacity-10">
                                <button type="submit" class="btn btn-dark rounded-3 px-4 py-2 fw-bold small">Save Profile Parameters</button>
                            </form>
                        </div>
                    </div>

                    <!-- MENU PANE 2: Premium Monetization Pipeline & Payout Infrastructure -->
                    <div class="tab-pane fade" id="pane-monetization" role="tabpanel" aria-labelledby="tab-monetization">
                        <div class="bg-white border rounded-4 shadow-sm p-4">
                            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
                                <h4 class="h5 fw-bold text-dark m-0" style="font-family: 'Georgia', serif;">Monetization Engine</h4>
                                <div class="form-check form-switch p-0 d-flex gap-2 align-items-center">
                                    <label class="form-check-label small fw-bold text-muted" for="monetizationMasterToggle">Paywall Gate:</label>
                                    <input class="form-check-input m-0 fs-5" type="checkbox" role="switch" id="monetizationMasterToggle" checked style="cursor: pointer;">
                                </div>
                            </div>

                            <!-- Monetization Balance Ledger Metrics Cards Grid -->
                            <div class="row g-3 mb-4">
                                <div class="col-sm-6">
                                    <div class="metric-mini-card rounded-3 p-3">
                                        <span class="text-muted small text-uppercase fw-semibold d-block">Monthly Recurring Revenue (MRR)</span>
                                        <span class="h3 fw-bold text-dark d-block mt-1">$4,850.00</span>
                                        <span class="text-success small fw-bold"><i class="bi bi-graph-up-arrow me-1"></i>+12.4% this window</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="metric-mini-card rounded-3 p-3">
                                        <span class="text-muted small text-uppercase fw-semibold d-block">Withdrawable Liquidity Ledger</span>
                                        <span class="h3 fw-bold text-dark d-block mt-1">$1,240.15</span>
                                        <button type="button" class="btn btn-sm btn-outline-danger rounded-2 px-2.5 py-1 mt-1 fw-bold style-btn-mini" style="font-size:0.7rem;">
                                            <i class="bi bi-wallet2 me-1"></i> Request Clearing Transfer
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <form id="monetizationSettingsForm">
                                <!-- Configuration Set: Article Base Price Point Mapping -->
                                <div class="mb-4">
                                    <label class="form-label small fw-bold text-secondary">Premium Subscription Premium Tier Paywall Rate</label>
                                    <div class="input-group style-group-input" style="max-width: 280px;">
                                        <span class="input-group-text bg-light font-monospace">$</span>
                                        <input type="number" class="form-control rounded-3 py-2" value="4.99" step="0.01">
                                        <span class="input-group-text bg-light text-muted small">/ Month</span>
                                    </div>
                                    <div class="form-text text-muted" style="font-size:0.7rem">System automatically restricts entry access loops outside active token subscription holders.</div>
                                </div>

                                <!-- Configuration Set: Direct Payment Merchant Node Targets -->
                                <div class="mb-4">
                                    <label class="form-label small fw-bold text-secondary">Payout Merchant Destination Routing Node</label>
                                    <select class="form-select rounded-3 py-2" style="max-width: 400px;">
                                        <option value="stripe" selected>Stripe Connect Vault Pipeline (...4810)</option>
                                        <option value="paypal">PayPal Business Core Account Ledger</option>
                                        <option value="wire">Direct Bank Clearing Wire Routing Profile</option>
                                    </select>
                                </div>

                                <hr class="my-4 opacity-10">
                                <button type="submit" class="btn btn-dark rounded-3 px-4 py-2 fw-bold small">Commit Financial Parameters</button>
                            </form>
                        </div>
                    </div>

                    <!-- MENU PANE 3: Multi-Factor Security & Cryptographic Auth State Assertions -->
                    <div class="tab-pane fade" id="pane-auth" role="tabpanel" aria-labelledby="tab-auth">
                        <div class="bg-white border rounded-4 shadow-sm p-4">
                            <h4 class="h5 fw-bold text-dark mb-4" style="font-family: 'Georgia', serif;">Security Credentials & Access Governance</h4>
                            
                            <!-- Security Sub-System Form 1: Password Operations -->
                            <form id="securityCredentialForm" class="mb-5">
                                <h5 class="h6 fw-bold text-dark mb-3">Update Core System Password</h5>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label small fw-bold text-secondary">Current Active Password Key</label>
                                        <input type="password" class="form-control rounded-3 py-2" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-secondary">New Targeted Password Key</label>
                                        <input type="password" class="form-control rounded-3 py-2" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-secondary">Verify Targeted Password Key Sequence</label>
                                        <input type="password" class="form-control rounded-3 py-2" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-dark rounded-3 px-3 py-2 mt-3 fw-bold small">Re-key Authentication Password</button>
                            </form>

                            <hr class="my-4 opacity-10">

                            <!-- Security Sub-System Block 2: Multi-Factor Authentication Tokens -->
                            <div>
                                <div class="d-flex justify-content-between align-items-start gap-3">
                                    <div>
                                        <h5 class="h6 fw-bold text-dark mb-1">Multi-Factor Hardware Token MFA (2FA)</h5>
                                        <p class="text-muted small m-0">Injected cryptographic hardware signature sequences or TOTP app authenticators protect operations during database updates.</p>
                                    </div>
                                    <span class="badge bg-success bg-opacity-10 text-success font-monospace px-2.5 py-1.5 small"><i class="bi bi-shield-check me-1"></i> ACTIVE</span>
                                </div>
                                <div class="mt-3 bg-light rounded-3 p-3 border d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center gap-2.5">
                                        <i class="bi bi-phone fs-4 text-secondary"></i>
                                        <div>
                                            <span class="small fw-bold text-dark d-block">TOTP Authenticator Loop App</span>
                                            <span class="text-muted d-block" style="font-size:0.7rem">Synced securely on May 18, 2026</span>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-white bg-white border text-danger fw-semibold rounded-2 px-2.5 py-1">Deactivate Module</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>

    <!-- SCRIPT INTERFACE INTERCEPT MATRIX -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Track submit events for the internal profile settings configuration engines
            const identityForm = document.getElementById('profileIdentityForm');
            const monetizationForm = document.getElementById('monetizationSettingsForm');
            const securityForm = document.getElementById('securityCredentialForm');

            if(identityForm) {
                identityForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    alert("Metadata modifications synchronized seamlessly across structural presentation profile systems.");
                });
            }

            if(monetizationForm) {
                monetizationForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    alert("Subscription financial parameters securely committed to connected vault arrays.");
                });
            }

            if(securityForm) {
                securityForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    alert("Authentication password strings successfully rotated. Session states validated.");
                });
            }
        });
    </script>
    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>