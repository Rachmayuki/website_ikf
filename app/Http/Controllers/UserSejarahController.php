<?php

namespace App\Http\Controllers;

use App\Models\ProfilSejarah;

class UserSejarahController extends Controller
{
    public function index()
    {
        $profilSejarah = ProfilSejarah::first(); // Ambil data pertama dari tabel
        return view('user.sejarah.index', compact('profilSejarah'));
    }
}
