<?php

use App\Http\Controllers\HomeController;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     $orders = Order::find(1);


//     // dd($orders->products()->sync([2, 3, 4])); //tạo ra 1 mảng có id product = 2 , 3 ,4
//     //có rồi thì giữ lại , ko có thì xóa đi //ở đây 2 3 có data nên 4 bị cúc

//     //Trong trường hợp thêm dữ liệu có trong bảng là 5 chả hạn id product là 5 có data thì khi sync sẽ thêm vào bảng trung gian
//     //nhưng ko có data pivot

//     //Lưu ý là ko thêm các id ko tồn tại trong bảng liên kết ko là detach full data

//     dd($orders->products()->toggle([4])); //có rồi thì xóa đi chưa có thì thêm vào
//     //lưu ý data phải tồn tại ko tồn tại là bay hết

//     //*attach : thêm id vào , nếu chưa có thì thêm , có rồi thì ko thêm //! data phải có dữ liệu mới thêm dc hoặc phải tồn tại 

//     //*detach : xóa id , nếu chưa có thì chả sao có rồi thì xóa 

//     //*sync : đồng bộ dữ liệu , có rồi thì giữ lại , ko có thì thêm vào 
//     //! lưu ý : đối với sync là data phải tồn tại bên bảng liên kết , nếu ko là sẽ bị xóa hết data ví dụ 2 có mà 4 ko 
//     //! tồn tại trong bảng liên kết thì 2 giữ lại 4 xóa , nếu viết mỗi 4 thì ko tìm thấy => xóa hết data

//     //*toggle : có rồi thì xóa , chưa có thì thêm vào 

// })->name('home');


Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/create', [HomeController::class, 'create'])->name('create');
Route::post('/store', [HomeController::class, 'store'])->name('store');

Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [HomeController::class, 'update'])->name('update');

Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail');

Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('delete');


// Route::get('client/create', [HomeController::class, 'create'])->name('create');
// Route::post('client/store', [HomeController::class, 'store'])->name('store');

// Route::prefix('client')
//     ->controller(HomeController::class)
//     ->as('client.')
//     ->group(function () {
//         Route::get('create', 'create')->name('create');
//         Route::get('edit', 'edit')->name('edit');
//     });
