<?php include __DIR__."/compo/header.php"; ?>
    <?php include __DIR__."/compo/sidebar.php"; ?>
    <!-- 3. MAIN DASHBOARD CONTENT AREA OVERVIEW -->
<style>
        .form-control:focus, .form-select:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.25px rgba(220, 53, 69, 0.25);
        }
        .subscriber-row {
            transition: background-color 0.15s ease;
        }
        .subscriber-row:hover {
            background-color: #f8fafc !important;
        }
        .avatar-initials {
            width: 40px;
            height: 40px;
            background-color: #e2e8f0;
            color: #475569;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
    </style>

    <main class="main-content-offset p-4 p-md-5">
        
        <!-- HEADER AND SUB-TEXT TELEMETRY ROW -->
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-5">
            <div>
                <h1 class="h3 fw-bold text-dark m-0" style="font-family: 'Georgia', serif;">Subscriber Audience</h1>
                <p class="text-muted small mb-0">Track reader retention rates, segment member tiers, and oversee billing validation profiles.</p>
            </div>
            <div class="d-flex gap-2">
                <button type="button" onclick="exportSubscriberData()" class="btn btn-outline-dark rounded-3 px-3 py-2 fw-semibold small">
                    <i class="bi bi-download me-1.5"></i> Export CSV Catalog
                </button>
            </div>
        </div>

        <!-- AUDIENCE METRICS OVERVIEW HUB -->
        <div class="row g-3 mb-4">
            <div class="col-6 col-lg-3">
                <div class="bg-white border rounded-4 p-3 shadow-sm">
                    <span class="text-muted small text-uppercase fw-semibold d-block">Total Readership</span>
                    <span class="h4 fw-bold text-dark d-block mt-1">12,480</span>
                    <span class="text-success small fw-bold font-monospace" style="font-size: 0.75rem;"><i class="bi bi-arrow-up-short"></i>+3.2% this month</span>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="bg-white border rounded-4 p-3 shadow-sm">
                    <span class="text-muted small text-uppercase fw-semibold d-block">Premium Paid Tiers</span>
                    <span class="h4 fw-bold text-dark d-block mt-1">1,845</span>
                    <span class="text-danger small fw-bold font-monospace" style="font-size: 0.75rem;">14.7% conversion</span>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="bg-white border rounded-4 p-3 shadow-sm">
                    <span class="text-muted small text-uppercase fw-semibold d-block">Active Churn Vector</span>
                    <span class="h4 fw-bold text-dark d-block mt-1">1.8%</span>
                    <span class="text-success small fw-bold font-monospace" style="font-size: 0.75rem;"><i class="bi bi-dash"></i>0.4% stabilization</span>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="bg-white border rounded-4 p-3 shadow-sm">
                    <span class="text-muted small text-uppercase fw-semibold d-block">Net Open Volume</span>
                    <span class="h4 fw-bold text-dark d-block mt-1">64.2%</span>
                    <span class="text-muted small font-monospace" style="font-size: 0.75rem;">Industry standard: 22%</span>
                </div>
            </div>
        </div>

        <!-- CONTROL FILTER BAR SYSTEM -->
        <div class="bg-white border rounded-4 shadow-sm p-3 mb-4">
            <div class="row g-3 align-items-center">
                <!-- Search Query Field -->
                <div class="col-12 col-md-5">
                    <div class="input-group input-group-sm">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-search"></i></span>
                        <input type="text" id="subscriberSearchInput" class="form-control border-start-0 py-2" placeholder="Search by name, email string, or company identifier...">
                    </div>
                </div>
                <!-- Premium Level Tier Categorizer Dropdown -->
                <div class="col-6 col-md-3">
                    <select id="tierSelectorFilter" class="form-select form-select-sm py-2 rounded-2">
                        <option value="all">All Access Levels</option>
                        <option value="premium">Premium Paying Tier</option>
                        <option value="free">Free Newsletter Layer</option>
                    </select>
                </div>
                <!-- Payment Operational Health Filter -->
                <div class="col-6 col-md-4 text-md-end">
                    <div class="btn-group btn-group-sm w-100" role="group">
                        <input type="radio" class="btn-check" name="statusFilterRadio" id="statusAll" value="all" checked autocomplete="off">
                        <label class="btn btn-outline-secondary py-2" for="statusAll">All States</label>
                        
                        <input type="radio" class="btn-check" name="statusFilterRadio" id="statusActive" value="active" autocomplete="off">
                        <label class="btn btn-outline-secondary py-2" for="statusActive">Active</label>
                        
                        <input type="radio" class="btn-check" name="statusFilterRadio" id="statusPastDue" value="pastdue" autocomplete="off">
                        <label class="btn btn-outline-secondary py-2" for="statusPastDue">Past Due</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- SUBSCRIBER TABLE DIRECTORY FRAMEWORK -->
        <div class="bg-white border rounded-4 shadow-sm overflow-hidden">
            <div class="table-responsive">
                <table class="table align-middle mb-0" id="subscriberDirectoryMatrix">
                    <thead class="table-light border-bottom text-secondary small text-uppercase font-monospace" style="font-size: 0.75rem;">
                        <tr>
                            <th scope="col" class="ps-4 py-3">Reader Node Details</th>
                            <th scope="col" class="py-3">Membership Level</th>
                            <th scope="col" class="py-3">Lifecycle State</th>
                            <th scope="col" class="py-3">Enrollment Date</th>
                            <th scope="col" class="py-3 pe-4 text-end">Account Options</th>
                        </tr>
                    </thead>
                    <tbody class="small" style="font-size: 0.85rem;">
                        
                        <!-- DIRECTORY LINE ITEM 1 -->
                        <tr class="subscriber-row border-bottom" data-tier="premium" data-status="active">
                            <td class="ps-4 py-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar-initials bg-danger bg-opacity-10 text-danger">MW</div>
                                    <div>
                                        <span class="fw-bold text-dark d-block">Marcus Vance</span>
                                        <span class="text-muted small d-block">m.vance@quantumventures.io</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-danger bg-opacity-10 text-danger px-2 py-1 rounded fw-semibold" style="font-size: 0.7rem;">PREMIUM ANNUAL</span>
                            </td>
                            <td>
                                <span class="badge bg-success bg-opacity-10 text-success px-2 py-0.5 rounded font-monospace" style="font-size: 0.7rem;"><i class="bi bi-check-circle-fill me-1"></i> ACTIVE</span>
                            </td>
                            <td class="text-muted">Jan 14, 2025</td>
                            <td class="pe-4 text-end">
                                <div class="btn-group btn-group-sm rounded-2 shadow-sm">
                                    <button type="button" onclick="inspectReaderHistory('m.vance@quantumventures.io')" class="btn btn-white bg-white border text-dark" title="View Reading Metrics"><i class="bi bi-graph-up"></i></button>
                                    <button type="button" onclick="modifyAccessTier(301, 'Marcus Vance')" class="btn btn-white bg-white border text-dark" title="Adjust Profile Parameters"><i class="bi bi-sliders"></i></button>
                                </div>
                            </td>
                        </tr>

                        <!-- DIRECTORY LINE ITEM 2 -->
                        <tr class="subscriber-row border-bottom" data-tier="free" data-status="active">
                            <td class="ps-4 py-3">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=40&h=40&q=80" class="rounded-circle object-fit-cover" alt="Subscriber Profile">
                                    <div>
                                        <span class="fw-bold text-dark d-block">Aisha Rahman</span>
                                        <span class="text-muted small d-block">aisha.rahman@globalpolicy.org</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-secondary bg-opacity-10 text-muted px-2 py-1 rounded fw-semibold" style="font-size: 0.7rem;">FREE NEWSLETTER</span>
                            </td>
                            <td>
                                <span class="badge bg-success bg-opacity-10 text-success px-2 py-0.5 rounded font-monospace" style="font-size: 0.7rem;"><i class="bi bi-check-circle-fill me-1"></i> ACTIVE</span>
                            </td>
                            <td class="text-muted">Mar 22, 2026</td>
                            <td class="pe-4 text-end">
                                <div class="btn-group btn-group-sm rounded-2 shadow-sm">
                                    <button type="button" onclick="inspectReaderHistory('aisha.rahman@globalpolicy.org')" class="btn btn-white bg-white border text-dark"><i class="bi bi-graph-up"></i></button>
                                    <button type="button" onclick="modifyAccessTier(302, 'Aisha Rahman')" class="btn btn-white bg-white border text-dark"><i class="bi bi-sliders"></i></button>
                                </div>
                            </td>
                        </tr>

                        <!-- DIRECTORY LINE ITEM 3 -->
                        <tr class="subscriber-row border-bottom" data-tier="premium" data-status="pastdue">
                            <td class="ps-4 py-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar-initials bg-dark text-white">HL</div>
                                    <div>
                                        <span class="fw-bold text-dark d-block">Holger Lindqvist</span>
                                        <span class="text-muted small d-block">h.lindqvist@nordiccleantech.se</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-danger bg-opacity-10 text-danger px-2 py-1 rounded fw-semibold" style="font-size: 0.7rem;">PREMIUM MONTHLY</span>
                            </td>
                            <td>
                                <span class="badge bg-warning bg-opacity-10 text-warning px-2 py-0.5 rounded font-monospace" style="font-size: 0.7rem;"><i class="bi bi-exclamation-triangle-fill me-1"></i> PAST DUE</span>
                            </td>
                            <td class="text-muted">Nov 08, 2024</td>
                            <td class="pe-4 text-end">
                                <div class="btn-group btn-group-sm rounded-2 shadow-sm">
                                    <button type="button" onclick="inspectReaderHistory('h.lindqvist@nordiccleantech.se')" class="btn btn-white bg-white border text-dark"><i class="bi bi-graph-up"></i></button>
                                    <button type="button" onclick="modifyAccessTier(303, 'Holger Lindqvist')" class="btn btn-white bg-white border text-dark"><i class="bi bi-sliders"></i></button>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- INTERFACE ROUTING LOGIC EXECUTION SCRIPTS -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Set event listeners for search inputs, dropdown filters, and status switches
            document.getElementById('subscriberSearchInput').addEventListener('input', processingAudienceDirectoryFilters);
            document.getElementById('tierSelectorFilter').addEventListener('change', processingAudienceDirectoryFilters);
            
            const stateRadioSelectors = document.querySelectorAll('input[name="statusFilterRadio"]');
            stateRadioSelectors.forEach(radio => {
                radio.addEventListener('change', processingAudienceDirectoryFilters);
            });
        });

        // 1. LIVE DIRECTORY FILTER ROUTINE: Run real-time matrix sorting queries
        function processingAudienceDirectoryFilters() {
            const queryValue = document.getElementById('subscriberSearchInput').value.toLowerCase().trim();
            const chosenTier = document.getElementById('tierSelectorFilter').value;
            const chosenStatus = document.querySelector('input[name="statusFilterRadio"]:checked').value;

            const dataRows = document.querySelectorAll('#subscriberDirectoryMatrix tbody tr');

            dataRows.forEach(row => {
                const textSearchSpace = row.querySelector('td:first-child').innerText.toLowerCase();
                const rowTier = row.getAttribute('data-tier');
                const rowStatus = row.getAttribute('data-status');

                const matchesQuery = textSearchSpace.includes(queryValue);
                const matchesTier = (chosenTier === 'all' || rowTier === chosenTier);
                const matchesStatus = (chosenStatus === 'all' || rowStatus === chosenStatus);

                if (matchesQuery && matchesTier && matchesStatus) {
                    row.classList.remove('d-none');
                } else {
                    row.classList.add('d-none');
                }
            });
        }

        // 2. EXPORT HELPER SUMMARY ROUTINE
        function exportSubscriberData() {
            alert("Compiling membership ledger entries... CSV spreadsheet bundle download initialized successfully.");
        }

        // 3. ANALYTICS ROW ACTION HOOK
        function inspectReaderHistory(emailAddress) {
            alert(`Opening analytical profile logs tracking historical newsletter click rates for: ${emailAddress}`);
        }

        // 4. PRESETS PARAMETERS ACTION MODIFIER HOOK
        function modifyAccessTier(recordId, nameStr) {
            alert(`Opening access override configurations panel for database record ID: ${recordId} (${nameStr})`);
        }
    </script>
    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>