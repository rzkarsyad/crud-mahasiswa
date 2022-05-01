<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    
    protected $table = "mahasiswa";
    protected $fillable = ["nama", "nim", "tgl_lahir", "kode_kelas", "kode_jurusan", "angkatan"];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'kode_jurusan', 'kode');
    }
    
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kode_kelas', 'kode');
    }
}
