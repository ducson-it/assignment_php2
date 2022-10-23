<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Status;

class ProductController extends Controller
{
    public function index()
    {
        $viewName = 'adminlte.products.list';

        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';

        if (empty($keyword)) {
            $products = Product::all();
        } else {
            $products = Product::where('name', 'like', "%$keyword%")->get();
        }

        return $this->render($viewName, compact('products'));
    }

    public function create()
    {
        $viewName = 'adminlte.products.create';

        $categories = Category::all();

        $status = Status::all();

        return $this->render($viewName, compact('categories', 'status'));
    }

    public function store()
    {
        $error = [];

        if ($_POST['name'] == '') {
            $error['name'] = 'Không được để trống';
        }
        if ($_POST['price'] == '') {
            $error['price'] = 'Không được để trống';
        }
        if ($_POST['quantity'] == '') {
            $error['quantity'] = 'Không được để trống';
        }
        if ($_FILES['image']['size'] <= 0) {
            $error['image'] = 'Bạn chưa chọn ảnh';
        }

        if (empty($error)) {
            $product = new Product();
            $product->name = $_POST['name'];
            $product->price = (int) $_POST['price'];
            $product->status = (int) $_POST['status'];
            $product->category_id = (int) $_POST['category_id'];
            $product->quantity = (int) $_POST['quantity'];

            $fileName = ''; // giá trị mặc định
            $avatarFile = $_FILES['image']; // lấy file từ form đã submit
            if ($avatarFile['size'] > 0) { // nếu file có kích thước > 0 ~ có tồn tại
                $path = 'App/public/images/'; // định nghĩa đường dẫn lưu file
                $fileName = $path . uniqid() . '_' . $avatarFile['name']; // giá trị đường dẫn đến file để lưu vào DB
                move_uploaded_file($avatarFile['tmp_name'], $fileName); // lưu file (nội dung ở thuộc tính tmp_name) vào đường dẫn $fileName
            }
            $product->image_url = $fileName; // gán đường dẫn vào thuộc tính avatar

            $product->save();

            $_SESSION['flash_message'] = "Thêm thành công";

            header('location: ' . BASE_URL . 'admin/ds-san-pham');
        } else {
            $viewName = 'adminlte.products.create';

            $categories = Category::all();

            $status = Status::all();

            return $this->render($viewName, compact('error', 'categories', 'status'));
        }
    }

    public function show($id)
    {
        $viewName = 'adminlte.products.show';

        $product = Product::find($id);

        return $this->render($viewName, compact('product'));
    }

    public function edit($id)
    {
        $viewName = 'adminlte.products.edit';

        $product = Product::find($id);

        $categories = Category::all();

        $status = Status::all();

        return $this->render($viewName, compact('product', 'categories', 'status'));
    }

    public function update($id)
    {
        $error = [];

        if ($_POST['name'] == '') {
            $error['name'] = 'Không được để trống';
        }
        if ($_POST['price'] == '') {
            $error['price'] = 'Không được để trống';
        }

        if ($_POST['price'] <= 0) {
            $error['price'] = 'Phải là số dương';
        }

        if ($_POST['quantity'] <= 0) {
            $error['quantity'] = 'Phải là số dương';
        }

        if ($_POST['quantity'] == '') {
            $error['quantity'] = 'Không được để trống';
        }
        if ($_FILES['image']['size'] <= 0) {
            $error['image'] = 'Bạn chưa chọn ảnh';
        }

        if (empty($error)) {
            $product = Product::find($id);

            $product->name = $_POST['name'];
            $product->price = (int) $_POST['price'];
            $product->status = (int) $_POST['status'];
            $product->category_id = (int) $_POST['category_id'];
            $product->quantity = (int) $_POST['quantity'];

            $fileName = ''; // giá trị mặc định
            $avatarFile = $_FILES['image']; // lấy file từ form đã submit
            if ($avatarFile['size'] > 0) { // nếu file có kích thước > 0 ~ có tồn tại
                $path = 'App/public/images/'; // định nghĩa đường dẫn lưu file
                $fileName = $path . uniqid() . '_' . $avatarFile['name']; // giá trị đường dẫn đến file để lưu vào DB
                move_uploaded_file($avatarFile['tmp_name'], $fileName); // lưu file (nội dung ở thuộc tính tmp_name) vào đường dẫn $fileName
            }
            $product->image_url = $fileName; // gán đường dẫn vào thuộc tính avatar

            $product->save();

            $_SESSION['flash_message'] = "Cập nhật thành công";

            header('location: ' . BASE_URL . 'admin/ds-san-pham');
        } else {
            $viewName = 'adminlte.products.edit';

            $product = Product::find($id);

            $categories = Category::all();

            $status = Status::all();

            return $this->render($viewName, compact('product', 'categories', 'status', 'error'));
        }
    }

    public function destroy($id)
    {
        Product::destroy($id);

        $_SESSION['flash_message'] = "Xóa thành công";

        header('location: ' . BASE_URL . 'admin/ds-san-pham');
    }
}
