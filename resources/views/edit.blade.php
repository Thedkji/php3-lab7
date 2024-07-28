@extends('layouts.master')

@section('title', 'Sửa')

@section('content')
    <div class="row m-auto w-75 m-auto">
        <div class="col-md-6">
            <h2>Tổng tiền</h2>
            <h3 class='text-success'>{{ $order->total_amount }}</h3>

            <h2>Khách hàng</h2>
            <ul class="">
                <li>{{ $order->customer->name }}</li>
                <li>{{ $order->customer->address }}</li>
                <li>{{ $order->customer->phone }}</li>
                <li>{{ $order->customer->email }}</li>
            </ul>
        </div>

        <div class="col-md-6">
            <h2>Danh sách sản phẩm</h2>
            <form action="{{ route('update', $order->id) }}" method="post">
                @csrf
                @method('PUT')

                @foreach ($order->products as $product)
                    <div>
                        <label class="form-label"><b>Tên sản phẩm:</b></label>
                        {{ $product->name }}
                    </div>

                    <div>
                        <label class="form-label"><b>Giá sản phẩm:</b></label>
                        {{ $product->price }}
                    </div>
                    <div>
                        <input type="hidden" value="{{ $product->price }}" name="order_details[{{ $product->id  }}][price]">
                    </div>

                    <div class="my-2">
                        <label class="form-label"><b>Số lượng bán</b></label>
                        <input type="number" name="order_details[{{  $product->id }}][qty]" class="form-control" value="{{ $product->pivot->qty }}">
                    </div>
                @endforeach
                <div>
                    <button type="submit" class="btn btn-primary my-4">Sửa</button>
                </div>
            </form>
        </div>
    </div>
@endsection
