@extends('adminlte.layouts.master')

@section('title', 'Danh sách đơn hàng')

@section('content-title', 'Danh sách đơn hàng')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <a href="" class="btn btn-primary btn-xs">
                    <i class="fas fa-plus p-2"></i>
                    Thêm đơn hàng
                </a>
            </div>
            <div class="card-tools">
                <form action="" method="get">
                    <div class="input-group input-group-sm p-2" style="width: 150px;">
                        <input type="text" name="name" class="form-control float-right" placeholder="Search">
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
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Ngày mua</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">1</td>
                        <td>Alabama (ID: 212)</td>
                        <td>Áo lót da báo (ID: 212)</td>
                        <td>2022/06/10</td>
                        <td><button class="btn btn-xs btn-primary">Đã giao</button></td>
                        <td class="d-flex">
                            <a class="btn btn-xs btn-warning m-2" href="{{ BASE_URL }}cap-nhat-don-hang/1"><i class="fas fa-edit"></i> Edit</a>
                            <a class="btn btn-xs btn-danger m-2" href="{{ BASE_URL }}xoa-don-hang/1"><i class="fas fa-trash-alt"></i> Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
