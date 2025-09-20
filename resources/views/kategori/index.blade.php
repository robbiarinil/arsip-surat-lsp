@extends('layouts.app')

@section('content')
<div class="container-fluid">
    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Notifikasi error --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2 class="mb-3">Kategori Surat</h2>
    <p class="text-muted">
        Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat. <br>
        Gunakan tombol <strong>Edit</strong> untuk mengubah, atau <strong>Hapus</strong> untuk menghapus kategori.
    </p>

    <div class="table-responsive">
        <table class="table table-bordered align-middle text-center shadow-sm">
            <thead class="table-primary">
                <tr>
                    <th>ID Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Keterangan</th>
                    <th width="200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kategori as $k)
                    <tr>
                        <td>{{ $k->id }}</td>
                        <td>{{ $k->nama }}</td>
                        <td>{{ $k->keterangan }}</td>
                        <td class="d-flex justify-content-center gap-2">
                            <a href="{{ route('kategori.edit', $k->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('kategori.destroy', $k->id) }}" method="POST" onsubmit="return confirm('Yakin hapus kategori ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">Belum ada kategori.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <a href="{{ route('kategori.create') }}" class="btn btn-success mt-3">+ Tambah Kategori Baru</a>
</div>
@endsection
