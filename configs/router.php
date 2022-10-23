<?php
use Phroute\Phroute\RouteCollector;
use App\Controllers\ProductController;
use App\Controllers\CategoryController;
use App\Controllers\UserController;
use App\Controllers\OrderController;
use App\Controllers\HomeController;
use App\Controllers\Auth\AuthController;

$router = new RouteCollector();

$router->filter('auth', function(){
    if(!isset($_SESSION['email']) && !isset($_SESSION['password']) )
    {
        header('Location:'. BASE_URL .'login');

        return false;
    }
});

$router->get('/login', [AuthController::class, 'index']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/logout', [AuthController::class, 'logout']);
$router->get('/register', [AuthController::class, 'register']);
$router->post('/register', [AuthController::class, 'storeUser']);

$router->get('/', [HomeController::class, 'index']);

$router->group(['prefix' => 'admin','before' => 'auth' ], function($router){
$router->get('/ds-san-pham', [ProductController::class, 'index']);
$router->get('/them-san-pham', [ProductController::class, 'create']);
$router->post('/them-san-pham', [ProductController::class, 'store']);
$router->get('/chi-tiet-san-pham/{id}', [ProductController::class, 'show']);
$router->get('/cap-nhat-san-pham/{id}', [ProductController::class, 'edit']);
$router->post('/cap-nhat-san-pham/{id}', [ProductController::class, 'update']);
$router->get('/xoa-san-pham/{id}', [ProductController::class, 'destroy']);

$router->get('/ds-danh-muc', [CategoryController::class, 'index']);
$router->get('/them-danh-muc', [CategoryController::class, 'create']);
$router->post('/them-danh-muc', [CategoryController::class, 'store']);
$router->get('/cap-nhat-danh-muc/{id}', [CategoryController::class, 'edit']);
$router->post('/cap-nhat-danh-muc/{id}', [CategoryController::class, 'update']);
$router->get('/xoa-danh-muc/{id}', [CategoryController::class, 'destroy']);

$router->get('/ds-khach-hang', [UserController::class, 'index']);
$router->get('/them-khach-hang', [UserController::class, 'create']);
$router->post('/them-khach-hang', [UserController::class, 'store']);
$router->get('/cap-nhat-khach-hang/{id}', [UserController::class, 'edit']);
$router->post('/cap-nhat-khach-hang/{id}', [UserController::class, 'update']);
$router->get('/xoa-khach-hang/{id}', [UserController::class, 'destroy']);

$router->get('/ds-don-hang', [OrderController::class, 'index']);
$router->get('/them-don-hang', [OrderController::class, 'create']);
$router->post('/them-don-hang', [OrderController::class, 'store']);
$router->get('/cap-nhat-don-hang/{id}', [OrderController::class, 'edit']);
$router->post('/cap-nhat-don-hang/{id}', [OrderController::class, 'update']);
$router->get('/xoa-don-hang/{id}', [OrderController::class, 'destroy']);
$router->get('/chi-tiet-don-hang/{id}', [OrderController::class, 'show']);
});

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$url = isset($_GET['url']) ? ($_GET['url']) : '/';
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);
echo $response;