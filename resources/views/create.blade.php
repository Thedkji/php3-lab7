@extends('layouts.master')
@section('title', 'Create')

@section('content')
    <form action="{{ route('store') }}" method="POST" class="w-50 m-auto my-5 col-md-4" enctype="multipart/form-data">
        @csrf
        {{-- @if ($errors->any())
            <div class='alert alert-danger'>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <div class="row">
            <div class='col-md-6'>
                <h2>Nhà cung cấp</h2>
                <div>
                    <label for="" class="form-lable">Tên</label>
                    <input type="text" class="form-control" name="suppliers[name]" value="{{ old('suppliers.name') }}">
                    @if ($errors->has('suppliers.name'))
                        <div class="alert alert-danger mt-2">{{ $errors->first('suppliers.name') }}</div>
                    @endif
                </div>
                <div>
                    <label for="" class="form-lable">Địa chỉ</label>
                    <input type="text" class="form-control" name="suppliers[address]"
                        value="{{ old('suppliers.address') }}">
                    @if ($errors->has('suppliers.address'))
                        <div class="alert alert-danger mt-2">{{ $errors->first('suppliers.address') }}</div>
                    @endif
                </div>
                <div>
                    <label for="" class="form-lable">Số điện thoại</label>
                    <input type="number" class="form-control" name="suppliers[phone]" value="{{ old('suppliers.phone') }}">
                    @if ($errors->has('suppliers.phone'))
                        <div class="alert alert-danger mt-2">{{ $errors->first('suppliers.phone') }}</div>
                    @endif
                </div>
                <div>
                    <label for="" class="form-lable">Email</label>
                    <input type="text" class="form-control" name="suppliers[email]" value="{{ old('suppliers.email') }}">
                    @if ($errors->has('suppliers.email'))
                        <div class="alert alert-danger mt-2">{{ $errors->first('suppliers.email') }}</div>
                    @endif
                </div>
            </div>


            <div class='col-md-6'>
                <h2>Khách hàng</h2>
                <div>
                    <label for="" class="form-lable">Tên</label>
                    <input type="text" class="form-control" name="customers[name]" value="{{ old('customers.name') }}">
                    @if ($errors->has('customers.name'))
                        <div class="alert alert-danger mt-2">{{ $errors->first('customers.name') }}</div>
                    @endif
                </div>
                <div>
                    <label for="" class="form-lable">Địa chỉ</label>
                    <input type="text" class="form-control" name="customers[address]"
                        value="{{ old('customers.address') }}">
                    @if ($errors->has('customers.address'))
                        <div class="alert alert-danger mt-2">{{ $errors->first('customers.address') }}</div>
                    @endif
                </div>
                <div>
                    <label for="" class="form-lable">Số điện thoại</label>
                    <input type="number" class="form-control" name="customers[phone]"
                        value="{{ old('customers.phone') }}">
                    @if ($errors->has('customers.phone'))
                        <div class="alert alert-danger mt-2">{{ $errors->first('customers.phone') }}</div>
                    @endif
                </div>
                <div>
                    <label for="" class="form-lable">Email</label>
                    <input type="text" class="form-control" name="customers[email]"
                        value="{{ old('customers.email') }}">
                    @if ($errors->has('customers.email'))
                        <div class="alert alert-danger mt-2">{{ $errors->first('customers.email') }}</div>
                    @endif
                </div>
            </div>

            <div class='mb-3'></div>

            <h2>Sản phẩm</h2>
            @for ($i = 0; $i < 2; $i++)
                <div class='col-md-12'>
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Ảnh</th>
                            <th>Mô tả</th>
                            <th>Giá sản phẩm</th>
                            <th>Số lượng tồn kho</th>
                            <th>Số lượng bán</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="products[{{ $i }}][name]"
                                    value="{{ old('products.' . $i . '.name') }}">
                                @if ($errors->has('products.' . $i . '.name'))
                                    <div class="alert alert-danger mt-2">{{ $errors->first('products.' . $i . '.name') }}
                                    </div>
                                @endif
                            </td>
                            <td>
                                <input type="file" class="form-control" name="products[{{ $i }}][image]">
                                @if ($errors->has('products.' . $i . '.image'))
                                    <div class="alert alert-danger mt-2">{{ $errors->first('products.' . $i . '.image') }}
                                    </div>
                                @endif
                            </td>
                            <td>
                                <input type="text" class="form-control"
                                    name="products[{{ $i }}][description]"
                                    value="{{ old('products.' . $i . '.description') }}">
                                @if ($errors->has('products.' . $i . '.description'))
                                    <div class="alert alert-danger mt-2">
                                        {{ $errors->first('products.' . $i . '.description') }}</div>
                                @endif
                            </td>
                            <td>
                                <input type="number" class="form-control" name="products[{{ $i }}][price]"
                                    value="{{ old('products.' . $i . '.price') }}">
                                @if ($errors->has('products.' . $i . '.price'))
                                    <div class="alert alert-danger mt-2">{{ $errors->first('products.' . $i . '.price') }}
                                    </div>
                                @endif
                            </td>
                            <td>
                                <input type="number" class="form-control" name="products[{{ $i }}][stock_qty]"
                                    value="{{ old('products.' . $i . '.stock_qty') }}">
                                @if ($errors->has('products.' . $i . '.stock_qty'))
                                    <div class="alert alert-danger mt-2">
                                        {{ $errors->first('products.' . $i . '.stock_qty') }}</div>
                                @endif
                            </td>

                            <td>
                                <input type="number" class="form-control" name="order_details[{{ $i }}][qty]"
                                    value="{{ old('order_details.' . $i . '.qty') }}">
                                @if ($errors->has('order_details.' . $i . '.qty'))
                                    <div class="alert alert-danger mt-2">
                                        {{ $errors->first('order_details.' . $i . '.qty') }}</div>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            @endfor

        </div>

        <div class="my-3 ">
            <button type="submit" class="btn btn-primary w-100" name="btn-create">Thêm</button>
        </div>
    </form>
@endsection
