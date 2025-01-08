<?php

namespace App\Http\Controllers;

use App\Models\Keanggotaan;
use Illuminate\Http\Request;

class KeanggotaanController extends Controller
{
    public function index()
    {
        $keanggotaan = Keanggotaan::all();
        return view('keanggotaan.index', compact('keanggotaan'));
    }

    public function create()
    {
        return view('keanggotaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
        ]);

        Keanggotaan::create($request->all());

        return redirect()->route('keanggotaan.index')->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function edit(Keanggotaan $keanggotaan)
    {
        return view('keanggotaan.edit', compact('keanggotaan'));
    }

    public function update(Request $request, Keanggotaan $keanggotaan)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
        ]);

        $keanggotaan->update($request->all());

        return redirect()->route('keanggotaan.index')->with('success', 'Data anggota berhasil diperbarui!');
    }

    public function destroy(Keanggotaan $keanggotaan)
    {
        $keanggotaan->delete();
        return redirect()->route('keanggotaan.index')->with('success', 'Anggota berhasil dihapus!');
    }

    public function show(Keanggotaan $keanggotaan)
    {
        return view('keanggotaan.show', compact('keanggotaan'));
    }

}
