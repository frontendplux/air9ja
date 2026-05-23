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
    <div class="sidebar-fixed d-none d-lg-flex flex-column p-4 text-white justify-content-between">
        <div>
            <div class="mb-5">
                <h3 class="brand-logo m-0 text-white">THE <span class="text-danger">CHRONICLE</span></h3>
                <span class="text-muted small text-uppercase tracking-wider font-monospace" style="font-size: 0.65rem;">Workspace Console</span>
            </div>
            
            <nav class="nav flex-column gap-1">
                <a class="nav-link nav-link-custom active rounded-3 px-3 py-2.5 d-flex align-items-center gap-3" href="#">
                    <i class="bi bi-speedometer2 fs-5"></i> Overview Dashboard
                </a>
                <a class="nav-link nav-link-custom rounded-3 px-3 py-2.5 d-flex align-items-center gap-3" href="#">
                    <i class="bi bi-journal-text fs-5"></i> Stories & Archives
                </a>
                <a class="nav-link nav-link-custom rounded-3 px-3 py-2.5 d-flex align-items-center gap-3" href="#">
                    <i class="bi bi-graph-up fs-5"></i> Traffic Metrics
                </a>
                <a class="nav-link nav-link-custom rounded-3 px-3 py-2.5 d-flex align-items-center gap-3" href="#">
                    <i class="bi bi-people fs-5"></i> Subscribers Tier
                </a>
                <a class="nav-link nav-link-custom rounded-3 px-3 py-2.5 d-flex align-items-center gap-3" href="#">
                    <i class="bi bi-gear fs-5"></i> Settings Configuration
                </a>
            </nav>
        </div>

        <!-- User Profile Card (Footer Side) -->
        <div class="border-top border-secondary border-opacity-25 pt-3 d-flex align-items-center gap-3">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" 
                 class="rounded-circle object-fit-cover" style="width: 40px; height: 40px;" alt="User Avatar">
            <div class="overflow-hidden">
                <h6 class="m-0 fw-bold text-truncate text-white" style="font-size: 0.85rem;">Sarah Jenkins</h6>
                <small class="text-muted text-truncate d-block" style="font-size: 0.75rem;">Senior Editor</small>
            </div>
        </div>
    </div>

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
        .nav-editorial-tabs .nav-link {
            border: none;
            color: #64748b;
            font-weight: 600;
            padding: 0.75rem 1.25rem;
            border-bottom: 2px solid transparent;
            transition: all 0.2s ease;
        }
        .nav-editorial-tabs .nav-link.active {
            color: #dc3545;
            border-bottom-color: #dc3545;
            background: none;
        }
        .avatar-circle {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
            background-color: #f1f5f9;
        }
    </style>

    <main class="main-content-offset p-4 p-md-5">
        
        <!-- HEADER INTERFACE: Identity Title Operations -->
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-5">
            <div>
                <h1 class="h3 fw-bold text-dark m-0" style="font-family: 'Georgia', serif;">User Directory & Creator Hub</h1>
                <p class="text-muted small mb-0">Manage user authorization roles, audit monetization metrics, and enforce security policies.</p>
            </div>
            <div>
                <button type="button" class="btn btn-danger rounded-3 px-3 py-2 fw-bold shadow-sm small" data-bs-toggle="modal" data-bs-target="#createUserModal">
                    <i class="bi bi-person-plus me-2"></i> Provision New User Account
                </button>
            </div>
        </div>

        <!-- HIGHER LEVEL METRICS GRID: Monetization & Traffic Counters -->
        <div class="row g-4 mb-5">
            <div class="col-sm-6 col-xl-3">
                <div class="card bg-white border rounded-4 p-4 shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="text-muted small text-uppercase fw-semibold">Monthly Recurring Revenue</span>
                        <span class="text-success small fw-bold"><i class="bi bi-arrow-up-right"></i> +12%</span>
                    </div>
                    <span class="h3 fw-bold text-dark">$14,250.00</span>
                    <span class="text-muted font-monospace mt-1" style="font-size: 0.7rem;">Active Stripe Gateway Node</span>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card bg-white border rounded-4 p-4 shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="text-muted small text-uppercase fw-semibold">Premium Subscribers</span>
                        <span class="text-danger small font-monospace">Tier 1/2</span>
                    </div>
                    <span class="h3 fw-bold text-dark">1,840</span>
                    <span class="text-muted mt-1 d-block" style="font-size: 0.7rem;">Average $7.74 per user seat yield</span>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card bg-white border rounded-4 p-4 shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="text-muted small text-uppercase fw-semibold">Pending Creator Payouts</span>
                        <span class="badge bg-warning text-warning bg-opacity-10 font-monospace rounded-pill px-2 py-0.5" style="font-size: 0.65rem;">Escrow</span>
                    </div>
                    <span class="h3 fw-bold text-dark">$3,810.50</span>
                    <span class="text-muted mt-1 d-block" style="font-size: 0.7rem;">Scheduled release execution: May 25</span>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card bg-white border rounded-4 p-4 shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="text-muted small text-uppercase fw-semibold">MFA Adoption Rate</span>
                        <span class="text-success small fw-bold"><i class="bi bi-shield-check"></i> Secure</span>
                    </div>
                    <span class="h3 fw-bold text-dark">94.2%</span>
                    <span class="text-muted mt-1 d-block" style="font-size: 0.7rem;">Enforced hardware & app tokens</span>
                </div>
            </div>
        </div>

        <!-- NAVIGATION CONTROL MENUS -->
        <div class="border-bottom mb-4">
            <ul class="nav nav-editorial-tabs" id="userHubMenuTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="all-accounts-tab" data-bs-toggle="tab" data-bs-target="#allAccountsPanel" type="button" role="tab">
                        <i class="bi bi-people me-2"></i>User Directories
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="monetization-ledger-tab" data-bs-toggle="tab" data-bs-target="#monetizationPanel" type="button" role="tab">
                        <i class="bi bi-cash-coin me-2"></i>Creator Monetization
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="auth-security-tab" data-bs-toggle="tab" data-bs-target="#authSecurityPanel" type="button" role="tab">
                        <i class="bi bi-shield-lock me-2"></i>Authentication Audits
                    </button>
                </li>
            </ul>
        </div>

        <!-- TAB CONTENT CONTENT LAYERS -->
        <div class="tab-content" id="userHubMenuContent">
            
            <!-- MENU PANEL 1: Accounts Registry Table -->
            <div class="tab-pane fade show active" id="allAccountsPanel" role="tabpanel">
                <div class="bg-white border rounded-4 shadow-sm p-4">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light text-muted small text-uppercase">
                                <tr>
                                    <th class="border-0 px-3">Identity User</th>
                                    <th class="border-0">Role Permissions</th>
                                    <th class="border-0">Tier Status</th>
                                    <th class="border-0 text-end px-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="small">
                                <tr>
                                    <td class="px-3">
                                        <div class="d-flex align-items-center gap-3">
                                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=100&q=80" class="avatar-circle" alt="User Headshot Asset">
                                            <div>
                                                <div class="fw-bold text-dark">Marcus Vance</div>
                                                <span class="text-muted d-block" style="font-size:0.75rem">marcus.v@media-node.net</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-danger bg-opacity-10 text-danger px-2 py-1">Administrator</span></td>
                                    <td><span class="badge bg-dark text-white px-2 py-1 font-monospace">PRO VIP</span></td>
                                    <td class="text-end px-3">
                                        <div class="btn-group btn-group-sm shadow-sm rounded-2">
                                            <button type="button" onclick="triggerPasswordReset('marcus.v@media-node.net')" class="btn btn-white bg-white border text-dark" title="Reset Credentials Authentication"><i class="bi bi-key"></i></button>
                                            <button type="button" class="btn btn-white bg-white border text-dark" title="Modify Profiles"><i class="bi bi-sliders"></i></button>
                                            <button type="button" class="btn btn-white bg-white border text-danger" title="Suspend User Access"><i class="bi bi-person-x"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-3">
                                        <div class="d-flex align-items-center gap-3">
                                            <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=100&q=80" class="avatar-circle" alt="User Headshot Asset">
                                            <div>
                                                <div class="fw-bold text-dark">Helena Ross</div>
                                                <span class="text-muted d-block" style="font-size:0.75rem">h.ross@editorial-staff.org</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-primary bg-opacity-10 text-primary px-2 py-1">Staff Editor</span></td>
                                    <td><span class="badge bg-light text-secondary border px-2 py-1 font-monospace">STANDARD</span></td>
                                    <td class="text-end px-3">
                                        <div class="btn-group btn-group-sm shadow-sm rounded-2">
                                            <button type="button" onclick="triggerPasswordReset('h.ross@editorial-staff.org')" class="btn btn-white bg-white border text-dark"><i class="bi bi-key"></i></button>
                                            <button type="button" class="btn btn-white bg-white border text-dark"><i class="bi bi-sliders"></i></button>
                                            <button type="button" class="btn btn-white bg-white border text-danger"><i class="bi bi-person-x"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- MENU PANEL 2: Creator Monetization Matrix Split -->
            <div class="tab-pane fade" id="monetizationPanel" role="tabpanel">
                <div class="bg-white border rounded-4 shadow-sm p-4">
                    <h5 class="fw-bold text-dark mb-4" style="font-family: 'Georgia', serif;">Creator Revenue Splits</h5>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light text-muted small text-uppercase">
                                <tr>
                                    <th class="border-0 px-3">Creator Identity</th>
                                    <th class="border-0">Gross Revenue Generated</th>
                                    <th class="border-0">Platform Fee Split (15%)</th>
                                    <th class="border-0 text-end px-3">Payout Processing status</th>
                                </tr>
                            </thead>
                            <tbody class="small font-monospace">
                                <tr>
                                    <td class="px-3 font-sans-serif fw-bold text-dark">Marcus Vance</td>
                                    <td class="text-dark">$8,450.00</td>
                                    <td class="text-muted">$1,267.50</td>
                                    <td class="text-end px-3"><span class="badge bg-success bg-opacity-10 text-success font-sans-serif px-2 py-1">CLEARED STRIPE</span></td>
                                </tr>
                                <tr>
                                    <td class="px-3 font-sans-serif fw-bold text-dark">Helena Ross</td>
                                    <td class="text-dark">$3,120.00</td>
                                    <td class="text-muted">$468.00</td>
                                    <td class="text-end px-3"><span class="badge bg-warning bg-opacity-10 text-warning font-sans-serif px-2 py-1">HOLD ESCROW</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- MENU PANEL 3: Authentication Security Real-Time Log Logs -->
            <div class="tab-pane fade" id="authSecurityPanel" role="tabpanel">
                <div class="bg-white border rounded-4 shadow-sm p-4">
                    <h5 class="fw-bold text-dark mb-4" style="font-family: 'Georgia', serif;">Identity Authentication Security Vector Audit Logs</h5>
                    <div class="d-flex flex-column gap-3">
                        <div class="p-3 bg-light rounded-3 d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2">
                            <div>
                                <span class="badge bg-success text-uppercase px-2 py-0.5 rounded font-monospace small mb-1">MFA AUTH SUCCESS</span>
                                <div class="fw-bold text-dark small">User marcus.v@media-node.net authorized access vector session safely.</div>
                                <small class="text-muted font-monospace" style="font-size:0.7rem">IP Address Coordinate: 192.168.42.110 &bull; Hardware Token Key FH-902</small>
                            </div>
                            <span class="text-muted small font-monospace">Just now</span>
                        </div>
                        <div class="p-3 bg-light rounded-3 d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2">
                            <div>
                                <span class="badge bg-danger text-uppercase px-2 py-0.5 rounded font-monospace small mb-1">BAD PASSWORD ATTEMPT</span>
                                <div class="fw-bold text-dark small">Failed login attempts flagged outside valid identity scope.</div>
                                <small class="text-muted font-monospace" style="font-size:0.7rem">IP Address Coordinate: 45.22.109.4 &bull; Target handle entry context: h.ross@editorial-staff.org</small>
                            </div>
                            <span class="text-muted small font-monospace">14 mins ago</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>

    <!-- NEW USER ACCOUNT SETUP PROVISIONING OVERLAY MODAL -->
    <div class="modal fade" id="createUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 shadow">
                <div class="modal-header border-bottom-0 px-4 pt-4 pb-0">
                    <h5 class="fw-bold text-dark m-0" style="font-family: 'Georgia', serif;">Provision Identity Access</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="provisionUserForm" autocomplete="off">
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label for="newUserName" class="form-label small fw-bold text-secondary">Full Identity Name</label>
                            <input type="text" class="form-control rounded-3 py-2" id="newUserName" placeholder="e.g., Jane Doe" required>
                        </div>
                        <div class="mb-3">
                            <label for="newUserEmail" class="form-label small fw-bold text-secondary">System Communication Email</label>
                            <input type="email" class="form-control rounded-3 py-2" id="newUserEmail" placeholder="jane.doe@network-node.io" required>
                        </div>
                        <div class="row g-3 mb-2">
                            <div class="col-6">
                                <label for="newUserRole" class="form-label small fw-bold text-secondary">Role Group Permissions</label>
                                <select class="form-select rounded-3 py-2" id="newUserRole" required>
                                    <option value="subscriber" selected>Subscriber</option>
                                    <option value="editor">Staff Editor</option>
                                    <option value="admin">Administrator</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="newUserTier" class="form-label small fw-bold text-secondary">Monetization Subscription Tier</label>
                                <select class="form-select rounded-3 py-2" id="newUserTier" required>
                                    <option value="free">Standard Free Account</option>
                                    <option value="pro">Premium PRO Tier</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0 px-4 pb-4 pt-0">
                        <button type="button" class="btn btn-light rounded-3 py-2 text-secondary fw-semibold small" data-bs-dismiss="modal">Abort Provisioning</button>
                        <button type="submit" class="btn btn-dark rounded-3 py-2 px-3 fw-bold small">Execute System Injection</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- SCRIPT RUNTIME UTILITY CONTROL MECHANISMS -->
    <script>
        // 1. Core Authentication Intervention Utility
        function triggerPasswordReset(userEmailHandle) {
            if(confirm(`Are you sure you want to invalidate active session encryption parameters and dispatch an automated secure credential reset token link to ${userEmailHandle}?`)) {
                alert(`Authentication reset transmission sequence successfully pushed to transmission arrays for: ${userEmailHandle}`);
            }
        }

        // 2. Intercept Account Form Setup Operations
        document.getElementById('provisionUserForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const emailAddressInput = document.getElementById('newUserEmail').value;
            
            alert(`User record associated with ${emailAddressInput} provisioned onto authorization servers cleanly.`);
            
            // Programmatically retract open Bootstrap modal state frames
            const openModalWrapperElement = document.getElementById('createUserModal');
            const instanceReference = bootstrap.Modal.getInstance(openModalWrapperElement);
            instanceReference.hide();
            
            this.reset();
        });
    </script>
    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>