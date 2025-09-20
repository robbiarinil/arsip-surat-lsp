@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h2>Arsip Surat >> Unggah</h2>
<p class="text-muted">
    Unggah surat yang telah terbit pada form ini untuk diarsipkan. <br>
    <strong>Catatan:</strong>
</p>
<ul>
    <li>Gunakan file berformat <b>PDF</b></li>
</ul>

<form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data" style="max-width: 600px;">
    @csrf

    <div class="mb-3">
        <label for="nomor_surat" class="form-label">Nomor Surat</label>
        <input type="text" class="form-control" id="nomor_surat" name="nomor_surat"
               value="{{ old('nomor_surat') }}" required>
    </div>

    <div class="mb-3">
        <label for="kategori_id" class="form-label">Kategori</label>
        <select name="kategori_id" id="kategori_id" class="form-select" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach ($kategori as $k)
                <option value="{{ $k->id }}">{{ $k->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" class="form-control" id="judul" name="judul"
               value="{{ old('judul') }}" required>
    </div>

    <div class="mb-3">
        <label for="file_surat" class="form-label">File Surat (PDF)</label>
        <input type="file" class="form-control" id="file_surat" name="file_surat" accept="application/pdf" required>
    </div>

    <div class="d-flex gap-2">
        <a href="{{ route('arsip.index') }}" class="btn btn-secondary">&laquo; Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
@endsection
