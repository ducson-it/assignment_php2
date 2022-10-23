@extends('adminlte.layouts.master')

@section('title', 'Trang chủ')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>5</h3>
                        <p>Tổng đơn</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>2</h3>
                        <p>Đã giao</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>2</h3>
                        <p>Chưa giao</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>65</h3>
                        <p>Tổng doanh thu tháng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Top 10 sản phẩm bán chạy nhất</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>123</td>
                        <td>11</td>
                        <td><span class="tag tag-success">23</span></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>tududu</td>
                        <td>12</td>
                        <td><span class="tag tag-warning">122</span></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>asss</td>
                        <td>12</td>
                        <td><span class="tag tag-primary">23</span></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Mike Doe</td>
                        <td>123</td>
                        <td><span class="tag tag-danger">123</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
