<php
public function index()
{
    $products = Product::paginate(10); // Ambil data produk dengan paginasi
    return view('product', compact('products')); // Mengembalikan view 'product'
}
