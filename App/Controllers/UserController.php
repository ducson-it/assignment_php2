<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Status;
use App\Models\StatusCustomer;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $viewName = 'adminlte.customers.list';

        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';

        if (empty($keyword)) {
            $customers = User::where('role_id', 2)->get();
        } else {
            $customers = User::where('name', 'like', "%$keyword%")->where('role_id', 2)->get();
        }

        return $this->render($viewName, compact('customers'));
    }

    public function create()
    {
        $viewName = 'adminlte.customers.create';

        $status = StatusCustomer::all();

        return $this->render($viewName, compact('status'));
    }

    public function store()
    {
        $error = [];

        if ($_POST['name'] == '') {
            $error['name'] = 'Không được để trống';
        }
        if ($_POST['email'] == '') {
            $error['email'] = 'Không được để trống';
        }
        if ($_POST['phone'] == '') {
            $error['phone'] = 'Không được để trống';
        }

        if (empty($error)) {
            $customer = new User();
            $customer->name = $_POST['name'];
            $customer->email = $_POST['email'];
            $customer->phone = $_POST['phone'];
            $customer->status = $_POST['status'];
            $customer->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $customer->role_id = 2;
            $customer->save();

            $_SESSION['flash_message'] = "Thêm khách hàng thành công";

            header('location: ' . BASE_URL . 'admin/ds-khach-hang');
        } else {
            $viewName = 'adminlte.customers.create';

            $customers = User::where('role_id', 2);

            $status = StatusCustomer::all();

            return $this->render($viewName, compact('error', 'customers', 'status'));
        }
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $viewName = 'adminlte.customers.edit';

        $customer = User::find($id);

        $status = StatusCustomer::all();

        return $this->render($viewName, compact('customer', 'status'));
    }

    public function update($id)
    {
        $error = [];

        if ($_POST['name'] == '') {
            $error['name'] = 'Không được để trống';
        }
        if ($_POST['email'] == '') {
            $error['email'] = 'Không được để trống';
        }
        if ($_POST['phone'] == '') {
            $error['phone'] = 'Không được để trống';
        }

        if (empty($error)) {
            $customer = User::find($id);
            $customer->name = $_POST['name'];
            $customer->email = $_POST['email'];
            $customer->phone = $_POST['phone'];
            $customer->status = $_POST['status'];
            $customer->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $customer->role_id = 2;
            $customer->save();

            $_SESSION['flash_message'] = "Cập nhật hàng thành công";

            header('location: ' . BASE_URL . 'admin/ds-khach-hang');
        } else {
            $viewName = 'adminlte.customers.edit';

            $customer = User::find($id);

            $status = StatusCustomer::all();

            return $this->render($viewName, compact('error', 'customer', 'status'));
        }
    }

    public function destroy($id)
    {
        User::destroy($id);

        $_SESSION['flash_message'] = "Xóa thành công";

        header('location: ' . BASE_URL . 'admin/ds-khach-hang');
    }
}
