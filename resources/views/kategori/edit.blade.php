@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Kategori Surat >> Edit</h3>
    <p>Tambahkan atau edit data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan"</p>

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>ID (Auto Increment)</label>
            <input type="text" class="form-control" value="{{ $kategori->id }}" disabled>
        </div>

        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="nama" class="form-control" value="{{ $kategori->nama }}" required>
        </div>

        <div class="mb-3">
            <label>Judul / Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3">{{ $kategori->keterangan }}</textarea>
        </div>

        <div class="mt-3">
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary me-2">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
