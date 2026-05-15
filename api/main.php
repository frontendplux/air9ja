<?php

class Main {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

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
            "SELECT * FROM blog WHERE slug = ? LIMIT 1"
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

    public function fetch_all_blog($data) {

        $limit  = (int) ($data['limit'] ?? 10);
        $offset = (int) ($data['offset'] ?? 0);
    
        $query = $this->conn->prepare(
            "SELECT * FROM blogs 
             ORDER BY id DESC 
             LIMIT ?, ?"
        );
    
        $query->bind_param('ii', $offset, $limit);
    
        $query->execute();
    
        $res = $query->get_result()->fetch_all(MYSQLI_ASSOC);
    
        return [
            'status' => true,
            'data'   => $res
        ];
    }

    public function fetch_blogs_by_category($data) {

        $limit  = (int) ($data['limit'] ?? 10);
        $offset = (int) ($data['offset'] ?? 0);
        $slug   = trim($data['slug'] ?? '');
    
        $query = $this->conn->prepare(
            "SELECT * FROM blogs
             WHERE category = ?
             ORDER BY id DESC
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
            'data'   => $res
        ];
    }
}
?>