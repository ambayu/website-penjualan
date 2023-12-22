<?php

use App\Models\Menu;
use App\Models\invoice;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TampilanControlleer;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheffController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\laporanController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SendEmail;
use App\Http\Controllers\WaitinglistController;
use App\Models\Bestfood;
use App\Models\Biodata;
use App\Models\dashboard;
use App\Models\ourblog;
use App\Models\slidephoto;
use App\Models\testimoni;
use App\Models\ppn;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "menu" => menu::all(),
        'slidepoto' => slidephoto::all(),
        'bestfood' => Bestfood::all(),
        'about' => Biodata::first(),
        'our' => ourblog::all(),
        'testimoni' => testimoni::all(),
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        'about' => Biodata::first(),
        'bestfood' => Bestfood::all(),


    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        "title" => "Contact",
        'about' => Biodata::first(),
    ]);
});

Route::get('/recipe', function () {
    return view('recipe', [
        "title" => "Recipe",
        "menu" => Menu::all(),
        'about' => Biodata::first(),
    ]);
});

Route::get('/print', function () {
    $invoice = invoice::first()['invoice'];

    $purchases = transaksi::join('menus as a', 'menu_id', '=', 'a.id')
        ->join('invoices', 'transaksis.invoice', '=', 'invoices.invoice')
        ->selectRaw('a.harga ,transaksis.*, sum(a.harga * transaksis.jumlah) as tb');

    return view('print', [
        "title" => "Recipe",
        'menu' => transaksi::where('invoice', $invoice)->get(),
        'ppn' => ppn::where('invoice', $invoice)->first(),
        'total' => $purchases->get(),
    ]);
});

Route::get('/edit_print', function (Request $id) {
    $invoice = $id->inv;

    $sum = transaksi::where('invoice', $invoice)->join('menus as a', 'menu_id', '=', 'a.id')

        ->selectRaw('a.harga ,transaksis.*, sum(a.harga * transaksis.jumlah) as tb');

    return view('print', [
        "title" => "Recipe",
        'menu' => transaksi::where('invoice', $invoice)->get(),
        'total' => $sum->get(),
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        "title" => "Dashboard",
        'dashboard' => dashboard::first(),
    ]);
})->middleware('auth');

Route::get('/blog', function () {
    return view('blog', [
        "title" => "Blog",
        'our' => ourblog::all(),
        'about' => Biodata::first(),
    ]);
});
Route::post('kasir/delAll', [KasirController::class, 'delAll']);
Route::post('kasir/ppn', [KasirController::class, 'ppn']);
// Route::get('/account', [PostController::class, 'account'])->middleware('auth');
Route::resource('/account', UserController::class)->parameters([
    'account' => 'user',
])->middleware('auth');

Route::get('/add_menu/checkSlug', [MenuController::class, 'checkSlug'])->middleware('auth');

Route::resource('/add_menu', MenuController::class)->parameters([
    'add_menu' => 'menu',
])->middleware('auth');

Route::resource('/add_category', CategoryController::class)->middleware('auth');

Route::resource('/kasir', KasirController::class)->middleware('auth');

Route::post('/waiting_list/antar', [WaitinglistController::class, 'antar']);
Route::resource('/waiting_list', WaitinglistController::class)->middleware('auth');
Route::resource('/cheff', CheffController::class)->middleware('auth');

Route::get('/laporan', [laporanController::class, 'index'])->middleware('auth');
Route::get('/laporanrekap', [laporanController::class, 'laporanrekap'])->middleware('auth');
// Route::get('/create_menu', function () {
//     return view('crud.create_add_menu', [
//         "title" => "Add Menu",
//     ]);
// });
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [LoginController::class, 'register'])->middleware('guest');

Route::post('/register', [LoginController::class, 'store']);

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::resource('/receipt', ReceiptController::class)->middleware('auth');


Route::get('/tampilan', [TampilanControlleer::class, 'index'])->middleware('auth');

Route::get('/tampilan/ourblog', [TampilanControlleer::class, 'ourblog'])->middleware('auth');

Route::post('/tampilan/ourblogsave', [TampilanControlleer::class, 'ourblogsave'])->middleware('auth');
Route::post('/tampilan/ourblogedit', [TampilanControlleer::class, 'ourblogedit'])->middleware('auth');
Route::get('/tampilan/ourblogdelete/{ourblog:id}', [TampilanControlleer::class, 'ourblogdelete'])->middleware('auth');

Route::get('/tampilan/slidepoto', [TampilanControlleer::class, 'slidepoto'])->middleware('auth');

Route::post('/tampilan/slidepotosave', [TampilanControlleer::class, 'slidepotosave'])->middleware('auth');
Route::post('/tampilan/slidepotoedit', [TampilanControlleer::class, 'slidepotoedit'])->middleware('auth');
Route::get('/tampilan/slidepotodelete/{ourblog:id}', [TampilanControlleer::class, 'slidepotodelete'])->middleware('auth');

Route::get('/tampilan/testimoni', [TampilanControlleer::class, 'testimoni'])->middleware('auth');

Route::post('/tampilan/testimonisave', [TampilanControlleer::class, 'testimonisave'])->middleware('auth');
Route::post('/tampilan/testimoniedit', [TampilanControlleer::class, 'testimoniedit'])->middleware('auth');
Route::get('/tampilan/testimonidelete/{ourblog:id}', [TampilanControlleer::class, 'testimonidelete'])->middleware('auth');

Route::get('/tampilan/bestfood', [TampilanControlleer::class, 'bestfood'])->middleware('auth');

Route::post('/tampilan/bestfoodsave', [TampilanControlleer::class, 'bestfoodsave'])->middleware('auth');
Route::post('/tampilan/bestfoodedit', [TampilanControlleer::class, 'bestfoodedit'])->middleware('auth');
Route::get('/tampilan/bestfooddelete/{ourblog:id}', [TampilanControlleer::class, 'bestfooddelete'])->middleware('auth');

Route::get('/tampilan/dashboard', [TampilanControlleer::class, 'dashboard'])->middleware('auth');
Route::post('/tampilan/dashboardedit', [TampilanControlleer::class, 'dashboardedit'])->middleware('auth');

Route::get('/tampilan/biodata', [TampilanControlleer::class, 'biodata'])->middleware('auth');

Route::post('/tampilan/biodataedit', [TampilanControlleer::class, 'biodataedit'])->middleware('auth');

Route::post('/request', [SendEmail::class, 'index']);
