<?php

namespace App\Http\Controllers;

use App\Models\ProfilSejarah;

class UserController extends Controller
{
    public function index()
    {
        $profilSejarah = ProfilSejarah::first(); // Ambil data dari admin
        return view('user.sejarah.index', compact('profilSejarah'));
    }
}
