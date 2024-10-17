use App\Http\Controllers\BarangController;

Route::get('/barang', [BarangController::class, 'index'])->name('barang.index'); // Halaman daftar produk
Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create'); // Halaman tambah produk
Route::post('/barang/store', [BarangController::class, 'store'])->name('barang.store'); // Proses penyimpanan produk
Route::get('/barang/edit/{id}', [BarangController::class, 'edit'])->name('barang.edit'); // Halaman edit produk
Route::post('/barang/update/{id}', [BarangController::class, 'update'])->name('barang.update'); // Proses pembaruan produk
Route::post('/barang/destroy/{id}', [BarangController::class, 'destroy'])->name('barang.destroy'); // Proses penghapusan produk
