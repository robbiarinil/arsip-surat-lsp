<?php

namespace App\Http\Controllers;

use App\Models\KategoriSurat;
use Illuminate\Http\Request;

class KategoriSuratController extends Controller
{
    public function index()
    {
        $kategori = KategoriSurat::latest()->get();
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        $maxId = KategoriSurat::max('id');
        $nextId = $maxId ? $maxId + 1 : 1;

        return view('kategori.create', compact('nextId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:kategori_surat',
            'keterangan' => 'nullable',
        ]);

        KategoriSurat::create($request->only(['nama', 'keterangan']));

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kategori = KategoriSurat::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriSurat::findOrFail($id);

        $request->validate([
            'nama' => 'required|unique:kategori_surat,nama,' . $id,
            'keterangan' => 'nullable',
        ]);

        $kategori->update($request->only(['nama', 'keterangan']));

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kategori = KategoriSurat::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
