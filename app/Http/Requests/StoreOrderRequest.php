<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'suppliers.name' => 'required',
            'suppliers.address' => 'required',
            'suppliers.phone' => 'required|unique:customers,phone', //unique 2 tham số có nghĩa là ko muốn trùng trong bảng chỉ
            //định và cột trong bảng đó , ở đây là phone ko dc trùng với trường phone trong bảng customers
            'suppliers.email' => 'required|email|unique:customers,email',

            'customers.name' => 'required',
            'customers.address' => 'required',
            'customers.phone' => 'required|unique:customers,phone',
            'customers.email' => 'required|email|unique:customers,email',

            "products.*.price" => "required",
            "products.*.stock_qty" => "required",

            //Áp dụng cho các name khác theo dang products.0.name -> 0 tăng dần giống mảng products[0][name]
            'products.*.name' => 'required|unique:products,name',
            'products.*.image' => 'nullable|image|max:2048',
            'products.*.description' => 'nullable',
            'products.*.price' => 'required|integer|min:0',
            'products.*.stock_qty' => 'required|integer|min:0',

            // 'order_details' => 'array',
            // 'order_details.*' => 'array|required_array_keys:qty',
            'order_details.*.qty' => 'required|integer|min:0|lte:products.*.stock_qty',  //lte: là quy tắc 
            //phải nhỏ hơn hoặc bằng giá trị đặt ra , ở đây là giá trị của stock_qty trong product
        ];
    }

    public function messages()
    {
        return [
            "suppliers.name.required"        => ":attribute không được để trống",
            "suppliers.address.required"     => ":attribute không được để trống",
            "suppliers.phone.required"       => ":attribute không được để trống",
            "suppliers.email.required"       => ":attribute không được để trống",

            "suppliers.phone.unique"         => ":attribute bị trùng với số điện thoại khách hàng",

            "customers.name.required"        => ":attribute không được để trống",
            "customers.address.required"     => ":attribute không được để trống",
            "customers.phone.required"       => ":attribute không được để trống",
            "customers.email.required"       => ":attribute không được để trống",

            "customers.phone.unique"         => ":attribute đã tồn tại",

            "products.*.name.required"       => ":attribute không được để trống",
            "products.*.price.required"      => ":attribute không được để trống",
            "products.*.stock_qty.required"  => ":attribute không được để trống",

            'order_details.*.qty.required'   => ":atribute không được để trống",
            'order_details.*.qty.lte'        => ":atribute phải nhỏ hơn số lượng tồn kho"
        ];
    }

    public function attributes()
    {
        return [
            "suppliers.name"        => "Tên nhà cung cấp",
            "suppliers.address"     => "Địa chỉ nhà cung cấp",
            "suppliers.phone"       => "Số điện thoại nhà cung cấp",
            "suppliers.email"       => "Email nhà cung cấp",

            "customers.name"        => "Tên khách hàng",
            "customers.address"     => "Địa chỉ khách hàng",
            "customers.phone"       => "Số điện thoại khách hàng",
            "customers.email"       => "Email khách hàng",

            "products.*.name"       => "Tên sản phẩm",
            "products.*.price"      => "Giá sản phẩm",
            "products.*.stock_qty"  => "Số lượng tồn kho sản phẩm",

            "order_details.*.qty"   => "Số lượng bán"
        ];
    }
}
