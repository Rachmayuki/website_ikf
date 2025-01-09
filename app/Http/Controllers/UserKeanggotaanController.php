<?php

namespace App\Http\Controllers;

use App\Models\Keanggotaan;

class UserKeanggotaanController extends Controller
{
    public function index()
    {
        // Ambil hanya nama lengkap dan jenis kelamin dari data keanggotaan
        $keanggotaan = Keanggotaan::select('nama_lengkap', 'jenis_kelamin')->get();

        return view('user.keanggotaan.index', compact('keanggotaan'));
    }
}
