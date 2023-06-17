<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function viewIndex(Request $request)
    {
        $selectedProdi = $request->input('prodi-filter');
        $tableName = '';

        if ($selectedProdi === 'TSD') {
            $tableName = 'cpmks_tsd';
        } elseif ($selectedProdi === 'TRKB') {
            $tableName = 'cpmks_trkb';
        } elseif ($selectedProdi === 'TE') {
            $tableName = 'cpmks_te';
        } elseif ($selectedProdi === 'TI') {
            $tableName = 'cpmks_ti';
        } elseif ($selectedProdi === 'RN') {
            $tableName = 'cpmks_rn';
        } else {
            $tableName = 'cpmks_awal';
        }

        // Fetch data from the selected table
        $view_index = DB::table($tableName)->get();

        return view('index', ['view_index' => $view_index, 'selectedProdi' => $selectedProdi]);
    }

}