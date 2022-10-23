<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Order;
use App\Models\StatusOrder;
use App\Models\User;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        $viewName = 'adminlte.orders.list';

        $orders = Order::all();

        return $this->render($viewName, compact('orders'));
    }

    public function create()
    {
        $viewName = 'adminlte.orders.create';

        $orders = Order::all();
        $status = StatusOrder::all();
        $users = User::all();
        $products = Product::all();

        return $this->render($viewName, compact('orders','status','users','products'));
    }

    public function store() {
        $order = new Order();

        $order->user_id = $_POST['user'];
        $order->product_id = $_POST['product'];
        $order->status = $_POST['status'];
        $order->date = $_POST['trip-start'];
        $order->save();
        $_SESSION['flash_message'] = "Thêm đơn thành công";

        header('location: ' . BASE_URL . 'admin/ds-don-hang');
    }

    public function show($id)
    {
        $viewName = 'adminlte.orders.detail';

        $order = Order::find($id)->products()->get();

        return $this->render($viewName, compact('order'));
    }

    public function edit($id)
    {
        $viewName = 'adminlte.orders.edit';

        $order = Order::find($id);
        $status = StatusOrder::all();
        $users = User::all();
        $products = Product::all();

        return $this->render($viewName, compact('order','status','users','products'));
    }

    public function update($id)
    {
        $order = Order::find($id);

        $order->user_id = $_POST['user'];
        $order->product_id = $_POST['product'];
        $order->status = $_POST['status'];
        $order->date = $_POST['trip-start'];
        $order->save();
        $_SESSION['flash_message'] = "Cập nhật thành công";

        header('location: ' . BASE_URL . 'admin/ds-don-hang');
    }

    public function destroy($id)
    {
        Order::destroy($id);

        $_SESSION['flash_message'] = "Xóa thành công";

        header('location: ' . BASE_URL . 'admin/ds-don-hang');
    }
}
