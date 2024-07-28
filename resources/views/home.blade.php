@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <div class="text-end my-2">
        <button class="btn btn-success">
            <a href="{{ route('create') }}" class="text-white text-decoration-none">Thêm đơn hàng</a>
        </button>
    </div>
    <table class="table table-striped text-center">
        <h2 class="text-center mb-3">Đơn hàng</h2>
        <tr>
            <th>ID Đơn hàng</th>
            <th>Thông tin khách hàng</th>
            <th>Tổng tiền</th>
            <th>Ngày tạo</th>
            <th>Ngày cập nhật</th>
            <th>Sản phẩm</th>
            <th colspan="3">Thao tác</th>
        </tr>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>

                <td>
                    <ul>
                        <li>Tên :{{ $order->customer->name }}</li>
                        <li>Địa chỉ :{{ $order->customer->address }}</li>
                        <li>Số điện thoại :{{ $order->customer->phone }}</li>
                        <li>Email :{{ $order->customer->email }}</li>
                    </ul>
                </td>

                <td>{{ number_format($order->total_amount) }} VNĐ</td>

                <td>{{ $order->created_at }}</td>

                <td>{{ $order->updated_at }}</td>
                <td>
                    @foreach ($order->products as $product)
                        <ul>
                            <li>Tên :{{ $product->name }}</li>
                            <li>Ảnh :
                                @if ($product->image && \Storage::exists($product->image))
                                    <img width="100px" src="{{ env('APP_URL') }}/storage/{{ $product->image }}"
                                        alt="">
                                @endif
                            </li>
                            <li>Giá :{{ $product->price }}</li>
                            <li>Số lượng :{{ $product->pivot->qty }}</li>
                        </ul>
                    @endforeach
                </td>

                <td>
                    <button class="btn btn-warning">
                        <a href="{{ route('edit', $order->id) }}" class="text-decoration-none text-white">Sửa</a>
                    </button>
                </td>

                <td>
                    <form action="{{ route('delete', $order->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('Xóa ?')">
                            Xóa
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $orders->links() }}
@endsection
