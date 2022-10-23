@extends('adminlte.layouts.master')

@section('title', 'Danh sách khách hàng')

@section('content-title', 'Danh sách khách hàng')

@section('content')
    <div class="col-12">
        <div class="card">
            <?php
            if (isset($_SESSION['flash_message'])) {
                $message = '<div class="bg-success p-2 text-lg my-2 rounded">' . $_SESSION['flash_message'] . '</div>';
            } else {
                $message = '';
            }
            
            unset($_SESSION['flash_message']);
            echo $message;
            ?>
            <div class="card-header">
                <div class="card-title">
                    <a href="{{ BASE_URL }}admin/them-khach-hang" class="btn btn-primary btn-xs">
                        <i class="fas fa-plus p-2"></i>
                        Thêm khách hàng
                    </a>
                </div>
                <div class="card-tools">
                    <form action="{{ BASE_URL }}admin/ds-khach-hang" method="get">
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
                            <th scope="col">Tên khách hàng</th>
                            <th scope="col">Email</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $key => $customer)
                            <tr>
                                <td scope="row">{{ $key + 1 }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>
                                    @if ($customer->status == 1)
                                        <button class="btn btn-xs btn-primary">Kích hoạt</button>
                                    @else
                                        <button class="btn btn-xs btn-danger">Block</button>
                                    @endif
                                </td>
                                <td class="d-flex">
                                    <a class="btn btn-xs btn-warning m-2"
                                        href="{{ BASE_URL }}admin/cap-nhat-khach-hang/{{ $customer->id }}"><i
                                            class="fas fa-edit"></i> Edit</a>
                                    <a class="btn btn-xs btn-danger m-2"
                                        href="{{ BASE_URL }}admin/xoa-khach-hang/{{ $customer->id }}" onclick="return confirm('Bạn có muốn xóa?')"><i
                                            class="fas fa-trash-alt"></i> Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
