<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;

class UserStrukturOrganisasiController extends Controller
{
    public function index()
    {
        $strukturOrganisasi = StrukturOrganisasi::all();
        return view('user.strukturOrganisasi.index', compact('strukturOrganisasi'));
    }
}
