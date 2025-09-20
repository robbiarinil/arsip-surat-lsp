<?php

namespace App\Http\Controllers;

use App\Models\ArsipSurat;
use App\Models\KategoriSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipSuratController extends Controller
{
    public function index(Request $request)
    {
        $query = ArsipSurat::with('kategori');

        if ($request->has('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('nomor_surat', 'like', '%' . $request->search . '%');
        }

        $arsip = $query->latest()->get();
        return view('arsip.index', compact('arsip'));
    }

    public function create()
    {
        $kategori = KategoriSurat::all();
        return view('arsip.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|unique:arsip_surat',
            'kategori_id' => 'required|exists:kategori_surat,id',
            'judul' => 'required',
            'file_surat' => 'required|mimes:pdf|max:2048',
        ]);

        $filePath = $request->file('file_surat')->store('arsip', 'public');

        ArsipSurat::create([
            'nomor_surat' => $request->nomor_surat,
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'file_surat' => $filePath,
        ]);

        return redirect()->route('arsip.index')->with('success', 'Data berhasil disimpan');
    }

    public function show($id)
    {
        $arsip = ArsipSurat::with('kategori')->findOrFail($id);
        return view('arsip.show', compact('arsip'));
    }

    public function download($id)
    {
        $arsip = ArsipSurat::findOrFail($id);
        $filePath = storage_path('app/public/' . $arsip->file_surat);

        if (!file_exists($filePath)) {
            return back()->with('error', 'File tidak ditemukan.');
        }

        return response()->download($filePath, $arsip->judul . '.pdf');
    }

    public function destroy($id)
    {
        $arsip = ArsipSurat::findOrFail($id);

        if ($arsip->file_surat && file_exists(storage_path('app/public/' . $arsip->file_surat))) {
            unlink(storage_path('app/public/' . $arsip->file_surat));
        }

        $arsip->delete();

        return redirect()->route('arsip.index')
                         ->with('success', 'Arsip surat berhasil dihapus!');
    }

    public function edit($id)
    {
        $arsip = ArsipSurat::findOrFail($id);
        return view('arsip.edit', compact('arsip'));
    }

    public function update(Request $request, $id)
    {
        $arsip = ArsipSurat::findOrFail($id);

        $request->validate([
            'nomor_surat' => 'required|string',
            'kategori_id' => 'required|integer',
            'judul' => 'required|string',
            'file_surat' => 'nullable|mimes:pdf|max:2048',
        ]);

        $arsip->nomor_surat = $request->nomor_surat;
        $arsip->kategori_id = $request->kategori_id;
        $arsip->judul = $request->judul;

        if ($request->hasFile('file_surat')) {
            if ($arsip->file_surat && Storage::exists('public/'.$arsip->file_surat)) {
                Storage::delete('public/'.$arsip->file_surat);
            }
            $path = $request->file('file_surat')->store('arsip', 'public');
            $arsip->file_surat = $path;
        }

        $arsip->save();

        return redirect()->route('arsip.show', $arsip->id)
                         ->with('success', 'Arsip berhasil diperbarui.');
    }
}
