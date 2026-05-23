<?php
  $aside=$main->fetch_unique_blog_per_category(['offset'=>0,'limit'=>3]);
?>

   <div class="bg-white p-4 rounded-4 shadow-sm border-0 h-100">
        <h4 class="fw-bold mb-4" style="font-family: 'Georgia', serif;">Editor's Choices</h4>
        
        <div class="d-flex flex-column gap-4">
            <!-- Quick Post 1 -->
            <?php foreach($aside['data'] as $asided): ?>
            <div>
                <a href="/<?= $asided['cat_slug'] ?>" class="badge bg-light text-dark text-decoration-none mb-2 px-2 py-1 border text-uppercase" style="font-size: 0.7rem;"><?= htmlspecialchars($asided['cat_name']) ?></a>
                <h6 class="fw-bold mb-2">
                    <a href="/<?= $asided['slug'] ?>" class="text-dark text-decoration-none hover-danger"><?= htmlspecialchars($asided['title']) ?></a>
                </h6>
                <div class="d-flex gap-2 small text-muted">
                    <span>By <?= $company_info['name'] ?></span>
                    <span>•</span>
                    <span><?= timeAgo($asided['created_at']) ?></span>
                </div>
            </div>

            <hr class="my-0 opacity-10">
            <?php endforeach; ?>
            
            <!-- Newsletter Ad Widget -->
            <div class="bg-danger bg-gradient text-white p-4 rounded-3 mt-2 text-center">
                <i class="bi bi-envelope-open-fill fs-1 mb-2"></i>
                <h5 class="fw-bold">Stay Updated</h5>
                <p class="small text-white-50 mb-3">Get elite editorial analysis sent straight to your inbox.</p>
                <div class="input-group input-group-sm">
                    <input type="email" class="form-content form-control border-0 px-3" placeholder="Enter your email" aria-label="Email">
                    <button class="btn btn-dark fw-bold px-3" type="button">Join</button>
                </div>
            </div>

        </div>
    </div>