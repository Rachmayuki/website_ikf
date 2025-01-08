<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VisiMisiController extends Controller
{
    public function index()
    {
        $visiMisi = VisiMisi::first(); // Ambil data pertama

        // Jika belum ada data, arahkan ke halaman create
        if (!$visiMisi) {
            return redirect()->route('visi_misi.create')->with('info', 'Tambahkan data Visi Misi.');
        }

        // Jika data ada, tampilkan halaman index
        return view('VisiMisi.index', compact('visiMisi'));
    }

    public function create()
    {
        $visiMisi = VisiMisi::first();
    
        // Cegah admin mengakses halaman create jika data sudah ada
        if ($visiMisi) {
            return redirect()->route('visi_misi.index')->with('error', 'Data Visi Misi sudah ada dan hanya bisa ditambahkan sekali.');
        }
    
        return view('VisiMisi.create');
    }    

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'teks' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('visi_misi', 'public');
        }

        VisiMisi::create($data);

        return redirect()->route('visi_misi.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(VisiMisi $visiMisi)
    {
        return view('VisiMisi.show', compact('visiMisi'));
    }

    public function edit(VisiMisi $visiMisi)
    {
        return view('VisiMisi.edit', compact('visiMisi'));
    }

    public function update(Request $request, VisiMisi $visiMisi)
    {
        $request->validate([
            'judul' => 'required',
            'teks' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('gambar')) {
            if ($visiMisi->gambar && Storage::exists('public/' . $visiMisi->gambar)) {
                Storage::delete('public/' . $visiMisi->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('visi_misi', 'public');
        }

        $visiMisi->update($data);

        return redirect()->route('visi_misi.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(VisiMisi $visiMisi)
    {
        if ($visiMisi->gambar && Storage::exists('public/' . $visiMisi->gambar)) {
            Storage::delete('public/' . $visiMisi->gambar);
        }

        $visiMisi->delete();

        return redirect()->route('visi_misi.index')->with('success', 'Data berhasil dihapus.');
    }
}
