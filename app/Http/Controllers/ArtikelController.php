<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::all();
        return view('artikel.index', compact('artikel'));
    }

    public function create()
    {
        return view('artikel.create');
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
            $validated['gambar'] = $request -> file('gambar') -> store('artikel', 'public');
        }
    
        Artikel::create($validated);
        return redirect() -> route('artikel.index') -> with('success', 'Data berhasil ditambahkan');
    }

    public function show(Artikel $artikel)
    {
        return view('artikel.show', compact('artikel'));
    }

    public function edit(Artikel $artikel)
    {
        return view('artikel.edit', compact('artikel'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'teks' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('gambar')) {
            if ($artikel->gambar && Storage::exists('public/' . $artikel->gambar)) {
                Storage::delete('public/' . $artikel->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('artikel', 'public');
        }

        $artikel->update($data);

        return redirect()->route('artikel.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Artikel $artikel)
    {
        if ($artikel->gambar && Storage::exists('public/' . $artikel->gambar)) {
            Storage::delete('public/' . $artikel->gambar);
        }

        $artikel->delete();

        return redirect()->route('artikel.index')->with('success', 'Data berhasil dihapus.');
    }
}
