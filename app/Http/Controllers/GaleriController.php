<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::all();
        return view('galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'type' => 'required|in:foto,video',
            'file_path' => 'required|file|mimes:jpeg,png,mp4|max:10240',
            'deskripsi' => 'nullable|string',
        ]);
    
        $filePath = $request->file('file_path')->store('galeri', 'public');
    
        Galeri::create([
            'judul' => $request->judul,
            'type' => $request->type,
            'file_path' => $filePath,
            'deskripsi' => $request->deskripsi,
        ]);
    
        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil ditambahkan!');
    }
    

    public function edit(Galeri $galeri)
    {
        return view('galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'type' => 'required|in:foto,video',
            'file' => 'nullable|file|mimes:jpeg,png,mp4|max:10240',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('file_path')) {
            if (Storage::exists('public/' . $galeri->file_path)) {
                Storage::delete('public/' . $galeri->file_path);
            }
            $galeri->file_path = $request->file('file_path')->store('galeri', 'public');
        }        

        $galeri->update([
            'judul' => $request->judul,
            'type' => $request->type,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diperbarui!');
    }

    public function destroy(Galeri $galeri)
    {
        if (Storage::exists('public/' . $galeri->file_path)) {
            Storage::delete('public/' . $galeri->file_path);
        }

        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil dihapus!');
    }

    public function show(Galeri $galeri)
    {
        return view('galeri.show', compact('galeri'));
    }

}