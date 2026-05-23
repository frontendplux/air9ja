<?php
 $dashbord=$admin->dashboard(['id'=>$_SESSION['id'], 'uid' => $_SESSION['uid']]);
 include __DIR__."/compo/header.php"; ?>
<?php include __DIR__."/compo/sidebar.php"; 
?>
<!-- 3. MAIN DASHBOARD CONTENT AREA OVERVIEW -->
<main class="main-content-offset p-4 p-md-5">
        
        <!-- Header Controls Row: Editorial Quick Initiation -->
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-5">
            <div>
                <h1 class="h3 fw-bold text-dark m-0" style="font-family: 'Georgia', serif;">Editorial Creator Engine</h1>
                <p class="text-muted small mb-0">Draft, optimize, and schedule publication packages natively to media network nodes.</p>
            </div>
            <div class="d-flex gap-2">
                <a href="/member/create" class="btn btn-danger rounded-3 px-3 py-2 fw-bold text-nowrap shadow-sm small">
                    <i class="bi bi-plus-lg me-2"></i> Compose New Article
                </a>
            </div>
        </div>

        <!-- Metric Scorecard Widgets: Composition Phase Pipelines -->
        <div class="row g-4 mb-5">
            <!-- Phase Card 1 -->
             <?php foreach([
                ['bi-pencil-square','bg-primary bg-opacity-10 text-primary', 'Stories & Articles',htmlspecialchars($dashbord['total_blog'])],
                ['bi-eye','bg-warning bg-opacity-10 text-warning','Total viewers',htmlspecialchars($dashbord['my_total_views'])],
                ['bi-piggy-bank', 'bg-success bg-opacity-10 text-success', 'Total Assets', htmlspecialchars($dashbord['total_assets'])],
                ['bi-coin', 'bg-dark bg-opacity-10 text-dark', 'Total Coin', htmlspecialchars($dashbord['user']['coin'])]
                ] as $menuUP): ?>
            <div class="col-sm-6 col-xl-3">
                <div class="card card-stat bg-white p-4 h-100">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="<?= htmlspecialchars($menuUP[1]) ?> rounded-3 p-2.5"><i class="bi <?= htmlspecialchars($menuUP[0]) ?> fs-5"></i></div>
                        <!-- <span class="badge bg-primary text-primary bg-opacity-10 font-monospace rounded-pill px-2.5 py-1 small">WIP</span> -->
                    </div>
                    <span class="text-muted small text-uppercase fw-semibold d-block"><?= htmlspecialchars($menuUP[2]) ?></span>
                    <span class="h2 fw-bold text-dark m-0 mt-1"><?= htmlspecialchars($menuUP['3']) ?></span>
                </div>
            </div>
            <?php endforeach ?>
        </div>

        <!-- Bottom Layout Analytics Split Row Matrix -->
        <div class="row g-4">
            <!-- Left Side Canvas: Recent Articles & Editorial Status Manifest -->
            <div class="col-xl-8">
                <div class="bg-white rounded-4 border shadow-sm p-4 h-100">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
                        <h5 class="fw-bold text-dark m-0 text-capitalize" style="font-family: 'Georgia', serif;">Recent story / article</h5>
                        <div class="d-flex gap-2">
                            <input type="text" class="form-control form-control-sm rounded-2" placeholder="Filter articles..." style="max-width: 180px;">
                            <button class="btn btn-sm btn-outline-secondary rounded-2"><i class="bi bi-funnel"></i></button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light text-muted small text-uppercase">
                                <tr>
                                    <th class="border-0 px-3">Title & Summary Snippet</th>
                                    <th class="border-0">Category</th>
                                    <th class="border-0">views</th>
                                    <th class="border-0 text-end px-3">Actions</th>
                                </tr>
                            </thead>
                                <?php foreach($dashbord['data'] as $recentBlog): ?>
                                <tr>
                                    <td class="px-3">
                                        <div class="fw-bold text-dark mb-0.5"><?= htmlspecialchars($recentBlog['title']) ?></div>
                                        <span class="text-muted d-block text-truncate" style="max-width: 280px;"><?= htmlspecialchars($recentBlog['description']) ?></span>
                                    </td>
                                    <td><span class="badge bg-danger bg-opacity-10 text-danger px-2.5 py-1"><?= htmlspecialchars($recentBlog['cat_name']) ?></span></td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="fw-bold text-success"><?= htmlspecialchars($recentBlog['views']) ?></span>
                                        </div>
                                    </td>
                                    <td class="text-end px-3">
                                        <div class="btn-group btn-group-sm shadow-sm rounded-2">
                                            <a href="/member/create?edit=<?= htmlspecialchars($recentBlog['slug']) ?>" class="btn btn-white bg-white border text-dark" title="Edit Content"><i class="bi bi-pencil"></i></a>
                                            <a href="/<?= htmlspecialchars($recentBlog['slug']) ?>" target="_blank" class="btn btn-white bg-white border text-dark" title="Preview Live"><i class="bi bi-eye"></i></a>
                                            <button onclick="delete(<?= htmlspecialchars($recentBlog['slug']) ?>)" type="button" class="btn btn-white bg-white border text-danger" title="Unpublish"><i class="bi bi-archive"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Right Side Canvas: Operational Pre-Flight Optimization Audit Logs -->
            <div class="col-xl-4">
                <div class="bg-white rounded-4 border shadow-sm p-4 h-100">
                    <h5 class="fw-bold text-dark mb-4" style="font-family: 'Georgia', serif;">Recent Assets</h5>
                    <div class="d-flex flex-column gap-3">
                         <?php foreach($dashbord['recent_assets'] as $recentAsset): ?>
                        <!-- Checklist Item 1 -->
                        <div class="d-flex gap-3 align-items-start">
                            <div class="p-1.5 rounded-circle bg-success text-success mt-1">
                                <i class="bi bi-check2-circle d-block" style="font-size: 0.8rem;"></i>
                            </div>
                            <div class="w-100">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="m-0 fw-bold text-dark" style="font-size: 0.85rem;"><?= htmlspecialchars($recentAsset['asset_name']) ?></h6>
                                    <span class="badge bg-success bg-opacity-10 text-success font-monospace plain-badge" style="font-size:0.65rem"><?= htmlspecialchars($recentAsset['currency']) ?></span>
                                </div>
                                <p class="text-muted small m-0 mt-1"><?= htmlspecialchars($recentAsset['description']) ?></p>
                                <?= htmlspecialchars($recentAsset['amount']) ?>
                            </div>
                        </div>
                        <hr class="my-1 opacity-10">
                       <?php endforeach ?>

                    </div>
                </div>
            </div>

        </div>

    </main>
    <!-- Bootstrap 5 JS Bundle with Popper -->
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
       async function deletePost(){

       }
    </script>
</body>
</html>