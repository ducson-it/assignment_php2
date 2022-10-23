<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        $viewName = 'adminlte.dashboard.home';
        $viewLogin = 'adminlte.auth.login';
        if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
            return $this->render($viewName, []);
        } else {
            return $this->render($viewLogin, []);
        }
    }

    public function login()
    {
        $viewName = 'adminlte.dashboard.home';
        $viewLogin = 'adminlte.auth.login';

        $error = [];

        if ($_POST['email'] == '') {
            $error['email'] = 'Không được để trống';
        }
        if ($_POST['password'] == '') {
            $error['password'] = 'Không được để trống';
        }

        if (empty($error)) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = User::where('email', $email)->first();

            if (password_verify($password, $user->password)) {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location:' . BASE_URL);
            } else {
                $_SESSION['flash_message'] = "Đăng nhập không thành công, vui lòng thử lại";
                header('location:' . BASE_URL . 'login');
            }
        } else {
            return $this->render($viewLogin, compact('error'));
        }
    }

    public function logout()
    {
        unset($_SESSION['email']);
        unset($_SESSION['password']);

        header('location:' . BASE_URL . 'login');
    }

    public function register()
    {
        $viewName = 'adminlte.auth.register';
        return $this->render($viewName, []);
    }

    public function storeUser()
    {
        $error = [];

        if ($_POST['name'] == '') {
            $error['name'] = 'Không được để trống';
        }
        if ($_POST['email'] == '') {
            $error['email'] = 'Không được để trống';
        }

        if ($_POST['phone'] <= 0) {
            $error['phone'] = 'Không được để trống';
        }

        if ($_POST['password'] <= 0) {
            $error['password'] = 'Không được để trống';
        }

        if ($_POST['repassword'] == '') {
            $error['repassword'] = 'Không được để trống';
        } elseif( $_POST['repassword'] != $_POST['password']) {
            $error['repassword'] = 'Mật khẩu không khớp';
        }


        if (empty($error)) {
            $user = new User();

            $user->name = $_POST['name'];
            $user->email = $_POST['email'];
            $user->phone = $_POST['phone'];
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $user->save();

            $_SESSION['flash_message_success'] = "Tạo tài khoản thành công";

            header('location:'. BASE_URL .'login');

        } else {
            $viewName = 'adminlte.auth.register';

            return $this->render($viewName, compact('error'));
        }
    }
}
