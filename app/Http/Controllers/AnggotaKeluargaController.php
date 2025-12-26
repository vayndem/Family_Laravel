<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKeluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnggotaKeluargaController extends Controller
{
    /**
     * Menyimpan anggota keluarga baru dari modal dashboard.
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'foto' => 'required|url', // Kita pakai URL untuk foto
            'tingkatan' => 'required|integer|min:1',
            'urutan' => 'required|integer|min:1',
        ]);

        // Jika validasi gagal, kembalikan ke dashboard
        // dengan error dan 'buka' modal-nya lagi
        if ($validator->fails()) {
            return redirect()->route('dashboard')
                ->withErrors($validator, 'addAnggota') // Gunakan Error Bag 'addAnggota'
                ->withInput();
        }

        // Jika validasi berhasil, buat data baru
        AnggotaKeluarga::create($request->all());

        // Redirect kembali ke dashboard dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Anggota keluarga baru berhasil ditambahkan!');
    }
}
