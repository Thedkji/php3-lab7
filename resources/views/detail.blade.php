@extends('layouts.master')
@section('title', 'Detail')

@section('content')
    @foreach ($data as $order)
        @foreach ($order->products as $product)
            <form action="" method="post" class="w-50 m-auto my-5">
                <h2>Sản Phẩm</h2>
                <div>
                    <label for="" class="form-lable">ID Nhà cung cấp</label>
                    <input type="text" value="{{ $product->id }}" class="form-control" disabled>
                </div>
                <div>
                    <label for="" class="form-lable">Tên sản phẩm</label>
                    <input type="text" value="{{ $product->name_pro }}" class="form-control" disabled>
                </div>
                <div>
                    <label for="" class="form-lable">Mô tả</label>
                    <input type="text" value="{{ $product->description }}" class="form-control" disabled>
                </div>
                <div>
                    <label for="" class="form-lable">Giá sản phẩm</label>
                    <input type="text" value="{{ $product->price_pro }}" class="form-control" disabled>
                </div>
                <div>
                    <label for="" class="form-lable">Số lượng</label>
                    <input type="text" value="{{ $product->quantity }}" class="form-control" disabled>
                </div>
                <div>
                    <label for="" class="form-lable">Ngày tạo</label>
                    <input type="text" value="{{ $product->created_at }}" class="form-control" disabled>
                </div>
                <div>
                    <label for="" class="form-lable">Ngày cập nhật</label>
                    <input type="text" value="{{ $product->updated_at }}" class="form-control" disabled>
                </div>
            </form>
        @endforeach

        <form action="" method="post" class="w-50 m-auto my-5">
            <h2>Đơn hàng</h2>
            <div>
                <label for="" class="form-lable">ID Đơn hàng</label>
                <input type="text" value="{{ $order->id }}" class="form-control" disabled>
            </div>
            <div>
                <label for="" class="form-lable">ID khách hàng</label>
                <input type="text" value="{{ $order->customer_id }}" class="form-control" disabled>
            </div>
            <div>
                <label for="" class="form-lable">Tên khách hàng</label>

                <input type="text" value="{{ $dataCustomer->customer->name_cus }}" class="form-control" disabled>

            </div>
            <div>
                <label for="" class="form-lable">Tổng tiền</label>
                <input type="text" value="{{ $order->total_amount_ord }}" class="form-control" disabled>
            </div>
            <div>
                <label for="" class="form-lable">Ngày tạo</label>
                <input type="text" value="{{ $order->created_at }}" class="form-control" disabled>
            </div>
            <div>
                <label for="" class="form-lable">Ngày cập nhật</label>
                <input type="text" value="{{ $order->updated_at }}" class="form-control" disabled>
            </div>
        </form>
    @endforeach


@endsection
