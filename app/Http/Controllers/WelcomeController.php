<?php

namespace App\Http\Controllers;

use App\Models\KenanganKeluarga; // <-- Import model kita
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Menampilkan halaman utama dengan data kenangan.
     */
    public function index()
    {
        // Ambil semua data dari tabel kenangan, urutkan dari yang terbaru
        $kenangans = KenanganKeluarga::latest()->get();

        // Kirim data tersebut ke view 'welcome'
        return view('welcome', [
            'kenangans' => $kenangans
        ]);
    }
}
