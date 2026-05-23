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
    data-description="<?= htmlspecialchars($cat['description']) ?>"
    data-icon="<?= htmlspecialchars($cat['icon']) ?>"
    data-image="<?= htmlspecialchars($cat['image']) ?>"
    data-status="<?= htmlspecialchars($cat['status']) ?>"
>
    <div class="row g-3 align-items-center">

        <div class="col col-md-5">
            <div class="d-flex align-items-center gap-2 mb-1">

                <span class="color-preview-pill bi <?= htmlspecialchars($cat['icon']) ?>"></span>

                <h6 class="fw-bold text-dark m-0 node-title-txt">
                    <?= htmlspecialchars($cat['name']) ?>
                </h6>

            </div>

            <span class="font-monospace ms-4 text-muted small">
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



document.addEventListener("DOMContentLoaded", function () {

    bsPurgeModalWrapper =
        new bootstrap.Modal(
            document.getElementById('categoryPurgeModal')
        );



    // AUTO SLUG
    document
    .getElementById('categoryName')
    .addEventListener('input', function () {

        if (
            !document.getElementById('categoryStateId').value
        ) {

            document.getElementById('categorySlug').value =
                this.value
                    .toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '')
                    .replace(/\s+/g, '-');
        }
    });
});



/*
|--------------------------------------------------------------------------
| EDIT CATEGORY
|--------------------------------------------------------------------------
*/
function initializeEditWorkflow(nodeId) {

    const targetRow =
        document.getElementById(`node-row-${nodeId}`);

    document.getElementById('categoryStateId').value =
        nodeId;

    document.getElementById('categoryName').value =
        targetRow.dataset.name;

    document.getElementById('categorySlug').value =
        targetRow.dataset.slug;

    document.getElementById('categoryDescription').value =
        targetRow.dataset.description;

    document.getElementById('categoryIcon').value =
        targetRow.dataset.icon;

    document.getElementById('categoryImage').value =
        targetRow.dataset.image;

    document.getElementById('categoryStatus').value =
        targetRow.dataset.status;



    document.getElementById('formPanelHeader').innerText =
        "Modify Category Properties";

    document.getElementById('submitFormBtn').innerText =
        "Update Taxonomy Properties";

    document.getElementById('submitFormBtn').className =
        "btn btn-danger rounded-3 py-2 fw-bold small";

    document
        .getElementById('abortEditBtn')
        .classList.remove('d-none');



    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}



/*
|--------------------------------------------------------------------------
| RESET FORM
|--------------------------------------------------------------------------
*/
function resetFormState() {

    document.getElementById('categoryStateId').value =
        "";

    document
        .getElementById('categoryManagementForm')
        .reset();

    document.getElementById('formPanelHeader').innerText =
        "Create New Category";

    document.getElementById('submitFormBtn').innerText =
        "Register Taxonomy Node";

    document.getElementById('submitFormBtn').className =
        "btn btn-dark rounded-3 py-2 fw-bold small";

    document
        .getElementById('abortEditBtn')
        .classList.add('d-none');
}



/*
|--------------------------------------------------------------------------
| DELETE MODAL
|--------------------------------------------------------------------------
*/
function promptDestructivePurge(nodeId) {

    targetedNodeIdForDeletion = nodeId;

    const targetRow =
        document.getElementById(`node-row-${nodeId}`);

    document.getElementById('targetPurgeLabel').innerText =
        `"${targetRow.dataset.name}"`;

    bsPurgeModalWrapper.show();
}



/*
|--------------------------------------------------------------------------
| CREATE / UPDATE CATEGORY
|--------------------------------------------------------------------------
*/
document
.getElementById('categoryManagementForm')
.addEventListener('submit', function (e) {

    e.preventDefault();

    const categoryId =
        document.getElementById('categoryStateId').value;

    fetch('/api/index.php', {

        method: 'POST',

        headers: {
            'Content-Type': 'application/json'
        },

        body: JSON.stringify({

            action: categoryId
                ? 'category/update'
                : 'category/create',

            id: '<?= $_SESSION['id'] ?? 0 ?>',

            uid: '<?= $_SESSION['uid'] ?? '' ?>',

            category_id: categoryId,

            name:
                document.getElementById('categoryName').value,

            slug:
                document.getElementById('categorySlug').value,

            description:
                document.getElementById('categoryDescription').value,

            icon:
                document.getElementById('categoryIcon').value,

            image:
                document.getElementById('categoryImage').value,

            status:
                document.getElementById('categoryStatus').value
        })
    })

    .then(res => res.json())

    .then(res => {

        if (res.status) {

            location.reload();

        } else {

            alert(
                res.message ||
                'Something went wrong'
            );
        }
    })

    .catch(err => {

        console.error(err);

        alert('Network error');
    });
});



/*
|--------------------------------------------------------------------------
| DELETE CATEGORY
|--------------------------------------------------------------------------
*/
document
.getElementById('executePurgeBtn')
.addEventListener('click', function () {

    if (!targetedNodeIdForDeletion) {
        return;
    }

    fetch('/api/index.php', {

        method: 'POST',

        headers: {
            'Content-Type': 'application/json'
        },

        body: JSON.stringify({

            action: 'category/delete',

            id: '<?= $_SESSION['id'] ?? 0 ?>',

            uid: '<?= $_SESSION['uid'] ?? '' ?>',

            category_id:
                targetedNodeIdForDeletion
        })
    })

    .then(res => res.json())

    .then(res => {

        if (res.status) {

            const row =
                document.getElementById(
                    `node-row-${targetedNodeIdForDeletion}`
                );

            if (row) {
                row.remove();
            }

            bsPurgeModalWrapper.hide();

            targetedNodeIdForDeletion = null;

        } else {

            alert(
                res.message ||
                'Delete failed'
            );
        }
    })

    .catch(err => {

        console.error(err);

        alert('Network error');
    });
});

</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>