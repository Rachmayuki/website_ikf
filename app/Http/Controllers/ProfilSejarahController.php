<?php

namespace App\Http\Controllers;

use App\Models\ProfilSejarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilSejarahController extends Controller
{
    public function index()
    {
        $profilSejarah = ProfilSejarah::first(); // Ambil data pertama
    
        // Jika belum ada data, arahkan ke halaman create
        if (!$profilSejarah) {
            return redirect()->route('profil_sejarah.create')->with('info', 'Tambahkan data profil sejarah.');
        }
    
        // Jika data ada, tampilkan halaman index
        return view('profil_sejarah.index', compact('profilSejarah'));
    }

    public function create()
    {
        $profilSejarah = ProfilSejarah::first();

        // Cegah admin mengakses halaman create jika data sudah ada
        if ($profilSejarah) {
            return redirect()->route('profil_sejarah.index')->with('error', 'Data profil sejarah sudah ada dan hanya bisa ditambahkan sekali.');
        }

        return view('profil_sejarah.create');
    }

    public function store(Request $request)
    {
        $validated = $request -> validate([
            'judul' => 'required',
            'teks' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // validasi gambar
        ]);
    
        if ($request -> hasFile('gambar')) {
            // Menyimpan gambar ke folder public di storage
            $validated['gambar'] = $request -> file('gambar') -> store('profil_sejarah', 'public');
        }
    
        ProfilSejarah::create($validated);
        return redirect() -> route('profil_sejarah.index') -> with('success', 'Data berhasil ditambahkan');
    }

    public function show(ProfilSejarah $profilSejarah)
    {
        return view('profil_sejarah.show', compact('profilSejarah'));
    }

    public function edit(ProfilSejarah $profilSejarah)
    {
        return view('profil_sejarah.edit', compact('profilSejarah'));
    }

    public function update(Request $request, ProfilSejarah $profilSejarah)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'teks' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('gambar')) {
            if ($profilSejarah->gambar && Storage::exists('public/' . $profilSejarah->gambar)) {
                Storage::delete('public/' . $profilSejarah->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('profil_sejarah', 'public');
        }

        $profilSejarah->update($data);

        return redirect()->route('profil_sejarah.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(ProfilSejarah $profilSejarah)
    {
        if ($profilSejarah->gambar && Storage::exists('public/' . $profilSejarah->gambar)) {
            Storage::delete('public/' . $profilSejarah->gambar);
        }

        $profilSejarah->delete();

        return redirect()->route('profil_sejarah.index')->with('success', 'Data berhasil dihapus.');
    }
}
