<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - <?= $company_info['name'] ?></title>
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

      <?php include __DIR__."/compo/sidebar.php"; ?>

    <!-- 3. MAIN DASHBOARD CONTENT AREA OVERVIEW -->
<!-- Include premium third-party Quill rich text editor core themes -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        .form-control:focus, .form-select:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.25px rgba(220, 53, 69, 0.25);
        }
        /* Custom layout sizing tweaks for modern editor canvas */
        .ql-container {
            border-bottom-left-radius: 0.5rem !important;
            border-bottom-right-radius: 0.5rem !important;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 1rem;
        }
        .ql-toolbar {
            border-top-left-radius: 0.5rem !important;
            border-top-right-radius: 0.5rem !important;
            background-color: #f8f9fa;
        }
        .image-drop-zone {
            border: 2px dashed #dee2e6;
            transition: all 0.2s ease;
            background-color: #f8f9fa;
        }
        .image-drop-zone:hover {
            border-color: #dc3545;
            background-color: #fff;
        }
        /* Premium custom styling framework properties for switch animations */
        .form-switch .form-check-input:checked {
            background-color: #198754;
            border-color: #198754;
        }
    </style>

    <main class="main-content-offset p-4 p-md-5">
        
        <!-- Header Controls Row: Back Router & Save Matrix -->
        <form id="editorialCompositionForm" autocomplete="off">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-5">
                <div>
                    <a href="dashboard.html" class="text-decoration-none text-muted small fw-bold d-inline-flex align-items-center mb-2">
                        <i class="bi bi-arrow-left me-1"></i> Return to Dashboard Catalog
                    </a>
                    <h1 class="h3 fw-bold text-dark m-0" style="font-family: 'Georgia', serif;">Compose New Entry</h1>
                </div>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-outline-dark rounded-3 px-3 py-2 fw-semibold small">
                        Save Structural Draft
                    </button>
                    <button type="submit" class="btn btn-danger rounded-3 px-4 py-2 fw-bold shadow-sm small">
                        Execute Processing Deployment
                    </button>
                </div>
            </div>

            <!-- Double-Column Composition Engine Framework Layout -->
            <div class="row g-4">
                
                <!-- LEFT SIDE CANVAS: Core Body Copy Content Elements -->
                <div class="col-xl-8">
                    <div class="bg-white rounded-4 border shadow-sm p-4 d-flex flex-column gap-4">
                        
                        <!-- Core Input Item 1: Post Structural Title -->
                        <div>
                            <label for="postTitle" class="form-label small fw-bold text-secondary">Article Title Head</label>
                            <input type="text" class="form-control form-control-lg rounded-3 fs-5" id="postTitle" placeholder="e.g., The Quantum Leap: Reshaping Digital Infrastructure Assets..." required>
                        </div>

                        <!-- Core Input Item 2: Search Engine Short Description Excerpt -->
                        <div>
                            <label for="postExcerpt" class="form-label small fw-bold text-secondary">Summary Excerpt / SEO Meta Description</label>
                            <textarea class="form-control rounded-3 row-3" id="postExcerpt" rows="3" placeholder="Provide a concise 150-character contextual preview window clip for search engines and social card distribution formats..." required></textarea>
                        </div>

                        <!-- Core Input Item 3: Quill WYSIWYG Editor Hook Target Frame -->
                        <div>
                            <label class="form-label small fw-bold text-secondary mb-2">Rich Text Body Canvas</label>
                            <div style="min-height: 380px;" class="d-flex flex-column rounded-3">
                                <div id="quillEditorContainer">
                                    <p>Begin constructing your modern narrative stream architecture here...</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- RIGHT SIDE CANVAS: Categorizations, Uploaders, & Live Switch Actions -->
                <div class="col-xl-4">
                    <div class="d-flex flex-column gap-4">
                        
                        <!-- Panel Canvas Box A: Publishing Schedule Execution Governors -->
                        <div class="bg-white rounded-4 border shadow-sm p-4">
                            <h5 class="fw-bold text-dark mb-4 style-heading" style="font-family: 'Georgia', serif;">Deployment Rules</h5>
                            
                            <!-- State Machine Switch: Online vs Offline Visibility Core Configuration -->
                            <div class="form-check form-switch p-0 d-flex justify-content-between align-items-center mb-4">
                                <div class="pe-3">
                                    <label class="form-check-label fw-bold text-dark d-block mb-0.5" style="cursor: pointer;" id="publishLabel" for="publishToggle">
                                        Post Deployment Live status
                                    </label>
                                    <small id="publishStatusHelp" class="text-muted d-block" style="font-size: 0.75rem;">
                                        State engine registers variable as: <span id="statusBadge" class="badge bg-secondary text-uppercase px-1.5 py-0.5">Offline Draft</span>
                                    </small>
                                </div>
                                <input class="form-check-input m-0 fs-3" type="checkbox" role="switch" id="publishToggle" style="cursor: pointer;">
                            </div>

                            <hr class="my-3 opacity-10">

                            <!-- Category Selection Component Element -->
                            <div class="mb-3">
                                <label for="categorySelection" class="form-label small fw-bold text-secondary">Content Category Map</label>
                                <select class="form-select rounded-3 py-2" id="categorySelection" required>
                                    <option value="" selected disabled>Assign targeted channel node...</option>
                                    <option value="tech">Technology Systems & AI</option>
                                    <option value="world">World News & Treaties</option>
                                    <option value="markets">Financial Stream Analysis</option>
                                    <option value="culture">Culture & Critique</option>
                                </select>
                            </div>

                            <!-- Tags System Input String Pipeline Element -->
                            <div>
                                <label for="tagsInputLine" class="form-label small fw-bold text-secondary">Metatag Index Arrays</label>
                                <input type="text" class="form-control rounded-3 py-2" id="tagsInputLine" placeholder="e.g., computing, infrastructure, policy (comma separated)">
                                <div class="form-text text-muted" style="font-size: 0.7rem;">Separate elements with clear syntax commas.</div>
                            </div>
                        </div>

                        <!-- Panel Canvas Box B: Featured Graphic Asset Uploader Area -->
                        <div class="bg-white rounded-4 border shadow-sm p-4">
                            <h5 class="fw-bold text-dark mb-3" style="font-family: 'Georgia', serif;">Featured Hero Asset</h5>
                            <label class="form-label small fw-bold text-secondary mb-2">Display Graphic Vector</label>
                            
                            <div class="image-drop-zone rounded-3 p-4 text-center cursor-pointer position-relative">
                                <input type="file" id="heroAssetUpload" class="position-absolute top-0 start-0 w-100 h-100 opacity-0" accept="image/*" style="cursor: pointer;">
                                <div id="uploadPreviewWrapper">
                                    <i class="bi bi-cloud-arrow-up text-muted display-6 d-block mb-2"></i>
                                    <span class="small fw-bold text-dark d-block">Drag asset file container here</span>
                                    <span class="text-muted d-block mt-0.5" style="font-size: 0.7rem;">Supports PNG, JPG, or high-performance WebP formats</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </form>

    </main>

    <!-- Third-Party Functional Rich Text Scripts Framework Elements Layer injection -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        // 1. Initialize Modern Quill Text Editor Canvas Wrapper Container 
        const quillInstance = new Quill('#quillEditorContainer', {
            theme: 'snow',
            placeholder: 'Draft compelling structured insights...',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline', 'blockquote'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['link', 'image'],
                    ['clean']
                ]
            }
        });

        // 2. State Controller: Adjust Badges Instantly on Live Toggles
        const toggleBtn = document.getElementById('publishToggle');
        const statusBadge = document.getElementById('statusBadge');

        toggleBtn.addEventListener('change', function() {
            if(this.checked) {
                statusBadge.className = "badge bg-success text-uppercase px-1.5 py-0.5";
                statusBadge.innerText = "Online Production";
            } else {
                statusBadge.className = "badge bg-secondary text-uppercase px-1.5 py-0.5";
                statusBadge.innerText = "Offline Draft";
            }
        });

        // 3. Asset Processing: Hero File Selector Upload Rendering Preview Engine
        const imageUploaderInput = document.getElementById('heroAssetUpload');
        const uploadAreaPreview = document.getElementById('uploadPreviewWrapper');

        imageUploaderInput.addEventListener('change', function(event) {
            const uploadedFile = event.target.files[0];
            if (uploadedFile) {
                const browserReader = new FileReader();
                browserReader.onload = function(e) {
                    uploadAreaPreview.innerHTML = `
                        <img src="${e.target.result}" class="img-fluid rounded-2 mb-2 object-fit-cover" style="max-height: 140px; width: 100%;" alt="Hero Preview">
                        <span class="text-danger small d-block fw-bold"><i class="bi bi-arrow-repeat me-1"></i> Replace File Asset</span>
                    `;
                }
                browserReader.readAsDataURL(uploadedFile);
            }
        });

        // 4. Distribution Intercept: Construct Complex Payload Objects
        document.getElementById('editorialCompositionForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Extract textual content natively out of the Quill editor block structure
            const richBodyMarkup = quillInstance.root.innerHTML;
            
            const editorialPackagePayload = {
                title: document.getElementById('postTitle').value,
                excerpt: document.getElementById('postExcerpt').value,
                bodyHtml: richBodyMarkup,
                isLiveScheduled: toggleBtn.checked,
                assignedCategory: document.getElementById('categorySelection').value,
                tagsArray: document.getElementById('tagsInputLine').value.split(',').map(tag => tag.trim())
            };

            alert("Content package serialization completed successfully! Node state is mapped to: " + (editorialPackagePayload.isLiveScheduled ? "PRODUCTION LIVE" : "LOCAL ARCHIVE DRAFT"));
            console.log("Transmission Manifest Pipeline Core Data Object Details:", editorialPackagePayload);
        });
    </script>
    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>