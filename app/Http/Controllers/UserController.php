<?php

namespace App\Http\Controllers;

use App\Models\ProfilSejarah;

class UserController extends Controller
{
    public function index()
    {
        // Ambil data sejarah pertama (karena data hanya ada satu)
        $profilSejarah = ProfilSejarah::first();

        // Kirim data ke view
        return view('user.sejarah.index', compact('profilSejarah'));
    }
}

