@extends('adminlte.layouts.master')

@section('title', 'Cập nhật sản phẩm')

@section('content-title', 'Cập nhật sản phẩm')

@section('content')
    <div class="row mb-2">
        <div class="col-12">
            <div class="card card-primary">
                <form action="" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Tên khách hàng</label>
                            <input name="name" type="text" class="form-control" id="inputName"
                                placeholder="Tên khách hàng" value="Em yêu chị">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email khách hàng</label>
                            <input name="email" type="email" class="form-control" id="inputEmail"
                                placeholder="Email khách hàng" value="quandabao@sexy.com">
                        </div>
                        <div class="form-group">
                            <label for="inputPhone">Số điện thoại</label>
                            <input name="phone" type="number" class="form-control" id="inputPhone"
                                placeholder="Số điện thoại" value="0000000">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Tình trạng</label>
                            <select class="form-control" id="exampleFormControlSelect2">
                                <option>Còn zin</option>
                                <option>Mất zin</option>
                            </select>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật khách hàng</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection