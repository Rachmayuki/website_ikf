<?php

namespace App\Http\Controllers;

use App\Models\AdArt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdArtController extends Controller
{
    public function index()
    {
        $adArt = AdArt::first(); // Ambil data pertama

        // Jika belum ada data, arahkan ke halaman create
        if (!$adArt) {
            return redirect()->route('ad_art.create')->with('info', 'Tambahkan data AD/ART.');
        }

        // Jika data ada, tampilkan halaman index
        return view('AD_ART.index', compact('adArt'));
    }


    public function create()
    {
        $adArt = AdArt::first();
    
        // Jika data sudah ada, cegah akses ke halaman create
        if ($adArt) {
            return redirect()->route('ad_art.index')->with('error', 'Data AD/ART sudah ada dan hanya bisa ditambahkan sekali.');
        }
    
        return view('AD_ART.create');
    }    

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'file' => 'nullable|mimes:pdf,doc,docx|max:2048', // Validasi file
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('ad_art', 'public');
        }

        AdArt::create($validated);

        return redirect()->route('ad_art.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(AdArt $adArt)
    {
        return view('AD_ART.show', compact('adArt'));
    }

    public function edit(AdArt $adArt)
    {
        return view('AD_ART.edit', compact('adArt'));
    }

    public function update(Request $request, AdArt $adArt)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'file' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('file')) {
            if ($adArt->file && Storage::exists('public/' . $adArt->file)) {
                Storage::delete('public/' . $adArt->file);
            }
            $validated['file'] = $request->file('file')->store('ad_art', 'public');
        }

        $adArt->update($validated);

        return redirect()->route('ad_art.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(AdArt $adArt)
    {
        if ($adArt->file && Storage::exists('public/' . $adArt->file)) {
            Storage::delete('public/' . $adArt->file);
        }

        $adArt->delete();

        return redirect()->route('ad_art.index')->with('success', 'Data berhasil dihapus.');
    }
}
