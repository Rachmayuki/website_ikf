<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;

class UserVisiMisiController extends Controller
{
    public function index()
    {
        $visiMisi = VisiMisi::first(); //Ambil data pertama dari tabel
        return view('user.visimisi.index', compact('visiMisi'));
    }
}
