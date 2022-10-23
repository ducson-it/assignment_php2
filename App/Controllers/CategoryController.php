<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Category;
use App\Models\Status;

class CategoryController extends Controller
{
    public function index()
    {
        $viewName = 'adminlte.categories.list';

        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';

        if (empty($keyword)) {
            $categories = Category::all();
        } else {
            $categories = Category::where('name', 'like', "%$keyword%")->get();
        }

        return $this->render($viewName, compact('categories'));
    }

    public function create()
    {
        $viewName = 'adminlte.categories.create';

        $status = Status::all();

        return $this->render($viewName, compact('status'));
    }

    public function store()
    {
        $error = [];

        if ($_POST['name'] == '') {
            $error['name'] = 'Không được để trống';
        }

        if (empty($error)) {
            $category = new Category();

            $category->name = $_POST['name'];

            $category->save();

            $_SESSION['flash_message'] = "Thêm danh mục thành công";

            header('location: ' . BASE_URL . 'admin/ds-danh-muc');
        } else {
            $viewName = 'adminlte.categories.create';

            $status = Status::all();

            return $this->render($viewName, compact('error', 'status'));
        }

    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $viewName = 'adminlte.categories.edit';

        $category = Category::find($id);
        
        $status = Status::all();

        return $this->render($viewName, compact('status','category'));
    }

    public function update($id)
    {
        $error = [];

        if ($_POST['name'] == '') {
            $error['name'] = 'Không được để trống';
        }

        if (empty($error)) {
            $category = Category::find($id);

            $category->name = $_POST['name'];

            $category->status = (int) $_POST['status'];

            $category->save();

            $_SESSION['flash_message'] = "Cập nhật danh mục thành công";

            header('location: ' . BASE_URL . 'admin/ds-danh-muc');
        } else {
            $viewName = 'adminlte.categories.create';

            $status = Status::all();

            return $this->render($viewName, compact('error', 'status'));
        }
    }

    public function destroy($id)
    {
        Category::destroy($id);

        $_SESSION['flash_message'] = "Xóa thành công";

        header('location: ' . BASE_URL . 'admin/ds-danh-muc');
    }
}
