<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipSurat extends Model
{
    use HasFactory;

    protected $table = 'arsip_surat'; 
    protected $fillable = ['nomor_surat', 'kategori_id', 'judul', 'file_surat'];

    public function kategori()
    {
        return $this->belongsTo(KategoriSurat::class, 'kategori_id');
    }
}
