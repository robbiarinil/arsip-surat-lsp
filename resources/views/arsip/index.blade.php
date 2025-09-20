@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container-fluid">
    <h2 class="mb-3">Arsip Surat</h2>
    <p class="text-muted">
        Berikut ini adalah surat-surat yang telah terbit dan diarsipkan. <br>
        Klik <strong>"Lihat"</strong> pada kolom aksi untuk menampilkan surat.
    </p>

    {{-- Pencarian --}}
    <form action="{{ route('arsip.index') }}" method="GET" class="d-flex mb-4" style="max-width: 600px;">
        <div class="input-group">
            <input type="text" name="search" class="form-control"
                   placeholder="Cari surat..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary px-4">Cari</button>
        </div>
    </form>

    {{-- Tabel Arsip Surat --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover align-middle text-center shadow-sm">
            <thead class="table-primary">
                <tr>
                    <th>Nomor Surat</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Waktu Pengarsipan</th>
                    <th width="260">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($arsip as $item)
                    <tr>
                        <td>{{ $item->nomor_surat }}</td>
                        <td>{{ $item->kategori->nama }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->created_at->format('Y-m-d H:i') }}</td>
                        <td class="d-flex justify-content-center gap-2">

                            {{-- Tombol Hapus --}}
                            <form action="{{ route('arsip.destroy', $item->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus arsip surat ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>

                            {{-- Tombol Unduh --}}
                            <a href="{{ route('arsip.download', $item->id) }}"
                               class="btn btn-sm btn-warning text-dark">Unduh</a>

                            {{-- Tombol Lihat --}}
                            <a href="{{ route('arsip.show', $item->id) }}"
                               class="btn btn-sm btn-primary">Lihat</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada arsip surat</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Tombol Arsipkan --}}
    <a href="{{ route('arsip.create') }}" class="btn btn-success mt-3 px-4">+ Arsipkan Surat</a>
</div>
@endsection
