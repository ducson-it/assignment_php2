@extends('adminlte.layouts.master')

@section('title', 'Thêm khách hàng')

@section('content-title', 'Thêm khách hàng')

@section('content')
    <div class="row mb-2">
        <div class="col-12">
            <div class="card card-primary">
                <form action="{{ BASE_URL }}admin/them-khach-hang" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Tên khách hàng</label>
                            <input name="name" type="text" class="form-control" id="inputName"
                                placeholder="Tên khách hàng">
                        </div>
                        @if (!empty($error['name']))
                            <div class="alert alert-danger">{{ $error['name'] }}</div>
                        @endif
                        <div class="form-group">
                            <label for="inputEmail">Email khách hàng</label>
                            <input name="email" type="email" class="form-control" id="inputEmail"
                                placeholder="Email khách hàng" >
                        </div>
                        @if (!empty($error['email']))
                            <div class="alert alert-danger">{{ $error['email'] }}</div>
                        @endif
                        <div class="form-group">
                            <label for="inputEmail">Mật khẩu khách hàng</label>
                            <input name="password" type="password" class="form-control" id="inputpassword"
                                placeholder="password khách hàng" >
                        </div>
                        @if (!empty($error['password']))
                            <div class="alert alert-danger">{{ $error['password'] }}</div>
                        @endif
                        <div class="form-group">
                            <label for="inputPhone">Số điện thoại</label>
                            <input name="phone" type="number" class="form-control" id="inputPhone"
                                placeholder="Số điện thoại">
                        </div>
                        @if (!empty($error['phone']))
                            <div class="alert alert-danger">{{ $error['phone'] }}</div>
                        @endif
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Tình trạng</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="status">
                                    @foreach ($status as $st)
                                        <option value="{{ $st->id }}">{{ $st->name }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Thêm khách hàng</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
