<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cpl_tsd extends Model
{   
    protected $table = 'cpl_tsd';
    protected $fillable = [
        'Mata_Kuliah',
        'S1',
        'S2',
        'S3',
        'S4',
        'S5',
        'S6',
        'S7',
        'S8',
        'S9',
        'S10',
        'S11',
        'KU1',
        'KU2',
        'KU3',
        'KU4',
        'KU5',
        'KU6',
        'KU7',
        'KU8',
        'KU9',
        'P1',
        'P2',
        'P3',
        'P4',
        'KK1',
        'KK2',
        'KK3',
        'KK4',
    ];
    use HasFactory;
}
