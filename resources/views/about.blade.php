{{-- resources/views/about.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        
        {{-- Konten About --}}
        <div class="col-md-9 col-lg-10 p-4">
            <h3 class="mb-4">About</h3>

            <div class="d-flex align-items-start">
                {{-- Foto Profil --}}
                <img src="{{ asset('images/foto-saya.jpg') }}" alt="Foto Anda" 
                     class="rounded border me-4" style="width: 200px; height: 250px; object-fit: cover;">

                {{-- Info Profil --}}
                <div>
                    <p>Aplikasi ini dibuat oleh:</p>
                    <p><strong>Nama</strong> : Robbi Arinil Haq</p>
                    <p><strong>Prodi</strong> : D3-MI PSDKU Kediri</p>
                    <p><strong>NIM</strong> : 2331730034</p>
                    <p><strong>Tanggal</strong> : 20 September 2025</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
