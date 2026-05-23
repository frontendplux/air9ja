<?php
$readBlog=$checker['data'] ?? [];
$category_related=$main->fetch_blogs_by_category(['slug'=>$readBlog['category'], 'limit' => 3, 'offset' => 0])['data'] ?? [];
$company_info['title']=$readBlog['title'];
$company_info['description']=$readBlog['description'];
$company_info['keywords']=$readBlog['keywords'];
$company_info['image']=$readBlog['image'];

include __DIR__."/component/header.php";
?>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-xl-8">
                
                <!-- Article Header Context -->
                <article>
                    <header class="mb-5">
                        <!-- Category & Reading Time -->
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <a href="/<?= $readBlog['category'] ?>" class="text-danger fw-bold text-decoration-none text-uppercase tracking-wider small"><?= htmlspecialchars($readBlog['cat_name']) ?></a>
                            <span class="text-muted">•</span>
                            <span class="text-muted small"><?= timeAgo($readBlog['created_at']) ?> read</span>
                        </div>
                        
                        <!-- Main Essay Title -->
                        <h1 class="display-5 fw-bold text-dark mb-3" style="font-family: 'Georgia', serif; line-height: 1.2;">
                            <?= htmlspecialchars($readBlog['title']) ?>
                        </h1>
                        
                        <!-- Subtitle / Excerpt -->
                        <p class="lead text-secondary mb-4" style="font-size: 1.25rem;">
                           <?= htmlspecialchars($readBlog['description']) ?>
                        </p>
                        
                        <!-- Author Metadata Block -->
                        <div class="d-flex align-items-center justify-content-between p-3 bg-white border rounded-4 shadow-sm">
                            <div class="d-flex align-items-center gap-3">
                                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=150&q=80" class="rounded-circle object-fit-cover" style="width: 48px; height: 48px;" alt="Author avatar">
                                <div>
                                    <h6 class="mb-0 fw-bold text-dark"><?= htmlspecialchars($company_info['name']) ?></h6>
                                    <span class="text-muted small">Published May 16, 2026</span>
                                </div>
                            </div>
                            <!-- Quick Action Share Elements -->
                            <div class="d-flex gap-2">
                                <button class="btn btn-light btn-sm rounded-circle text-muted" title="Bookmark"><i class="bi bi-bookmark"></i></button>
                                <button class="btn btn-light btn-sm rounded-circle text-muted" title="Share Article"><i class="bi bi-share"></i></button>
                            </div>
                        </div>
                    </header>

                    <!-- Article Hero Image -->
                    <figure class="mb-5 rounded-4 overflow-hidden shadow-sm">
                        <img src="<?= htmlspecialchars($readBlog['image']) ?>" class="w-100 img-fluid object-fit-cover" style="max-height: 450px;" alt="Architectural rendering illustration">
                        <figcaption class="figure-caption p-3 bg-white border-top text-center text-muted small">
                           <?= htmlspecialchars($readBlog['description']) ?>
                        </figcaption>
                    </figure>

                    <!-- Main Prose Body (Optimized Typography Column) -->
                     <style>
                        .firstLetter::first-letter{
                            text-transform: uppercase;
                            float: left; margin-right: 10px; font-weight: bold; font-family: sans-serif; margin-top: -20px; font-size: 60px;
                        }
                     </style>
                    <div class="entry-content firstLetter text-secondary lh-lg fs-5" style="font-family: 'Georgia', serif; color: #2d3748;">
                       
                        <?= htmlspecialchars($readBlog['description']) ?>

                        <!-- Pull Quote Design Block -->
                        <blockquote class="my-5 p-4 border-start border-danger border-4 bg-white rounded-end shadow-sm">
                            <p class="fst-italic text-dark mb-2 fs-4">
                                "The ultimate risk is not that algorithms will build bad environments, but that they will build environments devoid of memory."
                            </p>
                            <cite class="text-muted small fw-bold text-uppercase style-none">— Professor Julian Vance, Spatial Mechanics</cite>
                        </blockquote>


                        <!-- Code block presentation example -->
                        <div class="bg-dark rounded-3 p-3 mb-4 shadow-sm font-monospace text-white-50 small" style="font-family: var(--bs-font-monospace);">
<span class="text-warning">def</span> <span class="text-info">verify_structural_integrity</span>(tensor_matrix):
    <span class="text-muted"># Ensure load distribution matches regional 2026 mandates</span>
    compliance_factor = parse_nodes(tensor_matrix.load_nodes)
    <span class="text-warning">if</span> compliance_factor &lt; <span class="text-danger">0.98</span>:
        <span class="text-warning">raise</span> SafetyException(<span class="text-success">"Node density check failed."</span>)
    <span class="text-warning">return</span> True</div>

                        <h3 class="fw-bold text-dark mt-5 mb-3" style="font-family: sans-serif;">The Erasure of Local Vernacular</h3>
                    </div>

                    <!-- Post Footer Metadata (Tags & Share) -->
                    <footer class="mt-5 pt-4 border-top">
                        <div class="d-flex flex-wrap gap-2 align-items-center mb-4">
                            <span class="text-muted small me-2">Tags:</span>
                            <?php foreach(explode(',', $readBlog['keywords']) as $tags): ?>
                                <a href="/search?s=<?= urlencode(strtolower(str_replace(' ','-',trim($tags)))) ?>" class="btn btn-light btn-sm rounded-pill text-secondary border px-3"><?= htmlspecialchars(trim($tags)) ?></a>
                            <?php endforeach ?>
                        </div>

                        <!-- Mini Author Bio Card Block -->
                        <div class="bg-white p-4 rounded-4 border shadow-sm d-flex flex-column flex-sm-row gap-4 align-items-center">
                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=150&q=80" class="rounded-circle object-fit-cover" style="width: 80px; height: 80px;" alt="Author profile image">
                            <div class="text-center text-sm-start">
                                <h5 class="fw-bold text-dark mb-1">About <?= htmlspecialchars($company_info['name']) ?></h5>
                                <p class="text-muted small mb-0">
                                   <?= htmlspecialchars($company_info['description']) ?>
                                </p>
                            </div>
                        </div>
                    </footer>
                </article>

            </div>
            <div class="col-lg-3 col-xl-4">
                <?php include __DIR__."/component/aside.php"; ?>
            </div>
        </div>
    </div>

    <!-- SECTION 2: INTEGRATED LATEST FEED & AD SPONSORSHIP -->
        <section class="container my-5">
            <?php include __DIR__."/component/ads.php"; ?>
            <!-- Latest Stories Dual Column Blueprint -->
            <div class="row g-4 my-3">
                <div class="">
                    <h4 class="fw-bold mb-4 pb-2 border-bottom" style="font-family: 'Georgia', serif;">Related Post</h4>
                    <div class="row g-4">
                        <?php foreach($category_related as $relatedPost): ?>
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                                <img src="<?= htmlspecialchars($relatedPost['image']) ?>" class="card-img-top object-fit-cover" style="height: 200px;" alt="Science">
                                <div class="card-body p-4">
                                    <a href="/<?= htmlspecialchars($relatedPost['cat_slug']) ?>" class="text-danger text-decoration-none small fw-bold text-uppercase d-block mb-2"><?= htmlspecialchars($relatedPost['cat_name']) ?></a>
                                    <h5 class="fw-bold mb-2"><a href="/<?= htmlspecialchars($relatedPost['slug']) ?>" class="text-dark text-decoration-none stretched-link"><?= htmlspecialchars($relatedPost['title']) ?></a></h5>
                                    <p class="text-muted small"><?= htmlspecialchars($relatedPost['description']) ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </section> 
   <?php include __DIR__."/component/footer.php"; ?>