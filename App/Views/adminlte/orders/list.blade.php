@extends('adminlte.layouts.master')

@section('title', 'Danh sách đơn hàng')

@section('content-title', 'Danh sách đơn hàng')

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
                <a href="{{ BASE_URL }}admin/them-don-hang" class="btn btn-primary btn-xs">
                    <i class="fas fa-plus p-2"></i>
                    Thêm đơn hàng
                </a>
            </div>
            {{-- <div class="card-tools">
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
            </div> --}}
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Ngày mua</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $order)
                    <tr>
                        <td scope="row">{{ $key + 1 }}</td>
                        <td>{{ $order->user->name }} (ID: {{ $order->user->id }})</td>
                        <td>{{ $order->date }}</td>
                        <td>
                                @if ($order->status == 0)
                                    <button class="btn btn-xs btn-primary">Đã giao</button>
                                @else
                                    <button class="btn btn-xs btn-danger">Chưa giao</button>
                                @endif
                        </td>
                        <td class="d-flex">
                            <a class="btn btn-xs btn-primary m-2" href="{{ BASE_URL }}admin/chi-tiet-don-hang/{{ $order->id }}"><i class="fas fa-edit"></i>Chi tiết đơn hàng</a>
                            <a class="btn btn-xs btn-warning m-2" href="{{ BASE_URL }}admin/cap-nhat-don-hang/{{ $order->id }}"><i class="fas fa-edit"></i> Edit</a>
                            <a class="btn btn-xs btn-danger m-2" href="{{ BASE_URL }}admin/xoa-don-hang/{{ $order->id }}" onclick="return confirm('Bạn có muốn xóa không?')"><i class="fas fa-trash-alt"></i> Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
