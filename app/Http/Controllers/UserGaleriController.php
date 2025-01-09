<?php

namespace App\Http\Controllers;

use App\Models\Galeri;

class UserGaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::all();
        return view('user.galeri.index', compact('galeri'));
    }
}
