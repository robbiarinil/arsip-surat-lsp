@extends('layouts.app')

@section('content')
    <h2>Edit Arsip Surat</h2>

    <form action="{{ route('arsip.update', $arsip->id) }}" method="POST" enctype="multipart/form-data" style="max-width: 600px;">
        @csrf
        @method('PUT')

        {{-- Nomor Surat --}}
        <div class="mb-3">
            <label for="nomor_surat" class="form-label">Nomor Surat</label>
            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat"
                   value="{{ old('nomor_surat', $arsip->nomor_surat) }}" required>
        </div>

        {{-- Kategori --}}
        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori</label>
            <select name="kategori_id" id="kategori_id" class="form-select" required>
                <option value="1" {{ $arsip->kategori_id == 1 ? 'selected' : '' }}>Undangan</option>
                <option value="2" {{ $arsip->kategori_id == 2 ? 'selected' : '' }}>Pengumuman</option>
                <option value="3" {{ $arsip->kategori_id == 3 ? 'selected' : '' }}>Nota Dinas</option>
                <option value="4" {{ $arsip->kategori_id == 4 ? 'selected' : '' }}>Pemberitahuan</option>
            </select>
        </div>

        {{-- Judul --}}
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul"
                   value="{{ old('judul', $arsip->judul) }}" required>
        </div>

        {{-- File Surat (opsional) --}}
        <div class="mb-3">
            <label for="file_surat" class="form-label">File Surat (PDF)</label>
            <input type="file" class="form-control" id="file_surat" name="file_surat" accept="application/pdf">
            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti file.</small>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('arsip.show', $arsip->id) }}" class="btn btn-secondary"><< Kembali</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
