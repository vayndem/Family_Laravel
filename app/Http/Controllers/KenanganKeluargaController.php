<?php

namespace App\Http\Controllers;

use App\Models\KenanganKeluarga;
use Illuminate\Http\Request;

class KenanganKeluargaController extends Controller
{
    /**
     * Menampilkan form untuk membuat kenangan baru.
     */
    public function create()
    {
        return view('admins.kenangan.create');
    }

    /**
     * Menyimpan kenangan baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'tanggal' => 'required|date',
            'keluarga' => 'required|string|max:100',
        ]);

        // Buat data baru
        KenanganKeluarga::create($request->all());

        // Redirect kembali ke dashboard dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Kenangan baru berhasil ditambahkan!');
    }

    /**
     * Menampilkan form untuk mengedit kenangan.
     */
    public function edit(KenanganKeluarga $kenangan)
    {
        return view('admins.kenangan.edit', compact('kenangan'));
    }

    /**
     * Mengupdate kenangan yang ada di database.
     */
    public function update(Request $request, KenanganKeluarga $kenangan)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'tanggal' => 'required|date',
            'keluarga' => 'required|string|max:100',
        ]);

        // Update data
        $kenangan->update($request->all());

        // Redirect kembali ke dashboard dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Kenangan berhasil diperbarui!');
    }

    /**
     * Menghapus SEMUA kenangan dari database.
     */
    public function destroyAll()
    {
        KenanganKeluarga::truncate(); // Menghapus semua record dengan efisien
        return redirect()->route('dashboard')->with('success', 'Semua kenangan berhasil dihapus!');
    }
}
