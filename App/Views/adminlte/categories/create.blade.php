@extends('adminlte.layouts.master')

@section('title', 'Thêm sản phẩm')

@section('content-title', 'Thêm sản phẩm')

@section('content')
    <div class="row mb-2">
        <div class="col-12">
            <div class="card card-primary">
                <form action="{{ BASE_URL }}admin/them-danh-muc" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Tên sản phẩm</label>
                            <input name="name" type="text" class="form-control" id="inputName"
                                placeholder="Tên sản phẩm">
                        </div>
                        @if (!empty($error['name']))
                            <div class="alert alert-danger">{{ $error['name'] }}</div>
                        @endif
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Trạng thái</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                @foreach ($status as $st)
                                    <option value="{{ $st->id }}">{{ $st->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Thêm danh mục</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
