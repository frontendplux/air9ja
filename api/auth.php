<?php

class auth {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;

        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
    }

    public function Login($data){

        $email = trim($data['email'] ?? '');

        $password = trim($data['password'] ?? '');

        // Validation
        if(empty($email) || empty($password)){

            return [
                'status' => false,
                'message' => 'Enter all fields'
            ];
        }

        // Validate email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

            return [
                'status' => false,
                'message' => 'Invalid email address'
            ];
        }

        // Fetch user only by email
        $query = $this->conn->prepare(
            "SELECT * FROM users 
             WHERE email=? 
             LIMIT 1"
        );

        if(!$query){

            return [
                'status' => false,
                'message' => 'Database error'
            ];
        }

        $query->bind_param('s', $email);

        $query->execute();

        $res = $query->get_result();

        // User exists
        if($res->num_rows > 0){

            $row = $res->fetch_assoc();

            // Verify hashed password
            if(password_verify($password, $row['password'])) {

                // Generate login uid
                $uid = uniqid(
                    explode('@', $email)[0] . '-'
                );

                // Save uid
                $update = $this->conn->prepare(
                    "UPDATE users 
                     SET uid=? 
                     WHERE id=? 
                     LIMIT 1"
                );

                $update->bind_param(
                    'si',
                    $uid,
                    $row['id']
                );

                $update->execute();

                // Session
                $_SESSION['uid'] = $uid;

                $_SESSION['id'] = $row['id'];

                $_SESSION['fullname'] = $row['fullname'];

                $_SESSION['role'] = $row['role'];

                return [
                    'status' => true,
                    'message' => 'Login successfully!',
                    'redirect' => '/member'
                ];

            } else {

                return [
                    'status' => false,
                    'message' => 'Invalid email or password!'
                ];
            }
        }

        return [
            'status' => false,
            'message' => 'Invalid email or password!'
        ];
    }


public function Signup($data){

    $fullname = trim($data['fullname'] ?? '');

    $email = trim($data['email'] ?? '');

    $password = trim($data['password'] ?? '');

    // Validation
    if(empty($fullname) || empty($email) || empty($password)){

        return [
            'status' => false,
            'message' => 'Enter all fields'
        ];
    }

    // Validate email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

        return [
            'status' => false,
            'message' => 'Invalid email address'
        ];
    }

    // Password length
    if(strlen($password) < 8){

        return [
            'status' => false,
            'message' => 'Password must be at least 8 characters'
        ];
    }

    // Check existing email
    $check = $this->conn->prepare(
        "SELECT id FROM users 
         WHERE email=? 
         LIMIT 1"
    );

    $check->bind_param('s', $email);

    $check->execute();

    if($check->get_result()->num_rows > 0){

        return [
            'status' => false,
            'message' => 'Email already exists'
        ];
    }

    // Generate username
    $username =
        strtolower(
            preg_replace(
                '/[^a-z0-9]/',
                '',
                str_replace(' ', '', $fullname)
            )
        ) . rand(100,999);

    // Hash password
    $hashedPassword =
        password_hash($password, PASSWORD_DEFAULT);

    // Generate uid
    $uid = uniqid('user-');

    // Insert user
    $query = $this->conn->prepare(
        "INSERT INTO users
        (
            uid,
            fullname,
            username,
            email,
            password
        )
        VALUES
        (?, ?, ?, ?, ?)"
    );

    if(!$query){

        return [
            'status' => false,
            'message' => 'Database error'
        ];
    }

    $query->bind_param(
        'sssss',
        $uid,
        $fullname,
        $username,
        $email,
        $hashedPassword
    );

    if(!$query->execute()){

        return [
            'status' => false,
            'message' => 'Failed to create account'
        ];
    }

    // Auto login session
    $_SESSION['uid'] = $uid;

    $_SESSION['id'] = $this->conn->insert_id;

    $_SESSION['fullname'] = $fullname;

    $_SESSION['role'] = 'user';

    return [
        'status' => true,
        'message' => 'Account created successfully!',
        'redirect' => '/member'
    ];
}


public function ForgotPassword($data){

    $email = trim($data['email'] ?? '');

    // Validation
    if(empty($email)){

        return [
            'status' => false,
            'message' => 'Email address is required'
        ];
    }

    // Validate email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

        return [
            'status' => false,
            'message' => 'Invalid email address'
        ];
    }

    // Check user
    $query = $this->conn->prepare(
        "SELECT * FROM users 
         WHERE email=? 
         LIMIT 1"
    );

    $query->bind_param('s', $email);

    $query->execute();

    $user = $query->get_result()->fetch_assoc();

    if(!$user){

        return [
            'status' => false,
            'message' => 'No account found'
        ];
    }

    // Generate token
    $token = bin2hex(random_bytes(32));

    // Expiry time
    $expires = date(
        'Y-m-d H:i:s',
        strtotime('+1 hour')
    );

    // Save token
    $update = $this->conn->prepare(
        "UPDATE users 
         SET reset_token=?, 
             reset_token_expiry=? 
         WHERE id=?"
    );

    $update->bind_param(
        'ssi',
        $token,
        $expires,
        $user['id']
    );

    $update->execute();

    // Reset link
    $resetLink =
        "https://yourdomain.com/reset-password?token="
        . $token;

    /*
        SEND EMAIL HERE
    */

    return [
        'status' => true,
        'message' => 'Reset instructions sent',
        'reset_link' => $resetLink
    ];
}


public function ChangePassword($data){

    if(!isset($_SESSION['id'])){

        return [
            'status' => false,
            'message' => 'Unauthorized'
        ];
    }

    $currentPassword =
        trim($data['current_password'] ?? '');

    $newPassword =
        trim($data['new_password'] ?? '');

    if(empty($currentPassword) ||
       empty($newPassword)){

        return [
            'status' => false,
            'message' => 'All fields are required'
        ];
    }

    // Fetch user
    $query = $this->conn->prepare(
        "SELECT * FROM users
         WHERE id=?
         LIMIT 1"
    );

    $query->bind_param(
        'i',
        $_SESSION['id']
    );

    $query->execute();

    $user =
        $query->get_result()->fetch_assoc();

    if(!$user){

        return [
            'status' => false,
            'message' => 'User not found'
        ];
    }

    // Verify old password
    if(!password_verify(
        $currentPassword,
        $user['password']
    )){

        return [
            'status' => false,
            'message' => 'Current password incorrect'
        ];
    }

    // Hash new password
    $hashedPassword =
        password_hash(
            $newPassword,
            PASSWORD_DEFAULT
        );

    // Update
    $update = $this->conn->prepare(
        "UPDATE users
         SET password=?
         WHERE id=?"
    );

    $update->bind_param(
        'si',
        $hashedPassword,
        $_SESSION['id']
    );

    if(!$update->execute()){

        return [
            'status' => false,
            'message' => 'Failed to update password'
        ];
    }

    return [
        'status' => true,
        'message' => 'Password updated successfully'
    ];
}

}

?>