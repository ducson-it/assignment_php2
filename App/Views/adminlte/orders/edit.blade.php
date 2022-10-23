@extends('adminlte.layouts.master')

@section('title', 'Tạo đơn hàng')

@section('content-title', 'Tạo đơn hàng')

@section('content')
    <div class="row mb-2">
        <div class="col-12">
            <div class="card card-primary">
                <form action="{{ BASE_URL}}admin/cap-nhat-don-hang/{{ $order->id }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Khách hàng</label>
                            <select class="js-example-basic-single form-control" style="height: 50px" id="inputName"
                                name="user">
                                @foreach ($users as $user)
                                <option value="{{$user->id}}">{{ $user->name }} (ID: {{ $user->id }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">Ngày mua</label>
                            <input type="date" id="date" class="form-control" name="trip-start" />
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Trạng thái</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="status">
                                @foreach ($status as $stt)
                                <option value="{{$stt->id}}">{{ $stt->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật đơn hàng</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

    <script>
        const dateInput = document.getElementById('date');

        // ✅ Using the visitor's timezone
        dateInput.value = formatDate();

        console.log(formatDate());

        function padTo2Digits(num) {
            return num.toString().padStart(2, '0');
        }

        function formatDate(date = new Date()) {
            return [
                date.getFullYear(),
                padTo2Digits(date.getMonth() + 1),
                padTo2Digits(date.getDate()),
            ].join('-');
        }
    </script>
@endpush
