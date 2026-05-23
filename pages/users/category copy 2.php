<?php include __DIR__."/compo/header.php"; ?>
    <?php include __DIR__."/compo/sidebar.php"; ?>

    <!-- 3. MAIN DASHBOARD CONTENT AREA OVERVIEW -->
   <style>
        .form-control:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.25px rgba(220, 53, 69, 0.25);
        }
        .category-item-card {
            transition: all 0.2s ease;
        }
        .category-item-card:hover {
            border-color: #cbd5e1 !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.03) !important;
        }
        .color-preview-pill {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
        }
    </style>

    <main class="main-content-offset p-4 p-md-5">
        
        <!-- HEADER CONTROLS ROW -->
        <div class="mb-5">
            <h1 class="h3 fw-bold text-dark m-0" style="font-family: 'Georgia', serif;">Taxonomy & Channels</h1>
            <p class="text-muted small mb-0">Configure your global publication sections, custom url slugs, and navigation routing nodes.</p>
        </div>

        <!-- SPLIT MATRIX LAYER: Creation Console vs Active Directory -->
        <div class="row g-4">
            
            <!-- LEFT PANEL: Quick Add Category Form -->
            <!-- LEFT PANEL: CATEGORY FORM -->
<div class="col-xl-4">

    <div class="bg-white border rounded-4 shadow-sm p-4 position-sticky" style="top:24px;">

        <h5
            class="fw-bold text-dark mb-4"
            style="font-family:'Georgia',serif;"
            id="formPanelHeader"
        >
            Create New Category
        </h5>

        <form id="categoryManagementForm">

            <input type="hidden" id="categoryStateId">

            <!-- NAME -->
            <div class="mb-3">

                <label class="form-label small fw-bold text-secondary">
                    Category Name
                </label>

                <input
                    type="text"
                    id="categoryName"
                    class="form-control rounded-3 py-2"
                    placeholder="Technology"
                    required
                >

            </div>

            <!-- SLUG -->
            <div class="mb-3">

                <label class="form-label small fw-bold text-secondary">
                    Slug
                </label>

                <input
                    type="text"
                    id="categorySlug"
                    class="form-control rounded-3 py-2"
                    placeholder="technology"
                    required
                >

            </div>

            <!-- DESCRIPTION -->
            <div class="mb-3">

                <label class="form-label small fw-bold text-secondary">
                    Description
                </label>

                <textarea
                    id="categoryDescription"
                    class="form-control rounded-3"
                    rows="3"
                    placeholder="Write category description..."
                ></textarea>

            </div>

            <!-- ICON -->
            <div class="mb-3">

                <label class="form-label small fw-bold text-secondary">
                    Bootstrap Icon
                </label>

                <input
                    type="text"
                    id="categoryIcon"
                    class="form-control rounded-3 py-2"
                    placeholder="bi bi-laptop"
                >

                <small class="text-muted">
                    Example: bi bi-laptop
                </small>

            </div>

            <!-- IMAGE -->
            <div class="mb-3">

                <label class="form-label small fw-bold text-secondary">
                    Image URL
                </label>

                <input
                    type="text"
                    id="categoryImage"
                    class="form-control rounded-3 py-2"
                    placeholder="https://example.com/image.jpg"
                >

            </div>

            <!-- STATUS -->
            <div class="mb-4">

                <label class="form-label small fw-bold text-secondary">
                    Status
                </label>

                <select
                    id="categoryStatus"
                    class="form-select rounded-3 py-2"
                >
                    <option value="active">
                        Active
                    </option>

                    <option value="inactive">
                        Inactive
                    </option>
                </select>

            </div>

            <!-- BUTTONS -->
            <div class="d-grid gap-2">

                <button
                    type="submit"
                    id="submitFormBtn"
                    class="btn btn-dark rounded-3 py-2 fw-bold small"
                >
                    Register Taxonomy Node
                </button>

                <button
                    type="button"
                    id="abortEditBtn"
                    onclick="resetFormState()"
                    class="btn btn-light rounded-3 py-2 text-secondary fw-semibold small d-none"
                >
                    Cancel Modification
                </button>

            </div>

        </form>

    </div>

</div>

            <!-- RIGHT PANEL: Live Active Channel Directory Map -->
            <div class="col-xl-8">
                <div class="bg-white border rounded-4 shadow-sm p-4">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
                        <h5 class="fw-bold text-dark m-0" style="font-family: 'Georgia', serif;">Active Channel Manifest</h5>
                        <span class="badge bg-light text-dark border font-monospace px-2.5 py-1.5 small" id="globalCounterLabel">3 Root Node Branches</span>
                    </div>

                    <!-- DIRECTORY LIST STACK CONTAINER -->
                    <div class="d-flex flex-column gap-3" id="categoryDirectoryCanvas">
                        
                        <?php
$categories = $admin->getCategory();
?>

<?php foreach($categories['data'] ?? [] as $cat): ?>

<div
    class="card category-item-card bg-white rounded-3 p-3 border"
    id="node-row-<?= (int)$cat['id'] ?>"

    data-name="<?= htmlspecialchars($cat['name']) ?>"
    data-slug="<?= htmlspecialchars($cat['slug']) ?>"
    data-color="<?= htmlspecialchars($cat['icon']) ?>"
>
    <div class="row g-3 align-items-center">

        <div class="col col-md-5">
            <div class="d-flex align-items-center gap-2 mb-1">

                <span class="color-preview-pill bg-<?= htmlspecialchars($cat['icon']) ?>"></span>

                <h6 class="fw-bold text-dark m-0 node-title-txt">
                    <?= htmlspecialchars($cat['name']) ?>
                </h6>

            </div>

            <span class="font-monospace text-muted small">
                slug: /c/
                <span class="node-slug-txt">
                    <?= htmlspecialchars($cat['slug']) ?>
                </span>
            </span>
        </div>

        <div class="col-6 col-md-3">
            <span class="fw-bold text-dark small">
                <?= htmlspecialchars($cat['status']) ?>
            </span>
        </div>

        <div class="col-6 col-md-4 text-end">

            <div class="btn-group btn-group-sm">

                <button
                    type="button"
                    onclick="initializeEditWorkflow(<?= (int)$cat['id'] ?>)"
                    class="btn btn-light border"
                >
                    <i class="bi bi-pencil"></i>
                </button>

                <button
                    type="button"
                    onclick="promptDestructivePurge(<?= (int)$cat['id'] ?>)"
                    class="btn btn-light border text-danger"
                >
                    <i class="bi bi-trash3"></i>
                </button>

            </div>

        </div>

    </div>
</div>

<?php endforeach; ?>

                        <!-- INDEX CARD ROW 2 -->
                        <div class="card category-item-card bg-white rounded-3 p-3 border" id="node-row-202" data-name="World News" data-slug="world-news" data-color="dark">
                            <div class="row g-3 align-items-center">
                                <div class="col col-md-5">
                                    <div class="d-flex align-items-center gap-2 mb-1">
                                        <span class="color-preview-pill bg-dark"></span>
                                        <h6 class="fw-bold text-dark m-0 node-title-txt">World News</h6>
                                    </div>
                                    <span class="font-monospace text-muted small d-block" style="font-size:0.75rem">slug: /c/<span class="node-slug-txt">world-news</span></span>
                                </div>
                                <div class="col-6 col-md-3">
                                    <span class="text-muted d-block small mb-0.5" style="font-size:0.75rem">Article Indexes</span>
                                    <span class="fw-bold text-dark small"><i class="bi bi-journal-text text-secondary me-1"></i> 418 Posts</span>
                                </div>
                                <div class="col-6 col-md-4 text-end">
                                    <div class="btn-group btn-group-sm shadow-sm rounded-2">
                                        <a href="category.html?slug=world-news" class="btn btn-white bg-white border text-dark"><i class="bi bi-link-45deg"></i></a>
                                        <button type="button" onclick="initializeEditWorkflow(202)" class="btn btn-white bg-white border text-dark"><i class="bi bi-pencil"></i></button>
                                        <button type="button" onclick="promptDestructivePurge(202)" class="btn btn-white bg-white border text-danger"><i class="bi bi-trash3"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- INDEX CARD ROW 3 -->
                        <div class="card category-item-card bg-white rounded-3 p-3 border" id="node-row-203" data-name="Markets" data-slug="markets" data-color="warning">
                            <div class="row g-3 align-items-center">
                                <div class="col col-md-5">
                                    <div class="d-flex align-items-center gap-2 mb-1">
                                        <span class="color-preview-pill bg-warning"></span>
                                        <h6 class="fw-bold text-dark m-0 node-title-txt">Markets</h6>
                                    </div>
                                    <span class="font-monospace text-muted small d-block" style="font-size:0.75rem">slug: /c/<span class="node-slug-txt">markets</span></span>
                                </div>
                                <div class="col-6 col-md-3">
                                    <span class="text-muted d-block small mb-0.5" style="font-size:0.75rem">Article Indexes</span>
                                    <span class="fw-bold text-dark small"><i class="bi bi-journal-text text-secondary me-1"></i> 280 Posts</span>
                                </div>
                                <div class="col-6 col-md-4 text-end">
                                    <div class="btn-group btn-group-sm shadow-sm rounded-2">
                                        <a href="category.html?slug=markets" class="btn btn-white bg-white border text-dark"><i class="bi bi-link-45deg"></i></a>
                                        <button type="button" onclick="initializeEditWorkflow(203)" class="btn btn-white bg-white border text-dark"><i class="bi bi-pencil"></i></button>
                                        <button type="button" onclick="promptDestructivePurge(203)" class="btn btn-white bg-white border text-danger"><i class="bi bi-trash3"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- TAXONOMICAL PURGE OVERLAY CONFIRMATION MODAL ELEMENTS -->
    <div class="modal fade" id="categoryPurgeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
            <div class="modal-content border-0 rounded-4 shadow">
                <div class="modal-body p-4 text-center">
                    <div class="text-danger mb-3"><i class="bi bi-folder-x display-5"></i></div>
                    <h5 class="fw-bold text-dark mb-2">Unlink Channel Branch?</h5>
                    <p class="text-muted small mb-4">Are you sure you want to completely erase <strong class="text-dark" id="targetPurgeLabel">this category</strong>? Linked articles will be un-categorized instantly.</p>
                    <div class="d-grid gap-2">
                        <button type="button" id="executePurgeBtn" class="btn btn-danger rounded-3 py-2 fw-bold small">Confirm Taxonomy Deletion</button>
                        <button type="button" class="btn btn-light rounded-3 py-2 text-secondary fw-semibold small" data-bs-dismiss="modal">Keep Channel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let targetedNodeIdForDeletion = null;
        let bsPurgeModalWrapper = null;

        document.addEventListener("DOMContentLoaded", function() {
            bsPurgeModalWrapper = new bootstrap.Modal(document.getElementById('categoryPurgeModal'));
            
            // Auto-slugifier generator logic binding helper
            document.getElementById('categoryName').addEventListener('input', function() {
                if(!document.getElementById('categoryStateId').value) { // Auto-fill only for new records
                    document.getElementById('categorySlug').value = this.value
                        .toLowerCase()
                        .replace(/[^a-z0-9\s-]/g, '')
                        .replace(/\s+/g, '-');
                }
            });
        });

        // 1. OPERATION INITIALIZATION: Map Row Data Into Left Side Form for Edits
        function initializeEditWorkflow(nodeId) {
            const targetRow = document.getElementById(`node-row-${nodeId}`);
            
            const existingName = targetRow.getAttribute('data-name');
            const existingSlug = targetRow.getAttribute('data-slug');
            const existingColor = targetRow.getAttribute('data-color');

            // Populate form elements fields instantly
            document.getElementById('categoryStateId').value = nodeId;
            document.getElementById('categoryName').value = existingName;
            document.getElementById('categorySlug').value = existingSlug;
            document.getElementById('categoryColor').value = existingColor;

            // Transform Form Context Headers visually
            document.getElementById('formPanelHeader').innerText = "Modify Category Properties";
            document.getElementById('submitFormBtn').innerText = "Update Taxonomy Properties";
            document.getElementById('submitFormBtn').className = "btn btn-danger rounded-3 py-2 fw-bold small";
            document.getElementById('abortEditBtn').classList.remove('d-none');
        }

        // 2. OPERATION RESET: Revert Left Side Column to Default Clean Input States
        function resetFormState() {
            document.getElementById('categoryStateId').value = "";
            document.getElementById('categoryManagementForm').reset();
            
            document.getElementById('formPanelHeader').innerText = "Create New Category";
            document.getElementById('submitFormBtn').innerText = "Register Taxonomy Node";
            document.getElementById('submitFormBtn').className = "btn btn-dark rounded-3 py-2 fw-bold small";
            document.getElementById('abortEditBtn').classList.add('d-none');
        }

        // 3. DESTRUCTIVE ACTION INTERCEPT: Trigger Purge Overlay Context
        function promptDestructivePurge(nodeId) {
            targetedNodeIdForDeletion = nodeId;
            const targetRow = document.getElementById(`node-row-${nodeId}`);
            const nameLabel = targetRow.getAttribute('data-name');
            
            document.getElementById('targetPurgeLabel').innerText = `"${nameLabel}"`;
            bsPurgeModalWrapper.show();
        }

        // 4. TRANSACTION DEMUX HANDLER: Handle Submit routing pipelines
        document.getElementById('categoryManagementForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const activeId = document.getElementById('categoryStateId').value;

            if(activeId) {
                alert(`Category target ID ${activeId} modified locally within presentation model view frames.`);
            } else {
                alert("New unique taxonomical branch cataloged onto server registers successfully.");
            }
            resetFormState();
        });

        // Execution path confirmation handler link
        document.getElementById('executePurgeBtn').addEventListener('click', function() {
            if(targetedNodeIdForDeletion) {
                alert(`Taxonomy Node array pointer ${targetedNodeIdForDeletion} wiped securely out of routing matrices.`);
                bsPurgeModalWrapper.hide();
                targetedNodeIdForDeletion = null;
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>