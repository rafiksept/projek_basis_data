<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaToKelasMatkul extends Model
{
    use HasFactory;

    protected $fillable =['mahasiswa_ftmm_id','kelas_matkul_id', 'prodi'];

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class);
    }
    public function kelasMatkul(){
        return $this->belongsTo(KelasMatkul::class);
    }
}
