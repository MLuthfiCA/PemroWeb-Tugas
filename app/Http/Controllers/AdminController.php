use App\Models\Buku;

public function profile()
{
    $bukuDipinjam = Buku::where('status', 'Dipinjam')->get();

    return view('profile', compact('bukuDipinjam'));
}