<?php

class member {

    private $conn;

    public function __construct($conn) {

        $this->conn = $conn;

        if(session_status() === PHP_SESSION_NONE){

            session_start();
        }
    }


    public function getUser($data){

        $id  = (int)($data['id'] ?? 0);

        $uid = trim($data['uid'] ?? '');

        // Validation
        if(empty($id) || empty($uid)){

            return [
                'status' => false,
                'message' => 'Invalid user credentials'
            ];
        }

        // Fetch user
        $query = $this->conn->prepare(
            "SELECT 
                id, uid, fullname, username, email, phone, profile_image, bio, role, status, created_at, coin
               FROM users WHERE id=? AND uid=? LIMIT 1"
               );

        if(!$query){

            return [
                'status' => false,
                'message' => 'Database error'
            ];
        }

        $query->bind_param(
            'is',
            $id,
            $uid
        );

        $query->execute();

        $res = $query->get_result();

        // User found
        if($res->num_rows > 0){

            $user = $res->fetch_assoc();

            return [
                'status' => true,
                'data' => $user
            ];
        }

        return [
            'status' => false,
            'message' => 'User not found'
        ];
    }


public function fetch_users_blogs($data){

    $id     = (int)($data['id'] ?? 0);

    $uid    = trim($data['uid'] ?? '');

    $offset = (int)($data['offset'] ?? 0);

    $limit  = (int)($data['limit'] ?? 10);


    // Validate user
    $user = $this->getUser([
        'id'  => $id,
        'uid' => $uid
    ]);

    if(!$user['status']){

        return [
            'status' => false,
            'data' => [],
            'message' => 'Unauthorized user'
        ];
    }


    // Total blogs
    $countQuery = $this->conn->prepare(
        "SELECT COUNT(*) as total
         FROM blogs
         WHERE author=?"
    );

    $countQuery->bind_param(
        'i',
        $id
    );

    $countQuery->execute();

    $my_total_blog =
        $countQuery
        ->get_result()
        ->fetch_assoc()['total'] ?? 0;



    // Categories written
    $catQuery = $this->conn->prepare(
        "SELECT DISTINCT
            c.name,
            c.slug

         FROM blogs b

         JOIN category c
         ON b.category = c.slug

         WHERE b.author=?"
    );

    $catQuery->bind_param(
        'i',
        $id
    );

    $catQuery->execute();

    $categories =
        $catQuery
        ->get_result()
        ->fetch_all(MYSQLI_ASSOC);



    // Fetch blogs
    $query = $this->conn->prepare(
        "SELECT
            b.*,

            c.name AS cat_name

         FROM blogs b

         JOIN category c
         ON b.category = c.slug

         WHERE b.author=?

         ORDER BY b.id DESC

         LIMIT ?, ?"
    );

    if(!$query){

        return [
            'status' => false,
            'message' => 'Database error',
            'data' => []
        ];
    }

    $query->bind_param(
        'iii',
        $id,
        $offset,
        $limit
    );

    $query->execute();

    $res =
        $query
        ->get_result()
        ->fetch_all(MYSQLI_ASSOC);


    return [

        'status' => true,

        'data' => $res,

        'total_blog' => (int)$my_total_blog,

        'category_of_all_blog_written' => $categories
    ];
}

public function Dashboard($data){

    $id     = (int)($data['id'] ?? 0);

    $uid    = trim($data['uid'] ?? '');

    $offset = (int)($data['offset'] ?? 0);

    $limit  = (int)($data['limit'] ?? 10);


    // Validate user
    $user = $this->getUser([
        'id'  => $id,
        'uid' => $uid
    ]);

    if(!$user['status']){

        return [
            'status' => false,
            'data' => [],
            'message' => 'Unauthorized user'
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | TOTAL BLOG VIEWS
    |--------------------------------------------------------------------------
    */

    $countQueryViews = $this->conn->prepare(
        "SELECT SUM(views) as total
         FROM blogs
         WHERE author=?"
    );

    $countQueryViews->bind_param(
        'i',
        $id
    );

    $countQueryViews->execute();

    $my_total_views =
        (int)(
            $countQueryViews
            ->get_result()
            ->fetch_assoc()['total'] ?? 0
        );



    /*
    |--------------------------------------------------------------------------
    | TOTAL BLOGS
    |--------------------------------------------------------------------------
    */

    $countQueryBlogs = $this->conn->prepare(
        "SELECT COUNT(*) as total
         FROM blogs
         WHERE author=?"
    );

    $countQueryBlogs->bind_param(
        'i',
        $id
    );

    $countQueryBlogs->execute();

    $my_total_blog =
        (int)(
            $countQueryBlogs
            ->get_result()
            ->fetch_assoc()['total'] ?? 0
        );



    /*
    |--------------------------------------------------------------------------
    | TOTAL ACTIVE ASSETS
    |--------------------------------------------------------------------------
    */

    $countQueryAssets = $this->conn->prepare(
        "SELECT COUNT(*) as total
         FROM assets
         WHERE user_id=?
         AND status='active'"
    );

    $countQueryAssets->bind_param(
        'i',
        $id
    );

    $countQueryAssets->execute();

    $my_total_assets =
        (int)(
            $countQueryAssets
            ->get_result()
            ->fetch_assoc()['total'] ?? 0
        );



    /*
    |--------------------------------------------------------------------------
    | TOTAL ASSET VALUE
    |--------------------------------------------------------------------------
    */

    $assetWorthQuery = $this->conn->prepare(
        "SELECT SUM(amount) as total
         FROM assets
         WHERE user_id=?
         AND status='active'"
    );

    $assetWorthQuery->bind_param(
        'i',
        $id
    );

    $assetWorthQuery->execute();

    $my_total_asset_worth =
        (float)(
            $assetWorthQuery
            ->get_result()
            ->fetch_assoc()['total'] ?? 0
        );



    /*
    |--------------------------------------------------------------------------
    | CATEGORIES WRITTEN
    |--------------------------------------------------------------------------
    */

    $catQuery = $this->conn->prepare(
        "SELECT DISTINCT
            c.name,
            c.slug
         FROM blogs b

         JOIN category c
         ON b.category = c.slug

         WHERE b.author=?"
    );

    $catQuery->bind_param(
        'i',
        $id
    );

    $catQuery->execute();

    $categories =
        $catQuery
        ->get_result()
        ->fetch_all(MYSQLI_ASSOC);



    /*
    |--------------------------------------------------------------------------
    | RECENT BLOGS
    |--------------------------------------------------------------------------
    */

    $query = $this->conn->prepare(
        "SELECT
            b.*,

            c.name AS cat_name

         FROM blogs b

         JOIN category c
         ON b.category = c.slug

         WHERE b.author=?

         ORDER BY b.id DESC

         LIMIT ?, ?"
    );

    if(!$query){

        return [
            'status' => false,
            'message' => 'Database error',
            'data' => []
        ];
    }

    $query->bind_param(
        'iii',
        $id,
        $offset,
        $limit
    );

    $query->execute();

    $res =
        $query
        ->get_result()
        ->fetch_all(MYSQLI_ASSOC);



    /*
    |--------------------------------------------------------------------------
    | RECENT ASSETS
    |--------------------------------------------------------------------------
    */

    $assetQuery = $this->conn->prepare(
        "SELECT *
         FROM assets
         WHERE user_id=?
         ORDER BY id DESC
         LIMIT 5"
    );

    $assetQuery->bind_param(
        'i',
        $id
    );

    $assetQuery->execute();

    $recent_assets =
        $assetQuery
        ->get_result()
        ->fetch_all(MYSQLI_ASSOC);



    return [

        'status' => true,

        'user' => $user['data'],

        'data' => $res,

        'my_total_views' => $my_total_views,

        'total_blog' => $my_total_blog,

        'total_assets' => $my_total_assets,

        'total_asset_worth' => $my_total_asset_worth,

        'recent_assets' => $recent_assets,

        'category_of_all_blog_written' => $categories
    ];
}

public function createBlog($data, $file = null){

    $id          = (int)($data['id'] ?? $_SESSION['id']);
    $uid         = trim($data['uid'] ?? $_SESSION['uid']);

    $blog_id     = (int)($data['blog_id'] ?? 0);

    $title       = trim($data['title'] ?? '');
    $category    = trim($data['category'] ?? '');
    $description = trim($data['desc'] ?? '');
    $keywords    = trim($data['keyword'] ?? '');
    $content     = trim($data['blog'] ?? '');
    $status      = trim($data['status'] ?? 'draft');



    // Validate user
    $user = $this->getUser([
        'id'  => $id,
        'uid' => $uid
    ]);

    if(!$user['status']){

        return [
            'status' => false,
            'message' => 'Unauthorized user'
        ];
    }



    // Validation
    if(
        empty($title) ||
        empty($category) ||
        empty($description) ||
        empty($content)
    ){

        return [
            'status' => false,
            'message' => 'All required fields are needed'
        ];
    }



    // Generate slug
    $slug = strtolower($title);

    $slug = preg_replace(
        '/[^a-z0-9]+/',
        '-',
        $slug
    );

    $slug = trim($slug, '-');



    // Default image
    $image = '';



    // If updating, get old image
    if($blog_id > 0){

        $oldQuery = $this->conn->prepare(
            "SELECT image
             FROM blogs
             WHERE id=? AND author=?
             LIMIT 1"
        );

        $oldQuery->bind_param(
            'ii',
            $blog_id,
            $id
        );

        $oldQuery->execute();

        $oldBlog =
            $oldQuery
            ->get_result()
            ->fetch_assoc();

        if(!$oldBlog){

            return [
                'status' => false,
                'message' => 'Blog not found'
            ];
        }

        $image =
            $oldBlog['image'] ?? '';
    }



    // Upload new image
    if(
        isset($file['tmp_name']) &&
        !empty($file['tmp_name'])
    ){

        $uploadDir =
            __DIR__.'/../uploads/blogs/';

        if(!is_dir($uploadDir)){

            mkdir(
                $uploadDir,
                0777,
                true
            );
        }

        $ext = pathinfo(
            $file['name'],
            PATHINFO_EXTENSION
        );

        $fileName =
            time().'_'.uniqid().'.'.$ext;

        $target =
            $uploadDir.$fileName;

        if(
            move_uploaded_file(
                $file['tmp_name'],
                $target
            )
        ){

            $image =
                '/uploads/blogs/'.$fileName;
        }
    }



    // =====================================
    // UPDATE BLOG
    // =====================================

    if($blog_id > 0){

        $query = $this->conn->prepare(
            "UPDATE blogs SET

                category=?,
                title=?,
                slug=?,
                image=?,
                description=?,
                keywords=?,
                content=?,
                status=?

             WHERE id=? AND author=?"
        );

        if(!$query){

            return [
                'status' => false,
                'message' => 'Database prepare failed'
            ];
        }

        $query->bind_param(
            'ssssssssii',
            $category,
            $title,
            $slug,
            $image,
            $description,
            $keywords,
            $content,
            $status,
            $blog_id,
            $id
        );

        if($query->execute()){

            return [
                'status' => true,
                'message' => 'Blog updated successfully'
            ];
        }



        return [
            'status' => false,
            'message' => 'Failed to update blog'
        ];
    }



    // =====================================
    // CREATE BLOG
    // =====================================

    $views = 0;

    $query = $this->conn->prepare(
        "INSERT INTO blogs(

            category,
            title,
            slug,
            image,
            author,
            description,
            keywords,
            content,
            views,
            status,
            created_at

        ) VALUES(

            ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW()

        )"
    );

    if(!$query){

        return [
            'status' => false,
            'message' => 'Database prepare failed'
        ];
    }

    $query->bind_param(
        'ssssisssis',
        $category,
        $title,
        $slug,
        $image,
        $id,
        $description,
        $keywords,
        $content,
        $views,
        $status
    );



    if($query->execute()){

        return [
            'status' => true,
            'message' => 'Blog created successfully',
            'blog_id' => $query->insert_id
        ];
    }



    return [
        'status' => false,
        'message' => 'Failed to create blog'
    ];
}
public function getCreateDatas($data){

    $id  = (int)($data['id'] ?? 0);
    $uid = trim($data['uid'] ?? '');
    $type = trim($data['type'] ?? 'blog');
    $edit = trim($data['edit'] ?? null);

    if($this->getUser([
        'id'  => $id,
        'uid' => $uid
    ])['status'] === false){

        return [
            'status' => false,
            'message' => 'Unauthorized user',
            'data' => null
        ];
    }
    if($edit != null){

        $blog = $this->conn->prepare(
            "SELECT * FROM blogs WHERE slug=? AND author=? LIMIT 1"
        );
        $blog->bind_param(
                'si',
                $data['edit'],
                $id
            );

            $blog->execute();

            $res = $blog->get_result();

            if($res->num_rows > 0){
                $blog = $res->fetch_assoc();
            }
        }

        return [
            'status' => true,
            'message' => 'Data fetched successfully',
            'data' => [
                'blog' => $blog ?? [],
                'categories' => $this->conn->query("SELECT name, slug FROM category where status='active'")->fetch_all(MYSQLI_ASSOC)
            ]
        ];
    }

public function get_all_post_from_user($data){

    $id       = (int)($data['id'] ?? 0);
    $uid      = trim($data['uid'] ?? '');

    $offset   = (int)($data['offset'] ?? 0);
    $limit    = (int)($data['limit'] ?? 10);

    $search   = trim($data['search'] ?? '');
    $category = trim($data['category'] ?? '');
    $status   = trim($data['status'] ?? '');



    // =========================
    // VALIDATE USER
    // =========================

    $user = $this->getUser([
        'id'  => $id,
        'uid' => $uid
    ]);

    if(!$user['status']){

        return [
            'status'  => false,
            'message' => 'Unauthorized user',
            'blogs'   => []
        ];
    }



    // =========================
    // WHERE CONDITIONS
    // =========================

    $where = " WHERE b.author=? ";
    $types = "i";
    $params = [$id];



    // SEARCH
    if(!empty($search)){

        $where .= "
            AND (
                b.title LIKE ?
                OR b.keywords LIKE ?
                OR b.description LIKE ?
            )
        ";

        $searchLike = "%{$search}%";

        $types .= "sss";

        $params[] = $searchLike;
        $params[] = $searchLike;
        $params[] = $searchLike;
    }



    // CATEGORY
    if(!empty($category)){

        $where .= " AND b.category=? ";

        $types .= "s";

        $params[] = $category;
    }



    // STATUS
    if(!empty($status)){

        $where .= " AND b.status=? ";

        $types .= "s";

        $params[] = $status;
    }



    // =========================
    // TOTAL POSTS
    // =========================

    $countSql = "
        SELECT COUNT(*) as total
        FROM blogs b
        $where
    ";

    $countQuery = $this->conn->prepare($countSql);

    $countQuery->bind_param(
        $types,
        ...$params
    );

    $countQuery->execute();

    $total_posts =
        $countQuery
        ->get_result()
        ->fetch_assoc()['total'] ?? 0;



    // =========================
    // FETCH BLOGS
    // =========================

    $sql = "
        SELECT
            b.*,
            c.name as category_name

        FROM blogs b

        LEFT JOIN category c
        ON b.category = c.slug

        $where

        ORDER BY b.id DESC

        LIMIT ?, ?
    ";

    $query = $this->conn->prepare($sql);

    $types2 = $types . "ii";

    $params[] = $offset;
    $params[] = $limit;

    $query->bind_param(
        $types2,
        ...$params
    );

    $query->execute();

    $blogs =
        $query
        ->get_result()
        ->fetch_all(MYSQLI_ASSOC);



    // =========================
    // GET CATEGORIES
    // =========================

    $catQuery = $this->conn->prepare(
        "SELECT DISTINCT
            c.name,
            c.slug

        FROM blogs b

        LEFT JOIN category c
        ON b.category = c.slug

        WHERE b.author=?"
    );

    $catQuery->bind_param(
        'i',
        $id
    );

    $catQuery->execute();

    $categories =
        $catQuery
        ->get_result()
        ->fetch_all(MYSQLI_ASSOC);



    // =========================
    // PAGINATION
    // =========================

    $total_pages = ceil(
        $total_posts / $limit
    );



    return [

        'status' => true,

        'blogs' => $blogs,

        'category' => $categories,

        'pagination' => [

            'total_posts' => (int)$total_posts,

            'total_pages' => (int)$total_pages,

            'current_page' => floor($offset / $limit) + 1,

            'limit' => $limit,

            'offset' => $offset
        ]
    ];
}

public function deleteBlog($data){

    $id      = (int)($data['id'] ?? 0);
    $uid     = trim($data['uid'] ?? '');
    $blog_id = (int)($data['blog_id'] ?? 0);



    // Validate user
    $user = $this->getUser([
        'id'  => $id,
        'uid' => $uid
    ]);

    if(!$user['status']){

        return [
            'status' => false,
            'message' => 'Unauthorized user'
        ];
    }



    // Validate blog
    $check = $this->conn->prepare(
        "SELECT id, image
         FROM blogs
         WHERE id = ?
         AND author = ?
         LIMIT 1"
    );

    $check->bind_param(
        'ii',
        $blog_id,
        $id
    );

    $check->execute();

    $result = $check->get_result();

    if($result->num_rows < 1){

        return [
            'status' => false,
            'message' => 'Blog not found'
        ];
    }

    $blog = $result->fetch_assoc();



    // Delete image
    if(!empty($blog['image'])){

        $imagePath =
            __DIR__.'/..'.$blog['image'];

        if(file_exists($imagePath)){

            @unlink($imagePath);
        }
    }



    // Delete blog
    $delete = $this->conn->prepare(
        "DELETE FROM blogs
         WHERE id = ?
         AND author = ?"
    );

    $delete->bind_param(
        'ii',
        $blog_id,
        $id
    );



    if($delete->execute()){

        return [
            'status' => true,
            'message' => 'Blog deleted successfully'
        ];

    }else{

        return [
            'status' => false,
            'message' => 'Failed to delete blog'
        ];
    }
}

public function saveCategory($data){

    $id = (int)($data['id'] ?? 0);

    $name = trim($data['name'] ?? '');
    $slug = trim($data['slug'] ?? '');
    $description = trim($data['description'] ?? '');
    $icon = trim($data['icon'] ?? '');
    $image = trim($data['image'] ?? '');
    $status = trim($data['status'] ?? 'active');



    // VALIDATION
    if(
        empty($name) ||
        empty($slug)
    ){

        return [
            'status' => false,
            'message' => 'Name and slug are required'
        ];
    }



    // CLEAN SLUG
    $slug = strtolower($slug);

    $slug = preg_replace(
        '/[^a-z0-9]+/',
        '-',
        $slug
    );

    $slug = trim($slug, '-');



    // CHECK DUPLICATE SLUG
    $check = $this->conn->prepare(
        "SELECT id FROM category
         WHERE slug = ?
         AND id != ?"
    );

    $check->bind_param(
        "si",
        $slug,
        $id
    );

    $check->execute();

    $exists = $check
        ->get_result()
        ->fetch_assoc();

    if($exists){

        return [
            'status' => false,
            'message' => 'Slug already exists'
        ];
    }



    /*
    ===================================
    UPDATE
    ===================================
    */
    if($id > 0){

        $query = $this->conn->prepare(
            "UPDATE category SET
                name = ?,
                slug = ?,
                description = ?,
                icon = ?,
                image = ?,
                status = ?
            WHERE id = ?
            LIMIT 1"
        );

        if(!$query){

            return [
                'status' => false,
                'message' => 'Database prepare failed'
            ];
        }

        $query->bind_param(
            "ssssssi",
            $name,
            $slug,
            $description,
            $icon,
            $image,
            $status,
            $id
        );

        if($query->execute()){

            return [
                'status' => true,
                'message' => 'Category updated successfully'
            ];
        }

        return [
            'status' => false,
            'message' => 'Failed to update category'
        ];
    }



    /*
    ===================================
    CREATE
    ===================================
    */
    $query = $this->conn->prepare(
        "INSERT INTO category(
            name,
            slug,
            description,
            icon,
            image,
            status,
            created_at
        ) VALUES(
            ?, ?, ?, ?, ?, ?, NOW()
        )"
    );

    if(!$query){

        return [
            'status' => false,
            'message' => 'Database prepare failed'
        ];
    }

    $query->bind_param(
        "ssssss",
        $name,
        $slug,
        $description,
        $icon,
        $image,
        $status
    );

    if($query->execute()){

        return [
            'status' => true,
            'message' => 'Category created successfully',
            'category_id' => $query->insert_id
        ];
    }

    return [
        'status' => false,
        'message' => 'Failed to create category'
    ];
}

public function getCategory(){

    $query = $this->conn->prepare(
        "SELECT *
         FROM category
         ORDER BY id DESC"
    );

    $query->execute();

    $result = $query
        ->get_result();

    $data = [];

    while($row = $result->fetch_assoc()){

        $data[] = $row;
    }

    return [
        'status' => true,
        'data' => $data
    ];
}

public function deleteCategory($data){

    $id = (int)($data['id'] ?? 0);

    if($id < 1){

        return [
            'status' => false,
            'message' => 'Invalid category'
        ];
    }



    // OPTIONAL:
    // REMOVE CATEGORY FROM BLOGS
    $remove = $this->conn->prepare(
        "UPDATE blogs
         SET category = ''
         WHERE category = (
            SELECT slug FROM category
            WHERE id = ?
         )"
    );

    $remove->bind_param(
        "i",
        $id
    );

    $remove->execute();



    // DELETE CATEGORY
    $query = $this->conn->prepare(
        "DELETE FROM category
         WHERE id = ?
         LIMIT 1"
    );

    $query->bind_param(
        "i",
        $id
    );

    if($query->execute()){

        return [
            'status' => true,
            'message' => 'Category deleted successfully'
        ];
    }

    return [
        'status' => false,
        'message' => 'Failed to delete category'
    ];
}

}

?>