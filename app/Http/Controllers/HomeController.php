<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function home()
    {

        $orders = Order::with(['customer', 'products'])
            ->latest('id')
            ->paginate(2);

        // dd($orders);

        return view('home', compact('orders'));
    }

    public function create()
    {
        return view('create');
    }


    public function store(StoreOrderRequest $request)
    {
        // dd($request);
        DB::transaction(function () use ($request) {
            $supplier = Supplier::query()->create($request->suppliers);
            $customer = Customer::query()->create($request->customers);

            $orderDetails = []; //khai báo mảng để lưu trữ data trong order_details
            $totalAmount = 0;
            foreach ($request->products as $key => $product) {
                $product['supplier_id'] = $supplier->id;   //lấy ra id vừa thêm trong supplier

                if ($request->hasFile("products.$key.image")) {
                    $product['image'] = Storage::put('products', $request->file("products.$key.image"));
                }

                $tmp = Product::query()->create($product);

                $orderDetails[$tmp->id] = [
                    'qty' => $request->order_details[$key]['qty'],
                    'price' => $tmp->price
                ];

                $totalAmount += $request->order_details[$key]['qty'] * $tmp->price;
            }

            $order = Order::query()->create([
                "customer_id" => $customer->id,
                "total_amount" => $totalAmount
            ]);

            $order->products()->attach($orderDetails);
        });
        return redirect()
            ->route('home')
            ->with('success', "Thêm mới thành công");
    }

    public function edit($id)
    {
        $order = Order::with(['customer', 'products'])->find($id);
        return view('edit', compact('order'));
    }

    public function update($id, Request $request)
    {
        // dd($request->order_details);
        $order = Order::find($id);
        DB::transaction(function () use ($order, $request) {
            $order->products()->sync($request->order_details);

            $orderDetail = array_map(function ($item) {
                return $item['price'] * $item['qty'];
            }, $request->order_details);

            $totalAmount = array_sum($orderDetail);

            // dd($totalAmount);
            $order->update([
                'total_amount' => $totalAmount
            ]);
        });

        return redirect()->route('edit', $id)->with('susscess', "Sửa thành công");
    }

    public function delete($id)
    {
        $order = Order::find($id);
        DB::transaction(function () use ($order) {
            $order->products()->sync([]);

            $order->delete();
        }, 3);

        return back()->with('success', 'Xóa thành công!');
    }
}
