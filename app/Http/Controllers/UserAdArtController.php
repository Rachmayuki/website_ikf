<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdArt;
use Illuminate\Http\Request;

class UserAdArtController extends Controller
{
    public function index()
    {
        $adArt = AdArt::first();
        return view('user.adArt.index', compact('adArt'));
    }
}
