@extends('layouts.app')

@section('content')
    <h2>Arsip Surat >> Lihat</h2>

    <p>
        <strong>Nomor:</strong> {{ $arsip->nomor_surat }} <br>
        <strong>Kategori:</strong> {{ $arsip->kategori->nama }} <br>
        <strong>Judul:</strong> {{ $arsip->judul }} <br>
        <strong>Waktu Unggah:</strong> {{ $arsip->created_at->format('Y-m-d H:i') }}
    </p>

    {{-- Preview PDF --}}
    <div class="border mb-3" style="height: 500px;">
        <iframe src="{{ asset('storage/' . $arsip->file_surat) }}" 
                width="100%" height="100%" style="border: none;">
        </iframe>
    </div>

    {{-- Tombol Aksi --}}
    <div class="d-flex gap-2">
        <a href="{{ route('arsip.index') }}" class="btn btn-secondary"><< Kembali</a>
        <a href="{{ route('arsip.download', $arsip->id) }}" class="btn btn-warning">Unduh</a>
        <a href="{{ route('arsip.edit', $arsip->id) }}" class="btn btn-primary">Edit/Ganti File</a>
    </div>
@endsection
