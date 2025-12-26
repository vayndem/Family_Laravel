<?php

namespace App\Http\Controllers;

use App\Models\KenanganKeluarga;
use App\Models\AnggotaKeluarga;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Menampilkan halaman utama dengan data kenangan.
     */
    public function index()
    {
        // 2. Ambil data kenangan (ini sudah ada)
        $kenangans = KenanganKeluarga::latest()->get();

        $anggotas = AnggotaKeluarga::orderBy('tingkatan', 'asc')->orderBy('urutan', 'asc')->get();

        // 4. KIRIM KEDUA DATA KE VIEW
        return view('welcome', [
            'kenangans' => $kenangans,
            'anggotas' => $anggotas,
        ]);
    }
}
