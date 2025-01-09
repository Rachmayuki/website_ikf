<?php

namespace App\Http\Controllers;

use App\Models\Artikel;

class UserArtikelController extends Controller
{
    public function home()
    {
        $artikel = Artikel::latest()->take(4)->get(); // Ambil 4 artikel terbaru
        return view('user.home.index', compact('artikel'));
    }

    public function show($id)
    {
        $artikel = Artikel::findOrFail($id); // Cari artikel berdasarkan ID
        return view('user.artikel.show', compact('artikel'));
    }
}
