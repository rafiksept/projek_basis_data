<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasMatkul extends Model
{
    use HasFactory;

    protected $fillable =['nama','prodi', 'mata_kuliah_id'];

    public function mataKuliah(){
        return $this->belongsTo(MataKuliah::class);
    }
}
