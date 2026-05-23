<?php

$page = (int)($_GET['page'] ?? 1);

if($page < 1){
    $page = 1;
}

$limit = 10;

$offset = ($page - 1) * $limit;

$search = trim($_GET['search'] ?? '');
$category = trim($_GET['category'] ?? '');
$status = trim($_GET['status'] ?? '');

$blogpost = $admin->get_all_post_from_user([
    'id'       => $_SESSION['id'] ?? 0,
    'uid'      => $_SESSION['uid'] ?? '',
    'limit'    => $limit,
    'offset'   => $offset,
    'search'   => $search,
    'category' => $category,
    'status'   => $status
]);

?>
<?php include __DIR__."/compo/header.php"; ?>
    <?php include __DIR__."/compo/sidebar.php"; ?>

    <!-- 3. MAIN DASHBOARD CONTENT AREA OVERVIEW -->
<style>
        .form-control:focus, .form-select:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.25px rgba(220, 53, 69, 0.25);
        }
        .article-card-row {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .article-card-row:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(0,0,0,0.04) !important;
        }
        .thumbnail-box {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 6px;
        }
    </style>

    <main class="main-content-offset p-4 p-md-5">
        <!-- HEADER ROW: Global Status Actions -->
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
            <div>
                <h1 class="h3 fw-bold text-dark m-0" style="font-family: 'Georgia', serif;">Manage Articles</h1>
                <p class="text-muted small mb-0">Review processing state channels, run quick content updates, or adjust catalog nodes.</p>
            </div>
            <div>
                <a href="/member/create" class="btn btn-danger rounded-3 px-3 py-2 fw-bold shadow-sm small">
                    <i class="bi bi-plus-lg me-2"></i> Compose New Entry
                </a>
            </div>
        </div>

        <!-- SEARCH ENGINE & FILTER TOOLBAR MATRIX -->
        <form method="GET" class="bg-white border rounded-4 shadow-sm p-3 mb-4">

    <div class="row g-3 align-items-center">

        <!-- SEARCH -->
        <div class="col-12 col-md-4">
            <div class="input-group input-group-sm">

                <span class="input-group-text bg-light border-end-0 text-muted">
                    <i class="bi bi-search"></i>
                </span>

                <input
                    type="text"
                    name="search"
                    class="form-control border-start-0 py-2"
                    placeholder="Search title or tags..."
                    value="<?= htmlspecialchars($search) ?>"
                >
            </div>
        </div>



        <!-- CATEGORY -->
        <div class="col-6 col-md-3">

            <select
                name="category"
                class="form-select form-select-sm py-2 rounded-2"
            >

                <option value="">All Channels</option>

                <?php foreach($blogpost['category'] ?? [] as $cat): ?>

                    <option
                        value="<?= htmlspecialchars($cat['slug']) ?>"

                        <?= $category === $cat['slug']
                            ? 'selected'
                            : ''
                        ?>
                    >
                        <?= htmlspecialchars($cat['name']) ?>
                    </option>

                <?php endforeach; ?>

            </select>
        </div>



        <!-- STATUS -->
        <div class="col-6 col-md-3">

            <select
                name="status"
                class="form-select form-select-sm py-2 rounded-2"
            >

                <option value="">All Status</option>

                <option
                    value="published"

                    <?= $status === 'published'
                        ? 'selected'
                        : ''
                    ?>
                >
                    Published
                </option>

                <option
                    value="draft"

                    <?= $status === 'draft'
                        ? 'selected'
                        : ''
                    ?>
                >
                    Draft
                </option>

            </select>
        </div>



        <!-- BUTTON -->
        <div class="col-12 col-md-2 d-flex gap-2">

            <button
                type="submit"
                class="btn btn-danger btn-sm w-100"
            >
                Filter
            </button>

            <a
                href="/member/post"
                class="btn btn-light btn-sm w-100"
            >
                Reset
            </a>

        </div>

    </div>

</form>

        <!-- CORE LIST MANIFEST CANVAS STACK -->
        <div class="d-flex flex-column gap-3" id="editorialCatalogContainer">
            
            <!-- ARTICLE CARD ITEM ROW 1 -->
            <?php foreach($blogpost['blogs'] ?? [] as $blog): ?>
                <div
    class="card article-card-row bg-white border rounded-4 p-3 shadow-sm"
    data-blog-id="<?= (int)$blog['id'] ?>"
>
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <img src="<?= htmlspecialchars($blog['image']) ?>" class="thumbnail-box">
                        </div>
                        <div class="col col-md-6 overflow-hidden">
                            <div class="d-flex flex-wrap align-items-center gap-2 mb-1">
                                <span class="badge bg-danger bg-opacity-10 text-danger">
                                    <?= htmlspecialchars( $blog['category_name'] ) ?>
                                </span>
                                <?php if($blog['status'] === 'published'): ?>
                                    <span class="badge bg-success"> LIVE </span>
                                <?php else: ?>
                                    <span class="badge bg-secondary"> DRAFT </span>
                                <?php endif; ?>
                            </div>
                            <h5 class="h6 fw-bold text-dark text-truncate mb-1"><?= htmlspecialchars($blog['title']) ?></h5>
                            <div class="text-muted small text-truncate">
                                <?= htmlspecialchars($blog['description']) ?>
                            </div>
                        </div>
                        <div class="col-6 col-md-2 text-md-center">
                            <span class="text-muted d-block small">Total Views</span>
                            <span class="fw-bold text-dark small">
                                <i class="bi bi-eye me-1"></i> <?= number_format($blog['views']) ?>
                            </span>
                        </div>
                        <div class="col-6 col-md-3 text-end">
                            <div class="btn-group btn-group-sm">
                                <a href="/<?= htmlspecialchars($blog['slug']) ?>" target="_blank"class="btn btn-light border"><i class="bi bi-eye"></i></a>
                                <a href="/member/create?edit=<?= htmlspecialchars($blog['slug']) ?>" class="btn btn-light border"><i class="bi bi-pencil"></i></a>
                                <button type="button" onclick="confirmDeleteAction(<?= (int)$blog['id'] ?>,'<?= htmlspecialchars(addslashes($blog['title'])) ?>')" class="btn btn-light border text-danger"><i class="bi bi-trash3"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php
                $pagination = $blogpost['pagination'] ?? [];
                $total_pages = $pagination['total_pages'] ?? 1;
                $current_page = $pagination['current_page'] ?? 1;
            ?>

            <?php if($total_pages > 1): ?>
                <div class="d-flex justify-content-center mt-4">
                    <nav>
                        <ul class="pagination">
                            <!-- PREVIOUS -->
                            <li class="page-item <?= $current_page <= 1 ? 'disabled' : '' ?>">
                                <a class="page-link" href="?page=<?= $current_page - 1 ?>&search=<?= urlencode($search) ?>&category=<?= urlencode($category) ?>&status=<?= urlencode($status) ?>">Previous</a></li>
                                <!-- PAGE NUMBERS -->
                                <?php for($i = 1; $i <= $total_pages; $i++): ?>
                                    <li class="page-item <?= $i == $current_page ? 'active' : '' ?>"><a class="page-link" href="?page=<?= $i ?>&search=<?= urlencode($search) ?>&category=<?= urlencode($category) ?>&status=<?= urlencode($status) ?>"><?= $i ?></a></li>
                                <?php endfor; ?>
                            <!-- NEXT -->
                            <li class="page-item <?= $current_page >= $total_pages ? 'disabled' : '' ?>"><a class="page-link" href="?page=<?= $current_page + 1 ?>&search=<?= urlencode($search) ?>&category=<?= urlencode($category) ?>&status=<?= urlencode($status) ?>">Next</a></li>
                        </ul>
                    </nav>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <!-- SYSTEM REMOVAL CONFIRMATION MODAL OVERLAY WRAPPER ELEMENT -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
            <div class="modal-content border-0 rounded-4 shadow">
                <div class="modal-body p-4 text-center">
                    <div class="text-danger mb-3"><i class="bi bi-exclamation-octagon display-5"></i></div>
                    <h5 class="fw-bold text-dark mb-2">Purge Content Record?</h5>
                    <p class="text-muted small mb-4">Are you absolutely sure you want to delete <strong class="text-dark" id="targetDeleteTitleName">this article</strong>? This operation completely un-indexes the data from secondary cache nodes and cannot be reversed.</p>
                    <div class="d-grid gap-2">
                        <button type="button" id="executePurgeBtn" class="btn btn-danger rounded-3 py-2 fw-bold small">Confirm Purge Deletion</button>
                        <button type="button" class="btn btn-light rounded-3 py-2 text-secondary fw-semibold small" data-bs-dismiss="modal">Abort Cancellation</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPT ENGINE: Client-Side Live Filters and Event Handlers -->
     <script>

let selectedRecordIdToDelete = null;
let bsDeleteModalInstance = null;

document.addEventListener('DOMContentLoaded', () => {

    bsDeleteModalInstance =
        new bootstrap.Modal(
            document.getElementById(
                'deleteConfirmationModal'
            )
        );
});



/**
 * OPEN DELETE MODAL
 */
function confirmDeleteAction(
    recordId,
    articleTitle
){

    selectedRecordIdToDelete = recordId;

    document.getElementById(
        'targetDeleteTitleName'
    ).innerText = `"${articleTitle}"`;

    bsDeleteModalInstance.show();
}



/**
 * DELETE BLOG
 */
document.getElementById(
    'executePurgeBtn'
).addEventListener(
    'click',
    async function(){

        if(!selectedRecordIdToDelete){
            return;
        }

        const btn = this;

        btn.disabled = true;

        btn.innerHTML = `
            <span class="spinner-border spinner-border-sm me-2"></span>
            Deleting...
        `;

        try{

            const req = await fetch(
                '/api/index.php',
                {
                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json'
                    },

                    body: JSON.stringify({

                        action: 'blog/delete',

                        id: '<?= $_SESSION['id'] ?? 0 ?>',

                        uid: '<?= $_SESSION['uid'] ?? '' ?>',

                        blog_id: selectedRecordIdToDelete
                    })
                }
            );

            const res = await req.json();



            if(res.status){

                // Remove card
                const card = document.querySelector(
                    `[data-blog-id="${selectedRecordIdToDelete}"]`
                );

                if(card){

                    card.style.transition =
                        'all .3s ease';

                    card.style.opacity = '0';

                    card.style.transform =
                        'translateX(20px)';

                    setTimeout(() => {

                        card.remove();

                    }, 300);
                }



                // Close modal
                bsDeleteModalInstance.hide();

                // Reset ID
                selectedRecordIdToDelete = null;

            }else{

                alert(
                    res.message ||
                    'Delete failed'
                );
            }

        }catch(err){

            console.error(err);

            alert(
                'Network error occurred'
            );

        }finally{

            btn.disabled = false;

            btn.innerHTML =
                'Confirm Purge Deletion';
        }
    }
);

</script>
    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>