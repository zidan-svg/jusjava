namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required|integer',
            'rasa' => 'required',
            'spesifikasi' => 'required',
            'keterangan' => 'nullable',
        ]);

        Barang::create($request->all());
        return redirect()->route('barang.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required|integer',
            'rasa' => 'required',
            'spesifikasi' => 'required',
            'keterangan' => 'nullable',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());
        return redirect()->route('barang.index.')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Produk berhasil dihapus.');
    }
}
