<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilSejarah extends Model
{
    use HasFactory;

    protected $table = 'profil_sejarah';

    protected $fillable = [
        'judul',
        'teks',
        'gambar',
    ];
}
