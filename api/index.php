<?php

session_start();

function loadPage($data){

    header('Content-Type: application/json');

    include __DIR__ . "/conn.php";

    include __DIR__ . "/auth.php";

    $auth = new auth($conn);

    // Get action safely
    $action = trim($data['action'] ?? '', '/');

    // Split route
    $path = explode('/', $action);

    /*
        auth/login
        auth/signup
    */

    $mainRoute = $path[0] ?? '';

    $subRoute  = $path[1] ?? '';

    switch ($mainRoute) {

        // AUTH ROUTES
        case 'auth':

            switch ($subRoute) {

                case 'login':
                    echo json_encode($auth->Login($data));
                    break;

                case 'register':
                    echo json_encode(
                        $auth->Signup($data)
                    );
                    break;

                case 'forgot-password':
                    echo json_encode(
                        $auth->ForgotPassword($data)
                    );
                    break;
                                

                case 'logout':
                    session_destroy();
                    echo json_encode([
                        'status' => true,
                        'message' => 'Logout successful'
                    ]);
                    break;

                default:

                    http_response_code(404);

                    echo json_encode([
                        'status' => false,
                        'message' => 'Auth route not found'
                    ]);

                    break;
            }

            break;

        case 'change-password':
            echo json_encode(
                $auth->ChangePassword($data)
            );
            break;
        
        case 'blog':
            include __DIR__."/admin.php";
            $admin =new member($conn);
            switch ($subRoute) {
                case 'update':
                case 'create':
                    echo json_encode(
                        $admin->createBlog(
                            $data,
                            $_FILES['cover_image'] ?? null
                        )
                    );
                break;
                case 'delete':
                    echo json_encode($admin->deleteBlog($data));
                break;
                default:
                    echo json_encode([
                        'status' => false,
                        'message' => 'Invalid route'
                    ]);
                break;
            }
            break;

        case 'category':
             include __DIR__."/admin.php";
            $admin =new member($conn);
            switch ($subRoute) {
                case 'save':
                case 'update':
                case 'create':
                    echo json_encode($admin->saveCategory($data));
                break;
                case 'delete':
                    echo json_encode($admin->deleteCategory($data));
                break;
                case 'list':
                    echo json_encode($admin->getCategory());
                break;
                default:
                    echo json_encode(['status' => false, 'message' => 'Invalid route']);
                break;
            }
        break;

        default:

            http_response_code(404);

            echo json_encode([
                'status' => false,
                'message' => 'Route not found'
            ]);

            break;
    }
}


// Accept JSON or POST
$data = json_decode(
    file_get_contents('php://input'),
    true
);

if (!$data) {
    $data = $_POST;
}

// Load router
loadPage($data);

?>