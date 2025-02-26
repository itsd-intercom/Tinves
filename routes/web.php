<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\Pos\NetworkingController;
use App\Http\Controllers\Pos\InventoryGa as PosInventoryGa;
use App\Http\Controllers\Pos\AdminController as PosAdminController;

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
    return view('auth.login');
});

Route::get('/users', function () {
    return view('Frontend.index');
})->name('users');

// Route::get('/search', [InventoryController::class, 'indexSearch'])->name('search.user');


Route::controller(FrontendController::class)->group(function () {
    Route::get('/users', 'index')->name('users')->middleware(['auth', 'verified']);
    Route::post('/request', 'RequestStore')->name('request');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout')->middleware(['auth', 'verified']);
    Route::get('/profile', 'profile')->name('admin.profile')->middleware('role:admin');
    Route::get('/editProfile', 'editProfile')->name('edit.profile')->middleware('role:admin , ga');
    Route::post('/storeProfile', 'storeProfile')->name('store.profile')->middleware('role:admin');
});

Route::controller(InventoryController::class)->group(function () {
    Route::get('/Inventaris-Add', 'InventarisAdd')->name('invetaris.add')->middleware('role:admin');
    Route::post('/Inventaris-store', 'InventarisStore')->name('invetaris.store')->middleware('role:admin');
    Route::get('/InventarisEdit-{id}', 'InventarisEdit')->name('inventaris.edit')->middleware('role:admin');
    Route::put('/InventarisUpdate/{id}', 'InventarisUpdate')->name('inventaris.update')->middleware('role:admin');
    Route::get('/InventarisDelete-{id}', 'InventarisDelete')->name('invetaris.delete')->middleware('role:admin');
    Route::get('/InventarisDetails-{id}', 'InventarisDetails')->name('invetaris.details');
    Route::get('/json', 'json')->name('json')->middleware('role:admin');
    Route::get('/index', 'index_json')->name('index_json')->middleware('role:admin');

    Route::get('/Inventaris-printer', 'inventoryPrinter')->name('invetaris.printer')->middleware('role:admin');
    Route::get('/printer-edit{id}', 'printer_edit')->name('printer.edit')->middleware('role:admin');
    Route::put('/printer-update{id}', 'printer_update')->name('printer.update')->middleware('role:admin');

    Route::get('/Inventaris-pc', 'inventoryPc')->name('invetaris.pc')->middleware('role:admin');
    Route::get('/Inventaris-ups', 'inventoryUps')->name('invetaris.ups')->middleware('role:admin');
    Route::get('/Inventaris-laptop', 'inventoryLaptop')->name('invetaris.laptop')->middleware('role:admin');

    Route::get('/Inventaris-peripheral', 'inventoryPeripheral')->name('invetaris.peripheral')->middleware('role:admin');
    Route::get('/peripheral-edit{id}', 'peripheral_edit')->name('peripheral.edit')->middleware('role:admin');

    Route::get('users-export', 'exportExcel')->name('users.export');
    Route::get('/filter-inventory', 'filterInventory')->name('filter.pc');

    Route::get('inventory/export', 'export')->name('inventory.export');

});


Route::controller(MasterController::class)->group(function () {
    Route::get('/jenis-all', 'jenisAll')->name('jenis.all')->middleware('role:admin');
    Route::get('/jenis-add', 'jenisAdd')->name('jenis.add')->middleware('role:admin');
    Route::post('/jenis-store', 'jenisStore')->name('jenis.store')->middleware('role:admin');
    Route::get('/jenis-delete{id}', 'jenisDelete')->name('jenis.delete')->middleware('role:admin');
    Route::get('/jenis-edit{id}', 'jenisEdit')->name('jenis.edit')->middleware('role:admin');
    Route::post('/jenisUpdate', 'jenisUpdate')->name('jenis.update')->middleware('role:admin');

    Route::get('/Divisi-All', 'divisiAll')->name('divisi.all')->middleware('role:admin');
    Route::get('/divisi-add', 'divisiAdd')->name('divisi.add')->middleware('role:admin');
    Route::post('/divisi-store', 'divisiStore')->name('divisi.store')->middleware('role:admin');
    Route::get('/divisi-delete{id}', 'divisiDelete')->name('divisi.delete')->middleware('role:admin');
    Route::get('/divisiEdit-{id}', 'divisiEdit')->name('divisi.edit')->middleware('role:admin');
    Route::post('/divisiUpdate', 'DivisiUpdate')->name('divisi.update')->middleware('role:admin');

    Route::get('/lokasi-All', 'lokasiAll')->name('lokasi.all')->middleware('role:admin');
    Route::get('/lokasi-add', 'lokasiAdd')->name('lokasi.add')->middleware('role:admin');
    Route::post('/lokasi-store', 'lokasiStore')->name('lokasi.store')->middleware('role:admin');
    Route::get('/lokasi-delete{id}', 'lokasiDelete')->name('lokasi.delete')->middleware('role:admin');
    Route::post('/lokasiUpdate', 'lokasiUpdate')->name('lokasi.update')->middleware('role:admin');
    Route::get('/lokasi-edit-{id}', 'lokasiEdit')->name('lokasi.edit')->middleware('role:admin');

    Route::get('/user-All', 'userAll')->name('user.all')->middleware('role:admin');
    Route::get('/user-Add', 'userAdd')->name('user.add')->middleware('role:admin');
    Route::post('/user-store', 'userStore')->name('user.store')->middleware('role:admin');
    Route::get('/user-delete{id}', 'userDelete')->name('user.delete')->middleware('role:admin');
    Route::get('/userEdit-{id}', 'userEdit')->name('user.edit')->middleware('role:admin');
    Route::PUT('/userUpdate', 'userUpdate')->name('user.update')->middleware('role:admin');
    Route::get('/userDetail-{id}', 'userDetails')->name('user.detail')->middleware('role:admin');
    Route::get('/search-users', 'searchUsers')->name('search')->middleware('role:admin');
});

Route::controller(HistoryController::class)->group(function () {
    Route::get('/request-all', 'HistoryAll')->name('request.all')->middleware('role:admin');
    Route::get('/request-add', 'RequestAdd')->name('request.add')->middleware('role:admin');
    Route::post('/request-store', 'RequestStore')->name('request.store')->middleware('role:admin');
    Route::get('/request-proses', 'RequestPending')->name('request.pending')->middleware('role:admin');
    Route::get('/history-proses-{id}', 'historyProses')->name('history.proses')->middleware('role:admin');
    Route::PUT('/history-update/{id}', 'historyUpdate')->name('history.update')->middleware('role:admin');
    Route::get('/history-approved-{id}', 'historyApprove')->name('history.approve')->middleware('role:admin');
    Route::get('/history-approved-Dsh/{id}', 'historyApproveDashboard')->name('history.approvedsh')->middleware('role:admin');
    Route::get('/get-jenis/{id}', 'getJenis')->name('getJenis')->middleware('role:admin');
});

Route::controller(NotesController::class)->group(function () {
    Route::get('/notes', 'notes')->name('notes')->middleware('role:admin');
    Route::get('/notes-server', 'notes_server')->name('notes-server')->middleware('role:admin');
    Route::get('/json', 'json')->name('json')->middleware('role:admin');
    Route::resource('notes', NotesController::class)->middleware('role:admin');
    Route::get('notes-all', 'index')->name('notes-json')->middleware('role:admin');
    Route::get('notesAdd', 'notesAdd')->name('notesAdd')->middleware('role:admin');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard')->middleware('role:admin');
});

// Route::controller(PosAdminController::class)->group(function () {
//     // Route::get('/admin', 'index')->name('admin')->middleware('role:admin');
//     Route::get('/json', 'json')->name('json')->middleware('role:admin');
//     Route::get('/index-admin', 'admin_json')->name('admin_json')->middleware('role:admin');
//     Route::post('/index-add', 'store')->name('admin.store')->middleware('role:admin');
//     Route::get('/index-edit/{id}', 'spk_edit')->name('admin.edit')->middleware('role:admin');

//     Route::get('/admin-pribadi', 'adminPribadi')->name('admin.pribadi')->middleware('role:admin');
//     Route::put('/admin-update-pribadi{id}', 'pribadi_update')->name('pribadi.update')->middleware('role:admin');

//     Route::get('/admin-perusahaan', 'adminPerusahaan')->name('admin.perusahaan')->middleware('role:admin');
//     Route::put('/admin-update{id}', 'perusahaan_update')->name('perusahaan.update')->middleware('role:admin');

//     // Route::get('/index-pengajuan', 'pengajuanAll')->name('pengajuan.json')->middleware('role:admin');
//     Route::get('/index-pengajuan', 'pengajuanAll')->name('pengajuan.all')->middleware('role:admin');
//     // Route::get('/pengajuan-edit', 'action')->name('pengajuan.edit')->middleware('role:admin');
//     Route::get('/pengajuan-add', 'pengajuanAdd')->name('pengajuan.add')->middleware('role:admin');
//     Route::post('/pengajuan-store', 'pengajuanStore')->name('pengajuan.store')->middleware('role:admin');
//     Route::get('/excel', 'pengajuanExcel')->name('pengajuan.excel')->middleware('role:admin');
//     Route::get('/report', 'report')->name('pengajuan.report')->middleware('role:admin');
// });

Route::controller(NetworkingController::class)->group(function () {
    Route::get('/wifi-all', 'WifiAll')->name('wifi.all')->middleware('role:admin');
    Route::get('/wifi-add', 'WifiAdd')->name('wifi.add')->middleware('role:admin');
    Route::post('/wifi-store', 'wifi_Store')->name('wifi.store')->middleware('role:admin');
    Route::get('/wifi-delete{id}', 'Wifi_delete')->name('wifi.delete')->middleware('role:admin');
    Route::get('/wifiEdit{id}', 'Wifi_edit')->name('wifi.edit')->middleware('role:admin');
    Route::put('/wifiUpdate{id}', 'Wifi_Update')->name('wifi.update')->middleware('role:admin');

    Route::get('/isp-all', 'IspAll')->name('isp.all')->middleware('role:admin');
    Route::get('/isp-add', 'ispAdd')->name('isp.add')->middleware('role:admin');
    Route::get('/isp-edit{id}', 'Ispedit')->name('isp.edit')->middleware('role:admin');
    Route::post('/isp-store', 'IspStore')->name('isp.store')->middleware('role:admin');
    Route::get('/isp-delete{id}', 'isp_delete')->name('isp.delete')->middleware('role:admin');
    Route::put('/isp-update{id}', 'isp_update')->name('isp.update')->middleware('role:admin');

    Route::get('/fc-all', 'fcAll')->name('fc.all')->middleware('role:admin');
    Route::get('/fc-add', 'fcAdd')->name('fc.add')->middleware('role:admin');
    Route::post('/fc-store', 'fcStore')->name('fc.store')->middleware('role:admin');
    Route::get('/fc-delete{id}', 'fc_delete')->name('fc.delete')->middleware('role:admin');
    Route::get('/fc-edit{id}', 'fc_edit')->name('fc.edit')->middleware('role:admin');
    Route::put('/fc-update{id}', 'fcupdate')->name('fc.update')->middleware('role:admin');

    Route::get('/vendor-all', 'vendorAll')->name('vendor.all')->middleware('role:admin');
    Route::get('/vendor-add', 'vendorAdd')->name('vendor.add')->middleware('role:admin');
    Route::post('/vendor-store', 'vendorStore')->name('vendor.store')->middleware('role:admin');
    Route::get('/vendor-delete{id}', 'vendor_delete')->name('vendor.delete')->middleware('role:admin');
    Route::get('/vendor-edit{id}', 'vendor_edit')->name('vendor_edit')->middleware('role:admin');
    Route::put('/vendor-update{id}', 'vendorupdate')->name('vendor.update')->middleware('role:admin');
});

Route::controller(CalendarController::class)->group(function () {
    Route::get('/fullcalender', 'index')->name('calendar')->middleware('role:admin');
    Route::POST('/fullcalenderAjax', 'ajax')->name('cal.store')->middleware('role:admin');
});
Route::controller(PosInventoryGa::class)->group(function () {
    //master barang
    Route::get('/index-barang', 'index')->name('barang.all')->middleware('role:admin');
    Route::post('/store', 'store')->name('barang.store')->middleware('role:admin');
    Route::get('/edit{id}', 'edit')->name('barang.edit')->middleware('role:admin');
    Route::get('/delete{id}', 'delete')->name('barang.delete')->middleware('role:admin');
    Route::put('/update{id}', 'update')->name('barang.update')->middleware('role:admin');


    //menu inventory
    Route::get('/inventory-barang-json', 'index_json')->name('all')->middleware('role:admin');
    Route::get('/inventory-barang', 'index_master')->name('index.all')->middleware('role:admin');
    Route::post('/inventory-add', 'inventory_store')->name('index.store')->middleware('role:admin');
    Route::get('/inventory-edit{id}', 'inventory_edit')->name('index.edit')->middleware('role:admin');
    Route::get('/inventory-delete{id}', 'inventory_delete')->name('index.delete')->middleware('role:admin');
    Route::put('/inventory-update{id}', 'inventory_update')->name('index.update')->middleware('role:admin');
});

Route::get('/api/events', [CalendarController::class, 'index']);

require __DIR__ . '/auth.php';

Auth::routes();
