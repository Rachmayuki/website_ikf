<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasiController extends Controller
{
    public function index()
    {
        $data = StrukturOrganisasi::all();
        return view('struktur_organisasi.index', compact('data'));
    }

    public function create()
    {
        return view('struktur_organisasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('struktur_organisasi', 'public');
        }

        StrukturOrganisasi::create($data);

        return redirect()->route('struktur_organisasi.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(StrukturOrganisasi $strukturOrganisasi)
    {
        return view('struktur_organisasi.show', compact('strukturOrganisasi'));
    }

    public function edit(StrukturOrganisasi $strukturOrganisasi)
    {
        return view('struktur_organisasi.edit', compact('strukturOrganisasi'));
    }

    public function update(Request $request, StrukturOrganisasi $strukturOrganisasi)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($strukturOrganisasi->foto && Storage::exists('public/' . $strukturOrganisasi->foto)) {
                Storage::delete('public/' . $strukturOrganisasi->foto);
            }
            $data['foto'] = $request->file('foto')->store('struktur_organisasi', 'public');
        }

        $strukturOrganisasi->update($data);

        return redirect()->route('struktur_organisasi.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(StrukturOrganisasi $strukturOrganisasi)
    {
        if ($strukturOrganisasi->foto && Storage::exists('public/' . $strukturOrganisasi->foto)) {
            Storage::delete('public/' . $strukturOrganisasi->foto);
        }

        $strukturOrganisasi->delete();

        return redirect()->route('struktur_organisasi.index')->with('success', 'Data berhasil dihapus.');
    }
}
