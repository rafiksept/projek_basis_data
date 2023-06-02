<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpmk extends Model
{
    use HasFactory;

    protected $fillable =['kode_cpmk','bobot_cpmk','aktif','mata_kuliah_id','cpl_id'];

    public function mataKuliah(){
        return $this->belongsTo(MataKuliah::class);
    }
    public function cpl(){
        return $this->belongsTo(Cpl::class);
    }
}
