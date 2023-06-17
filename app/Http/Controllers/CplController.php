<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CplController extends Controller
{
    public function viewCPL(Request $request)
    {
        $selectedProdi = $request->input('prodi-filter');
        $tableName = 'cpls';

        if ($selectedProdi === 'TSD') {
            $view_cpl = DB::table($tableName)->where('prodi', $selectedProdi)->get();
        } elseif ($selectedProdi === 'TRKB') {
            $view_cpl = DB::table($tableName)->where('prodi', $selectedProdi)->get();
        } elseif ($selectedProdi === 'TE') {
            $view_cpl = DB::table($tableName)->where('prodi', $selectedProdi)->get();
        } elseif ($selectedProdi === 'TI') {
            $view_cpl = DB::table($tableName)->where('prodi', $selectedProdi)->get();
        } elseif ($selectedProdi === 'RN') {
            $view_cpl = DB::table($tableName)->where('prodi', $selectedProdi)->get();
        } else {
            $tableName = 'cpls_awal';
            $view_cpl = DB::table($tableName)->get();
        }

        return view('cpl', ['view_cpl' => $view_cpl]);
    }

}