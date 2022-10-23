@extends('adminlte.layouts.master')

@section('title', 'Chi tiết sản phẩm')

@section('content-title', 'Chi tiết sản phẩm')

@section('content')
    <section style="background-color: #eee;">
        <div class="container py-2">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <i class="fa-solid fa-circle-info"></i>
                    <div class="card text-black">
                        <i class="fa-solid fa-circle-info pt-3 pb-1 px-3"></i>
                        <img src="{{ BASE_URL.$product->image_url }}" class="card-img-top" alt="Apple Computer" />
                        <div class="card-body">
                              <div class="d-flex justify-content-between">
                                  <h3 class="card-title font-weight-bold">Thông tin sản phẩm</h3>
                              </div>
                                <div class="d-flex py-2 justify-content-between">
                                    <span class="font-weight-bold">Tên sản phẩm</span><span>{{ $product->name }}</span>
                                </div>
                                <div class="d-flex py-2 justify-content-between">
                                    <span class="font-weight-bold">Giá sản phẩm:</span><span>{{ $product->price }}</span>
                                </div>
                                <div class="d-flex py-2 justify-content-between">
                                    <span class="font-weight-bold">Số lượng:</span><span>{{ $product->quantity }}</span>
                                </div>
                                <div class="d-flex py-2 justify-content-between">
                                    <span class="font-weight-bold">Danh
                                        mục:</span><span>{{ $product->category->name }}</span>
                                </div>
                                <div class="d-flex py-2 justify-content-between">
                                    <span class="font-weight-bold">Trạng thái:</span><span>Còn hàng</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
