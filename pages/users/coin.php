<?php include __DIR__."/compo/header.php"; ?>
    <?php include __DIR__."/compo/sidebar.php"; ?>
    <!-- 3. MAIN DASHBOARD CONTENT AREA OVERVIEW -->
<style>
        .form-control:focus, .form-select:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.25px rgba(220, 53, 69, 0.25);
        }
        .coin-balance-card {
            transition: all 0.2s ease;
            border-left: 4px solid #dee2e6;
        }
        .coin-balance-card:hover {
            transform: translateY(-2.5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.05) !important;
        }
        .coin-icon-frame {
            width: 44px;
            height: 44px;
            background-color: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-weight: bold;
        }
    </style>

    <main class="main-content-offset p-4 p-md-5">
        
        <!-- HEADER ROW STATUS -->
        <div class="mb-5">
            <h1 class="h3 fw-bold text-dark m-0" style="font-family: 'Georgia', serif;">Financial Vault & Clearing</h1>
            <p class="text-muted small mb-0">Oversee multi-network coin metrics, monitor asset storage values, and process secure account withdrawals.</p>
        </div>

        <!-- TWO-COLUMN FINANCIAL LAYER -->
        <div class="row g-4">
            
            <!-- LEFT COLUMN: Available Coin Balances Index -->
            <div class="col-xl-7">
                <div class="bg-white border rounded-4 shadow-sm p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold text-dark m-0" style="font-family: 'Georgia', serif;">Asset Storage Ledger</h5>
                        <div class="text-end">
                            <small class="text-muted text-uppercase fw-semibold font-monospace d-block" style="font-size: 0.7rem;">Combined Value</small>
                            <span class="h4 fw-bold text-dark">$14,240.50</span>
                        </div>
                    </div>

                    <!-- COIN MATRIX STACK -->
                    <div class="d-flex flex-column gap-3">
                        
                        <!-- BITCOIN CARD -->
                        <div class="card coin-balance-card bg-white p-3 rounded-3" style="border-left-color: #f59e0b;">
                            <div class="row align-items-center g-3">
                                <div class="col-auto">
                                    <div class="coin-icon-frame text-warning" style="background-color: #fef3c7;">BTC</div>
                                </div>
                                <div class="col">
                                    <span class="fw-bold text-dark d-block">Bitcoin</span>
                                    <span class="text-muted small font-monospace">Network Node: Mainnet</span>
                                </div>
                                <div class="col text-end">
                                    <span class="fw-bold text-dark d-block">0.14500 BTC</span>
                                    <span class="text-muted small d-block" style="font-size: 0.75rem;">≈ $9,425.00</span>
                                </div>
                            </div>
                        </div>

                        <!-- ETHEREUM CARD -->
                        <div class="card coin-balance-card bg-white p-3 rounded-3" style="border-left-color: #6366f1;">
                            <div class="row align-items-center g-3">
                                <div class="col-auto">
                                    <div class="coin-icon-frame text-primary" style="background-color: #e0e7ff;">ETH</div>
                                </div>
                                <div class="col">
                                    <span class="fw-bold text-dark d-block">Ethereum</span>
                                    <span class="text-muted small font-monospace">Network Node: ERC-20</span>
                                </div>
                                <div class="col text-end">
                                    <span class="fw-bold text-dark d-block">1.28400 ETH</span>
                                    <span class="text-muted small d-block" style="font-size: 0.75rem;">≈ $3,852.00</span>
                                </div>
                            </div>
                        </div>

                        <!-- SOLANA CARD -->
                        <div class="card coin-balance-card bg-white p-3 rounded-3" style="border-left-color: #14b8a6;">
                            <div class="row align-items-center g-3">
                                <div class="col-auto">
                                    <div class="coin-icon-frame text-info" style="background-color: #ccfbf1;">SOL</div>
                                </div>
                                <div class="col">
                                    <span class="fw-bold text-dark d-block">Solana</span>
                                    <span class="text-muted small font-monospace">Network Node: SPL</span>
                                </div>
                                <div class="col text-end">
                                    <span class="fw-bold text-dark d-block">6.50000 SOL</span>
                                    <span class="text-muted small d-block" style="font-size: 0.75rem;">≈ $963.50</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN: Secure Asset Clearing/Withdrawal Form -->
            <div class="col-xl-5">
                <div class="bg-white border rounded-4 shadow-sm p-4 position-sticky" style="top: 24px;">
                    <h5 class="fw-bold text-dark mb-4" style="font-family: 'Georgia', serif;">Execute Clearing Withdrawal</h5>
                    
                    <form id="vaultWithdrawalForm" autocomplete="off">
                        <!-- Input 1: Asset Target Selection Route -->
                        <div class="mb-3">
                            <label for="withdrawalAsset" class="form-label small fw-bold text-secondary">Asset Form to Extract</label>
                            <select class="form-select rounded-3 py-2" id="withdrawalAsset" required onchange="updateWithdrawalBoundaries()">
                                <option value="" selected disabled>Select token node source...</option>
                                <option value="BTC" data-max="0.145" data-fee="0.0005">Bitcoin (BTC) &bull; Bal: 0.14500</option>
                                <option value="ETH" data-max="1.284" data-fee="0.004">Ethereum (ETH) &bull; Bal: 1.28400</option>
                                <option value="SOL" data-max="6.500" data-fee="0.01">Solana (SOL) &bull; Bal: 6.50000</option>
                            </select>
                        </div>

                        <!-- Input 2: Destination Public Key Address -->
                        <div class="mb-3">
                            <label for="destinationAddress" class="form-label small fw-bold text-secondary">Target Public Address Key</label>
                            <input type="text" class="form-control rounded-3 py-2 font-monospace" id="destinationAddress" placeholder="e.g., 0x71C... or bc1q..." required style="font-size: 0.8rem;">
                            <div class="form-text text-muted" style="font-size: 0.7rem;">Verify target routing. Un-indexed network anomalies cannot be reversed.</div>
                        </div>

                        <!-- Input 3: Volume Extraction Limits Input -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-1">
                                <label for="withdrawalAmount" class="form-label small fw-bold text-secondary mb-0">Extraction Liquidity Value</label>
                                <button type="button" onclick="maximizeWithdrawalVolume()" class="btn btn-link text-danger p-0 font-monospace text-decoration-none small fw-bold" style="font-size: 0.75rem;">Use Max Volume</button>
                            </div>
                            <div class="input-group">
                                <input type="number" class="form-control rounded-3 py-2" id="withdrawalAmount" placeholder="0.00000" step="any" min="0" required>
                                <span class="input-group-text bg-light font-monospace small" id="assetTickerLabel">UNIT</span>
                            </div>
                            <!-- Real-time network fee calculations display box -->
                            <div class="mt-2 text-muted font-monospace d-flex justify-content-between px-1" style="font-size: 0.7rem;">
                                <span>Network Pipeline Surcharge:</span>
                                <span id="pipelineFeeLabel">0.00000</span>
                            </div>
                        </div>

                        <!-- Submit Execution Hook -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark rounded-3 py-2.5 fw-bold small shadow-sm">
                                Dispatch Pipeline Transaction
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </main>

    <!-- PROCESSING ROUTINE LOGIC SCRIPTS -->
    <script>
        // 1. DYNAMIC SYSTEM RE-TICKER MAPPING: Monitor configuration boundaries instantly
        function updateWithdrawalBoundaries() {
            const selector = document.getElementById('withdrawalAsset');
            const selectedOption = selector.options[selector.selectedIndex];
            
            const assetTicker = selector.value;
            const networkFee = selectedOption.getAttribute('data-fee');

            // Adjust interface elements strings dynamically
            document.getElementById('assetTickerLabel').innerText = assetTicker;
            document.getElementById('pipelineFeeLabel').innerText = `${networkFee} ${assetTicker}`;
            
            const amountInput = document.getElementById('withdrawalAmount');
            amountInput.value = '';
            amountInput.setAttribute('max', selectedOption.getAttribute('data-max'));
        }

        // 2. MAXIMIZE QUANTITY UTILIZATION TRACER UTILITY
        function maximizeWithdrawalVolume() {
            const selector = document.getElementById('withdrawalAsset');
            if(!selector.value) {
                alert("Please select a target asset form node first before maximizing quantity.");
                return;
            }
            const selectedOption = selector.options[selector.selectedIndex];
            const maximumVolumeVal = selectedOption.getAttribute('data-max');
            
            document.getElementById('withdrawalAmount').value = maximumVolumeVal;
        }

        // 3. SECURE INTERCEPT AUDITING ENGINE: Validate transactions parameters before dispatch
        document.getElementById('vaultWithdrawalForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const chosenAsset = document.getElementById('withdrawalAsset').value;
            const chosenVolume = document.getElementById('withdrawalAmount').value;
            const destinationKey = document.getElementById('destinationAddress').value;

            // Generate an explicit data processing verification log
            const securityCheckString = `Confirm operational extraction manifest request:\n\nAsset Profile: ${chosenAsset}\nVolume Measure: ${chosenVolume} ${chosenAsset}\nTarget Key Routing: ${destinationKey}\n\nExecute processing?`;
            
            if(confirm(securityCheckString)) {
                alert(`Transaction packet encrypted and routed to ${chosenAsset} network relays. Clearing confirmation pending memory pool validation loop blocks.`);
                document.getElementById('vaultWithdrawalForm').reset();
                document.getElementById('assetTickerLabel').innerText = "UNIT";
                document.getElementById('pipelineFeeLabel').innerText = "0.00000";
            }
        });
    </script>
    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>