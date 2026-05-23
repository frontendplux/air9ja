<?php

class Main {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // =============admin section=======================
    public function admin_create_post_image() {

        if (!isset($_FILES['cover_image'])) {
            return [
                'status' => false,
                'message' => 'No image uploaded'
            ];
        }

        $file = $_FILES['cover_image'];

        // Upload folder
        $uploadDir = __DIR__ . '/../uploads/blogs/';

        // Create folder if not exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // File extension
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        // Allowed types
        $allowed = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

        if (!in_array($ext, $allowed)) {
            return [
                'status' => false,
                'message' => 'Invalid image format'
            ];
        }

        // Unique file name
        $fileName = time() . '_' . uniqid() . '.' . $ext;

        $destination = $uploadDir . $fileName;

        // Move file
        if (!move_uploaded_file($file['tmp_name'], $destination)) {
            return [
                'status' => false,
                'message' => 'Failed to upload image'
            ];
        }

        return [
            'status' => true,
            'path' => $fileName
        ];
    }


    public function admin_create_post($data) {

        $keywords    = trim($data['keyword'] ?? '');
        $description = trim($data['desc'] ?? '');
        $title       = trim($data['title'] ?? '');
        $category    = trim($data['category'] ?? '');
        $blog        = trim($data['blog'] ?? '');
        $author      = trim($data['author'] ?? 'Admin');
        $status      = trim($data['status'] ?? 'published');

        // Upload image
        $upload = $this->admin_create_post_image();

        if (!$upload['status']) {
            return $upload;
        }

        $cover_image = $upload['path'];

        // Generate slug
        $slug = strtolower($title);
        $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
        $slug = trim($slug, '-');

        // Make slug unique
        $check = $this->conn->prepare(
            "SELECT id FROM blogs WHERE slug=?"
        );

        $check->bind_param('s', $slug);
        $check->execute();

        if ($check->get_result()->num_rows > 0) {
            $slug .= '-' . time();
        }

        // Insert blog
        $query = $this->conn->prepare(
            "INSERT INTO blogs
            (
                category,
                title,
                slug,
                image,
                author,
                description,
                content,
                status
            )
            VALUES
            (?, ?, ?, ?, ?, ?, ?, ?)"
        );

        if (!$query) {
            return [
                'status' => false,
                'message' => 'Query preparation failed'
            ];
        }

        $query->bind_param(
            'ssssssss',
            $category,
            $title,
            $slug,
            $cover_image,
            $author,
            $description,
            $blog,
            $status
        );

        if (!$query->execute()) {
            return [
                'status' => false,
                'message' => 'Failed to create blog post'
            ];
        }

        return [
            'status' => true,
            'message' => 'Blog post created successfully',
            'post_id' => $this->conn->insert_id,
            'slug' => $slug
        ];
    }

    public function admin_create_category($data) {

    $name        = trim($data['name'] ?? '');
    $description = trim($data['description'] ?? '');
    $icon        = trim($data['icon'] ?? '');
    $status      = trim($data['status'] ?? 'active');

    // Validation
    if (empty($name)) {
        return [
            'status' => false,
            'message' => 'Category name is required'
        ];
    }

    // Generate slug
    $slug = strtolower($name);
    $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
    $slug = trim($slug, '-');

    // Check existing slug
    $check = $this->conn->prepare(
        "SELECT id FROM category WHERE slug=?"
    );

    $check->bind_param('s', $slug);
    $check->execute();

    if ($check->get_result()->num_rows > 0) {
        $slug .= '-' . time();
    }

    // Upload image
    $image = '';

    if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {

        $uploadDir = __DIR__ . '/../uploads/category/';

        // Create folder
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $file = $_FILES['image'];

        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        $allowed = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

        if (!in_array($ext, $allowed)) {
            return [
                'status' => false,
                'message' => 'Invalid image format'
            ];
        }

        $fileName = time() . '_' . uniqid() . '.' . $ext;

        $destination = $uploadDir . $fileName;

        if (!move_uploaded_file($file['tmp_name'], $destination)) {
            return [
                'status' => false,
                'message' => 'Failed to upload image'
            ];
        }

        $image = 'uploads/category/' . $fileName;
    }

    // Insert category
    $query = $this->conn->prepare(
        "INSERT INTO category
        (
            name,
            slug,
            description,
            icon,
            image,
            status
        )
        VALUES
        (?, ?, ?, ?, ?, ?)"
    );

    if (!$query) {
        return [
            'status' => false,
            'message' => 'Query preparation failed'
        ];
    }

    $query->bind_param(
        'ssssss',
        $name,
        $slug,
        $description,
        $icon,
        $image,
        $status
    );

    if (!$query->execute()) {
        return [
            'status' => false,
            'message' => 'Failed to create category'
        ];
    }

    return [
        'status' => true,
        'message' => 'Category created successfully',
        'category_id' => $this->conn->insert_id,
        'slug' => $slug
    ];
    }

    public function admin_delete_category($data){

        $cat_id = (int)($data['cat_id'] ?? 0);

        if ($cat_id <= 0) {
            return [
                'status' => false,
                'message' => 'Invalid category ID'
            ];
        }

        // Fetch category image
        $get = $this->conn->prepare(
            "SELECT image FROM category WHERE id=?"
        );

        $get->bind_param('i', $cat_id);
        $get->execute();

        $result = $get->get_result()->fetch_assoc();

        if (!$result) {
            return [
                'status' => false,
                'message' => 'Category not found'
            ];
        }

        // Delete image
        if (!empty($result['image']) && file_exists(__DIR__ . '/../' . $result['image'])) {
            unlink(__DIR__ . '/../' . $result['image']);
        }

        // Delete category
        $query = $this->conn->prepare(
            "DELETE FROM category WHERE id=?"
        );

        $query->bind_param('i', $cat_id);

        if (!$query->execute()) {
            return [
                'status' => false,
                'message' => 'Failed to delete category'
            ];
        }

        return [
            'status' => true,
            'message' => 'Category deleted successfully'
        ];
    }



    public function admin_delete_blogs($data){

        $post_id = (int)($data['blog_id'] ?? 0);

        if ($post_id <= 0) {
            return [
                'status' => false,
                'message' => 'Invalid blog ID'
            ];
        }

        // Fetch image
        $get = $this->conn->prepare(
            "SELECT image FROM blogs WHERE id=?"
        );

        $get->bind_param('i', $post_id);
        $get->execute();

        $result = $get->get_result()->fetch_assoc();

        if (!$result) {
            return [
                'status' => false,
                'message' => 'Blog post not found'
            ];
        }

        // Delete image
        if (!empty($result['image']) && file_exists(__DIR__ . '/../' . $result['image'])) {
            unlink(__DIR__ . '/../' . $result['image']);
        }

        // Delete blog
        $query = $this->conn->prepare(
            "DELETE FROM blogs WHERE id=?"
        );

        $query->bind_param('i', $post_id);

        if (!$query->execute()) {
            return [
                'status' => false,
                'message' => 'Failed to delete blog post'
            ];
        }

        return [
            'status' => true,
            'message' => 'Blog post deleted successfully'
        ];
    }



    public function admin_published_draft_blogs($data){

        $post_id = (int)($data['blog_id'] ?? 0);

        if ($post_id <= 0) {
            return [
                'status' => false,
                'message' => 'Invalid blog ID'
            ];
        }

        // Get current status
        $get = $this->conn->prepare(
            "SELECT status FROM blogs WHERE id=?"
        );

        $get->bind_param('i', $post_id);
        $get->execute();

        $result = $get->get_result()->fetch_assoc();

        if (!$result) {
            return [
                'status' => false,
                'message' => 'Blog post not found'
            ];
        }

        // Toggle status
        $newStatus = ($result['status'] == 'published')
            ? 'draft'
            : 'published';

        $query = $this->conn->prepare(
            "UPDATE blogs SET status=? WHERE id=?"
        );

        $query->bind_param('si', $newStatus, $post_id);

        if (!$query->execute()) {
            return [
                'status' => false,
                'message' => 'Failed to update blog status'
            ];
        }

        return [
            'status' => true,
            'message' => 'Blog status updated successfully',
            'new_status' => $newStatus
        ];
    }



    public function admin_active_inactive_category($data){

        $cat_id = (int)($data['cat_id'] ?? 0);

        if ($cat_id <= 0) {
            return [
                'status' => false,
                'message' => 'Invalid category ID'
            ];
        }

        // Get current status
        $get = $this->conn->prepare(
            "SELECT status FROM category WHERE id=?"
        );

        $get->bind_param('i', $cat_id);
        $get->execute();

        $result = $get->get_result()->fetch_assoc();

        if (!$result) {
            return [
                'status' => false,
                'message' => 'Category not found'
            ];
        }

        // Toggle status
        $newStatus = ($result['status'] == 'active')
            ? 'inactive'
            : 'active';

        $query = $this->conn->prepare(
            "UPDATE category SET status=? WHERE id=?"
        );

        $query->bind_param('si', $newStatus, $cat_id);

        if (!$query->execute()) {
            return [
                'status' => false,
                'message' => 'Failed to update category status'
            ];
        }

        return [
            'status' => true,
            'message' => 'Category status updated successfully',
            'new_status' => $newStatus
        ];
    }
    // ================user sections===========================

    public function checker($data) {

        $slug = $data['slug'] ?? '';

        // Check Category
        $query = $this->conn->prepare(
            "SELECT * FROM category WHERE slug = ? LIMIT 1"
        );

        $query->bind_param('s', $slug);
        $query->execute();

        $res = $query->get_result();

        if ($res && $res->num_rows > 0) {

            $result = $res->fetch_assoc();

            return [
                'status' => true,
                'type'   => 'category',
                'data'   => $result
            ];
        }

        // Check Blog
      $query = $this->conn->prepare(
            "SELECT b.*,
            c.name AS cat_name
            FROM blogs b
            JOIN category c ON b.category = c.slug
            WHERE b.slug = ? LIMIT 1"
        );

        $query->bind_param('s', $slug);
        $query->execute();

        $res = $query->get_result();

        if ($res && $res->num_rows > 0) {

            $result = $res->fetch_assoc();

            return [
                'status' => true,
                'type'   => 'blog',
                'data'   => $result
            ];
        }

        // Not Found
        return [
            'status' => false,
            'type'   => null,
            'data'   => []
        ];
    }

    public function fetch_all_category() {

        $query = $this->conn->prepare(
            "SELECT * FROM category 
             WHERE status = 'active'
             ORDER BY id ASC"
        );
    
        if (!$query) {
            return [
                'status' => false,
                'data'   => [],
                'message' => 'Query preparation failed'
            ];
        }
    
        $query->execute();
    
        $res = $query->get_result()->fetch_all(MYSQLI_ASSOC);
    
        return [
            'status' => true,
            'data'   => $res
        ];
    }

   public function fetch_unique_blog_per_category($data){

    $limit  = (int)($data['limit'] ?? 10);
    $offset = (int)($data['offset'] ?? 0);

    $query = $this->conn->prepare(

        "SELECT b.*,
        c.name AS cat_name,
        c.slug AS cat_slug

        FROM blogs b

        INNER JOIN category c 
        ON b.category = c.slug

        INNER JOIN (
            SELECT MAX(id) as latest_id
            FROM blogs
            WHERE status='published'
            GROUP BY category
        ) latest_blog

        ON b.id = latest_blog.latest_id

        WHERE b.status='published'

        ORDER BY b.id DESC

        LIMIT ?, ?"
    );

    if (!$query) {
        return [
            'status' => false,
            'data' => [],
            'message' => 'Query preparation failed'
        ];
    }

    $query->bind_param('ii', $offset, $limit);

    $query->execute();

    $res = $query->get_result()->fetch_all(MYSQLI_ASSOC);

    return [
        'status' => true,
        'data' => $res
    ];
}

    public function fetch_trending_blog($data) {

        $limit  = (int) ($data['limit'] ?? 10);
        $offset = (int) ($data['offset'] ?? 0);

        // Get total blogs
        $countQuery = $this->conn->query(
            "SELECT COUNT(*) as total 
            FROM blogs 
            WHERE status='published'"
        );

        $totalBlogs = $countQuery->fetch_assoc()['total'] ?? 0;

        // Fetch blogs
        $query = $this->conn->prepare(
            "SELECT b.*,
            c.name as cat_name,
            c.slug as cat_slug
            FROM blogs b 
            join category c on b.category=c.slug
            WHERE b.status='published'
            ORDER BY b.id DESC
            LIMIT ?, ?"
        );

        if (!$query) {
            return [
                'status'  => false,
                'data'    => [],
                'message' => 'Query preparation failed'
            ];
        }

        $query->bind_param('ii', $offset, $limit);

        $query->execute();

        $res = $query->get_result()->fetch_all(MYSQLI_ASSOC);

        return [
            'status'       => true,
            'total_blogs'  => (int)$totalBlogs,
            'data'         => $res
        ];
    }
    public function fetch_all_blog($data) {

        $limit  = (int) ($data['limit'] ?? 10);
        $offset = (int) ($data['offset'] ?? 0);

        // Get total blogs
        $countQuery = $this->conn->query(
            "SELECT COUNT(*) as total 
            FROM blogs 
            WHERE status='published'"
        );

        $totalBlogs = $countQuery->fetch_assoc()['total'] ?? 0;

        // Fetch blogs
        $query = $this->conn->prepare(
           "SELECT b.*,
            c.name as cat_name,
            c.slug as cat_slug
            FROM blogs b 
            join category c on b.category=c.slug
            WHERE b.status='published'
            ORDER BY b.id DESC
            LIMIT ?, ?"
        );

        if (!$query) {
            return [
                'status'  => false,
                'data'    => [],
                'message' => 'Query preparation failed'
            ];
        }

        $query->bind_param('ii', $offset, $limit);

        $query->execute();

        $res = $query->get_result()->fetch_all(MYSQLI_ASSOC);

        return [
            'status'       => true,
            'total_blogs'  => (int)$totalBlogs,
            'data'         => $res
        ];
    }

    public function fetch_blogs_by_category($data) {

        $limit  = (int) ($data['limit'] ?? 10);
        $offset = (int) ($data['offset'] ?? 0);
        $slug   = trim($data['slug'] ?? '');


           $countQuery = $this->conn->query(
            "SELECT COUNT(*) as total 
            FROM blogs 
            WHERE category ='$slug' AND  status='published'"
        );

        $totalBlogs = $countQuery->fetch_assoc()['total'] ?? 0;

        $query = $this->conn->prepare(
            "SELECT b.*,
            c.name as cat_name,
            c.slug as cat_slug
            
            FROM blogs b
            join category c on b.category=c.slug
            WHERE b.category = ? 
            AND b.status = 'published'
            
            ORDER BY b.id DESC
            LIMIT ?, ?"
        );



        if (!$query) {
            return [
                'status'  => false,
                'data'    => [],
                'message' => 'Query preparation failed'
            ];
        }

        $query->bind_param('sii', $slug, $offset, $limit);

        $query->execute();

        $res = $query->get_result()->fetch_all(MYSQLI_ASSOC);

        return [
            'status' => true,
            'total_blogs' => $totalBlogs,
            'data'   => $res
        ];
    }
}



?>