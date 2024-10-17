namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index() {
        // Ambil data yang dibutuhkan untuk laporan
        return view('laporans.index');
    }
}
