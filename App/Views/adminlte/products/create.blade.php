@extends('adminlte.layouts.master')

@section('title', 'Thêm sản phẩm')

@section('content-title', 'Thêm sản phẩm')

@section('content')
    <div class="row mb-2">
        <div class="col-12">
            <div class="card card-primary">
                <form action="{{ BASE_URL }}admin/them-san-pham" enctype="multipart/form-data" method="POST">
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
                            <label for="inputImage">Hình ảnh</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="inputImage"
                                        aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            @if (!empty($error['image']))
                                <div class="alert alert-danger">{{ $error['image'] }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="inputPrice">Giá sản phẩm</label>
                            <input name="price" type="number" class="form-control" id="inputPrice"
                                placeholder="Giá sản phẩm">
                        </div>
                        @if (!empty($error['price']))
                            <div class="alert alert-danger">{{ $error['price'] }}</div>
                        @endif
                        <div class="form-group">
                            <label for="inputQuantity">Số lượng</label>
                            <input name="quantity" type="number" class="form-control" id="inputQuantity"
                                placeholder="Số lượng sản phẩm">
                        </div>
                        @if (!empty($error['quantity']))
                            <div class="alert alert-danger">{{ $error['quantity'] }}</div>
                        @endif
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Loại hàng</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Trạng thái</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="status">
                                @foreach ($status as $st)
                                    <option value="{{ $st->id }}">{{ $st->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
