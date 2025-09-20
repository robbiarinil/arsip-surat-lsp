@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Kategori Surat >> Tambah</h3>
    <p class="text-muted">
        Tambahkan kategori baru untuk mengelompokkan arsip surat. <br>
        Jika sudah selesai, jangan lupa klik tombol <strong>"Simpan"</strong>.
    </p>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kategori.store') }}" method="POST" style="max-width: 600px;">
        @csrf

        {{-- ID (Auto Increment) --}}
        <div class="mb-3">
            <label class="form-label">ID (Auto Increment)</label>
            <input type="text" class="form-control" value="{{ $nextId }}" disabled>
        </div>

        {{-- Nama Kategori --}}
        <div class="mb-3">
            <label class="form-label">Nama Kategori</label>
            <input type="text" name="nama" class="form-control" required 
                   placeholder="Masukkan nama kategori">
        </div>

        {{-- Keterangan --}}
        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3" 
                      placeholder="Tuliskan deskripsi kategori"></textarea>
        </div>

        {{-- Tombol Aksi --}}
        <div class="d-flex gap-2 mt-3">
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary"><< Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
