@extends('adminlte.layouts.master')

@section('title', 'Danh sách sản phẩm')

@section('content-title', 'Danh sách sản phẩm')

@section('content')
    <div class="col-12">
        <?php
          if (isset($_SESSION['flash_message'])) {
            $message = '<div class="bg-success p-2 text-lg my-2 rounded">' . $_SESSION['flash_message'] . '</div>';
          } else {
             $message = '';
          }

          unset($_SESSION['flash_message']);
          echo $message;
        ?>
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <a href="{{ BASE_URL }}admin/them-san-pham" class="btn btn-primary btn-xs">
                        <i class="fas fa-plus p-2"></i>
                        Thêm sản phẩm
                    </a>
                </div>
                <div class="card-tools">
                    <form action="{{ BASE_URL }}admin/ds-san-pham" method="get">
                        <div class="input-group input-group-sm p-2" style="width: 150px;">
                            <input type="text" name="keyword" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Giá sản phẩm</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $index => $product)
                            <tr>
                                <td scope="row">{{ $index + 1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td><img width="100%" src="{{ BASE_URL.$product->image_url }}" alt="product-image"></td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->category_id }}</td>
                                <td>
                                    @if ($product->status == 0)
                                        <button class="btn btn-xs btn-primary">Còn hàng</button>
                                    @else
                                        <button class="btn btn-xs btn-danger">Hết hàng</button>
                                    @endif
                                </td>
                                <td class="d-flex">
                                    <a class="btn btn-xs btn-warning m-2"
                                        href="{{ BASE_URL }}admin/cap-nhat-san-pham/{{ $product->id }}"><i
                                            class="fas fa-edit"></i> Edit</a>
                                    <a class="btn btn-xs btn-danger m-2"
                                        href="{{ BASE_URL }}admin/xoa-san-pham/{{ $product->id }}" onclick="return confirm('Bạn có muốn xóa?')"><i
                                            class="fas fa-trash-alt"></i> Delete</a>
                                    <a class="btn btn-xs btn-primary m-2"
                                        href="{{ BASE_URL }}admin/chi-tiet-san-pham/{{ $product->id }}"><i
                                            class="fas fa-eye"></i></i> Chi tiết sản phẩm</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
