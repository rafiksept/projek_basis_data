<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public function query1(Request $request)
    {
        // Get the search query from the request
        $searchQuery = $request->query('search');

        // Perform the query and retrieve the result
        $result = DB::select('SELECT
        crn.Kode_Matkul,
        crn.Mata_Kuliah,
        AVG(crn.S1 * bn.Nilai) AS Nilai_S1,
        AVG(crn.S2 * bn.Nilai) AS Nilai_S2,
        AVG(crn.S3 * bn.Nilai) AS Nilai_S3,
        AVG(crn.S4 * bn.Nilai) AS Nilai_S4,
        AVG(crn.S5 * bn.Nilai) AS Nilai_S5,
        AVG(crn.S6 * bn.Nilai) AS Nilai_S6,
        AVG(crn.S7 * bn.Nilai) AS Nilai_S7,
        AVG(crn.S8 * bn.Nilai) AS Nilai_S8,
        AVG(crn.S9 * bn.Nilai) AS Nilai_S9,
        AVG(crn.S10 * bn.Nilai) AS Nilai_S10,
        AVG(crn.S11 * bn.Nilai) AS Nilai_S11,
        AVG(crn.KU1 * bn.Nilai) AS Nilai_KU1,
        AVG(crn.KU2 * bn.Nilai) AS Nilai_KU2,
        AVG(crn.KU3 * bn.Nilai) AS Nilai_KU3,
        AVG(crn.KU4 * bn.Nilai) AS Nilai_KU4,
        AVG(crn.KU5 * bn.Nilai) AS Nilai_KU5,
        AVG(crn.KU6 * bn.Nilai) AS Nilai_KU6,
        AVG(crn.KU7 * bn.Nilai) AS Nilai_KU7,
        AVG(crn.KU8 * bn.Nilai) AS Nilai_KU8,
        AVG(crn.KU9 * bn.Nilai) AS Nilai_KU9,
        AVG(crn.P1 * bn.Nilai) AS Nilai_P1,
        AVG(crn.P2 * bn.Nilai) AS Nilai_P2,
        AVG(crn.P3 * bn.Nilai) AS Nilai_P3,
        AVG(crn.P4 * bn.Nilai) AS Nilai_P4,
        AVG(crn.KK1 * bn.Nilai) AS Nilai_KK1,
        AVG(crn.KK2 * bn.Nilai) AS Nilai_KK2,
        AVG(crn.KK3 * bn.Nilai) AS Nilai_KK3,
        AVG(crn.KK4 * bn.Nilai) AS Nilai_KK4
    FROM
        cpl_tsd AS crn
    JOIN
        basdut_nilai_tsd AS bn ON crn.Kode_Matkul = bn.Kode_Matkul
    JOIN
        mahasiswa_ftmm AS m ON bn.NIM = m.NIM
    WHERE
        crn.Kode_Matkul LIKE ? OR crn.Mata_Kuliah LIKE ?
    GROUP BY
        crn.Kode_Matkul, crn.Mata_Kuliah', ['%' . $searchQuery . '%', '%' . $searchQuery . '%']);


        // Transform the result into dynamic objects
        $transformedResult = [];
        foreach ($result as $row) {
            $object = (object) $row;
            $transformedResult[] = $object;
        }

        // Return the transformed result and search query to the view
        return view('raport', ['result' => $transformedResult, 'searchQuery' => $searchQuery]);
    }

    public function query2(Request $request)
    {
        // Get the search query from the request
        $searchQuery = $request->query('search');

        // Perform the query and retrieve the result
        $result = DB::select('SELECT crn.Kode_Matkul, crn.Mata_Kuliah,
        AVG(crn.S1 * bn.Nilai) AS S1,
        AVG(crn.S2 * bn.Nilai) AS S2,
        AVG(crn.S3 * bn.Nilai) AS S3,
        AVG(crn.S4 * bn.Nilai) AS S4,
        AVG(crn.S5 * bn.Nilai) AS S5,
        AVG(crn.S6 * bn.Nilai) AS S6,
        AVG(crn.S7 * bn.Nilai) AS S7,
        AVG(crn.S8 * bn.Nilai) AS S8,
        AVG(crn.S9 * bn.Nilai) AS S9,
        AVG(crn.S10 * bn.Nilai) AS S10,
        AVG(crn.S11 * bn.Nilai) AS S11,
        AVG(crn.KU1 * bn.Nilai) AS KU1,
        AVG(crn.KU2 * bn.Nilai) AS KU2,
        AVG(crn.KU3 * bn.Nilai) AS KU3,
        AVG(crn.KU4 * bn.Nilai) AS KU4,
        AVG(crn.KU5 * bn.Nilai) AS KU5,
        AVG(crn.KU6 * bn.Nilai) AS KU6,
        AVG(crn.KU7 * bn.Nilai) AS KU7,
        AVG(crn.KU8 * bn.Nilai) AS KU8,
        AVG(crn.KU9 * bn.Nilai) AS KU9,
        AVG(crn.P1 * bn.Nilai) AS P1,
        AVG(crn.P2 * bn.Nilai) AS P2,
        AVG(crn.P3 * bn.Nilai) AS P3,
        AVG(crn.P4 * bn.Nilai) AS P4,
        AVG(crn.P5 * bn.Nilai) AS P5,
        AVG(crn.P6 * bn.Nilai) AS P6,
        AVG(crn.P7 * bn.Nilai) AS P7,
        AVG(crn.KK1 * bn.Nilai) AS KK1,
        AVG(crn.KK2 * bn.Nilai) AS KK2,
        AVG(crn.KK3 * bn.Nilai) AS KK3,
        AVG(crn.KK4 * bn.Nilai) AS KK4,
        AVG(crn.KK5 * bn.Nilai) AS KK5,
        AVG(crn.KK6 * bn.Nilai) AS KK6,
        AVG(crn.KK7 * bn.Nilai) AS KK7,
        AVG(crn.KK8 * bn.Nilai) AS KK8,
        AVG(crn.KK9 * bn.Nilai) AS KK9,
        AVG(crn.KK10 * bn.Nilai) AS KK10
    FROM
        cpl_te AS crn
    JOIN
        basdut_nilai_te AS bn ON crn.Kode_Matkul = bn.Kode_Matkul
    JOIN
        mahasiswa_ftmm AS m ON bn.NIM = m.NIM
    WHERE
        crn.Kode_Matkul LIKE ? OR crn.Mata_Kuliah LIKE ?
    GROUP BY
        crn.Kode_Matkul, crn.Mata_Kuliah', ['%' . $searchQuery . '%', '%' . $searchQuery . '%']);


        // Transform the result into dynamic objects
        $transformedResult = [];
        foreach ($result as $row) {
            $object = (object) $row;
            $transformedResult[] = $object;
        }

        // Return the transformed result and search query to the view
        return view('raport', ['result' => $transformedResult, 'searchQuery' => $searchQuery]);
    }
    
    public function query3(Request $request)
    {
        // Get the search query from the request
        $searchQuery = $request->query('search');

        // Perform the query and retrieve the result
        $result = DB::select('SELECT crn.Kode_Matkul, crn.Mata_Kuliah,
        AVG(crn.S1 * bn.Nilai) AS S1,
        AVG(crn.S2 * bn.Nilai) AS S2,
        AVG(crn.S3 * bn.Nilai) AS S3,
        AVG(crn.S4 * bn.Nilai) AS S4,
        AVG(crn.S5 * bn.Nilai) AS S5,
        AVG(crn.S6 * bn.Nilai) AS S6,
        AVG(crn.S7 * bn.Nilai) AS S7,
        AVG(crn.S8 * bn.Nilai) AS S8,
        AVG(crn.S9 * bn.Nilai) AS S9,
        AVG(crn.S10 * bn.Nilai) AS S10,
        AVG(crn.S11 * bn.Nilai) AS S11,
        AVG(crn.KU1 * bn.Nilai) AS KU1,
        AVG(crn.KU2 * bn.Nilai) AS KU2,
        AVG(crn.KU3 * bn.Nilai) AS KU3,
        AVG(crn.KU4 * bn.Nilai) AS KU4,
        AVG(crn.KU5 * bn.Nilai) AS KU5,
        AVG(crn.KU6 * bn.Nilai) AS KU6,
        AVG(crn.KU7 * bn.Nilai) AS KU7,
        AVG(crn.KU8 * bn.Nilai) AS KU8,
        AVG(crn.KU9 * bn.Nilai) AS KU9,
        AVG(crn.P1 * bn.Nilai) AS P1,
        AVG(crn.P2 * bn.Nilai) AS P2,
        AVG(crn.P3 * bn.Nilai) AS P3,
        AVG(crn.P4 * bn.Nilai) AS P4,
        AVG(crn.KK1 * bn.Nilai) AS KK1,
        AVG(crn.KK2 * bn.Nilai) AS KK2,
        AVG(crn.KK3 * bn.Nilai) AS KK3,
        AVG(crn.KK4 * bn.Nilai) AS KK4,
        AVG(crn.KK5 * bn.Nilai) AS KK5,
        AVG(crn.KK6 * bn.Nilai) AS KK6,
        AVG(crn.KK7 * bn.Nilai) AS KK7,
        AVG(crn.KK8 * bn.Nilai) AS KK8,
        AVG(crn.KK9 * bn.Nilai) AS KK9,
        AVG(crn.KK10 * bn.Nilai) AS KK10
    FROM
        cpl_ti AS crn
    JOIN
        basdut_nilai_ti AS bn ON crn.Kode_Matkul = bn.Kode_Matkul
    JOIN
        mahasiswa_ftmm AS m ON bn.NIM = m.NIM
    WHERE
        crn.Kode_Matkul LIKE ? OR crn.Mata_Kuliah LIKE ?
    GROUP BY
        crn.Kode_Matkul, crn.Mata_Kuliah', ['%' . $searchQuery . '%', '%' . $searchQuery . '%']);


        // Transform the result into dynamic objects
        $transformedResult = [];
        foreach ($result as $row) {
            $object = (object) $row;
            $transformedResult[] = $object;
        }

        // Return the transformed result and search query to the view
        return view('raport', ['result' => $transformedResult, 'searchQuery' => $searchQuery]);
    }

    public function query4(Request $request)
    {
        // Get the search query from the request
        $searchQuery = $request->query('search');

        // Perform the query and retrieve the result
        $result = DB::select('SELECT crn.Kode_Matkul, crn.Mata_Kuliah,
        AVG(crn.S1 * bn.Nilai) AS S1,
        AVG(crn.S2 * bn.Nilai) AS S2,
        AVG(crn.S3 * bn.Nilai) AS S3,
        AVG(crn.S4 * bn.Nilai) AS S4,
        AVG(crn.S5 * bn.Nilai) AS S5,
        AVG(crn.S6 * bn.Nilai) AS S6,
        AVG(crn.S7 * bn.Nilai) AS S7,
        AVG(crn.S8 * bn.Nilai) AS S8,
        AVG(crn.S9 * bn.Nilai) AS S9,
        AVG(crn.S10 * bn.Nilai) AS S10,
        AVG(crn.S11 * bn.Nilai) AS S11,
        AVG(crn.KU1 * bn.Nilai) AS KU1,
        AVG(crn.KU2 * bn.Nilai) AS KU2,
        AVG(crn.KU3 * bn.Nilai) AS KU3,
        AVG(crn.KU4 * bn.Nilai) AS KU4,
        AVG(crn.KU5 * bn.Nilai) AS KU5,
        AVG(crn.KU6 * bn.Nilai) AS KU6,
        AVG(crn.KU7 * bn.Nilai) AS KU7,
        AVG(crn.KU8 * bn.Nilai) AS KU8,
        AVG(crn.KU9 * bn.Nilai) AS KU9,
        AVG(crn.P1 * bn.Nilai) AS P1,
        AVG(crn.P2 * bn.Nilai) AS P2,
        AVG(crn.P3 * bn.Nilai) AS P3,
        AVG(crn.P4 * bn.Nilai) AS P4,
        AVG(crn.P5 * bn.Nilai) AS P5,
        AVG(crn.P6 * bn.Nilai) AS P6,
        AVG(crn.KK1 * bn.Nilai) AS KK1,
        AVG(crn.KK2 * bn.Nilai) AS KK2,
        AVG(crn.KK3 * bn.Nilai) AS KK3,
        AVG(crn.KK4 * bn.Nilai) AS KK4,
        AVG(crn.KK5 * bn.Nilai) AS KK5
    FROM
        cpl_trkb AS crn
    JOIN
        basdut_nilai_trkb AS bn ON crn.Kode_Matkul = bn.Kode_Matkul
    JOIN
        mahasiswa_ftmm AS m ON bn.NIM = m.NIM
    WHERE
        crn.Kode_Matkul LIKE ? OR crn.Mata_Kuliah LIKE ?
    GROUP BY
        crn.Kode_Matkul, crn.Mata_Kuliah', ['%' . $searchQuery . '%', '%' . $searchQuery . '%']);


        // Transform the result into dynamic objects
        $transformedResult = [];
        foreach ($result as $row) {
            $object = (object) $row;
            $transformedResult[] = $object;
        }

        // Return the transformed result and search query to the view
        return view('raport', ['result' => $transformedResult, 'searchQuery' => $searchQuery]);
    }

    public function query5(Request $request)
    {
        // Get the search query from the request
        $searchQuery = $request->query('search');

        // Perform the query and retrieve the result
        $result = DB::select('SELECT crn.Kode_Matkul, crn.Mata_Kuliah,
        AVG(crn.S1 * bn.Nilai) AS S1,
        AVG(crn.S2 * bn.Nilai) AS S2,
        AVG(crn.S3 * bn.Nilai) AS S3,
        AVG(crn.S4 * bn.Nilai) AS S4,
        AVG(crn.S5 * bn.Nilai) AS S5,
        AVG(crn.S6 * bn.Nilai) AS S6,
        AVG(crn.S7 * bn.Nilai) AS S7,
        AVG(crn.S8 * bn.Nilai) AS S8,
        AVG(crn.S9 * bn.Nilai) AS S9,
        AVG(crn.S10 * bn.Nilai) AS S10,
        AVG(crn.S11 * bn.Nilai) AS S11,
        AVG(crn.KU1 * bn.Nilai) AS KU1,
        AVG(crn.KU2 * bn.Nilai) AS KU2,
        AVG(crn.KU3 * bn.Nilai) AS KU3,
        AVG(crn.KU4 * bn.Nilai) AS KU4,
        AVG(crn.KU5 * bn.Nilai) AS KU5,
        AVG(crn.KU6 * bn.Nilai) AS KU6,
        AVG(crn.KU7 * bn.Nilai) AS KU7,
        AVG(crn.P1 * bn.Nilai) AS P1,
        AVG(crn.P2 * bn.Nilai) AS P2,
        AVG(crn.P3 * bn.Nilai) AS P3,
        AVG(crn.P4 * bn.Nilai) AS P4,
        AVG(crn.P5 * bn.Nilai) AS P5,
        AVG(crn.P6 * bn.Nilai) AS P6,
        AVG(crn.P7 * bn.Nilai) AS P7,
        AVG(crn.KK1 * bn.Nilai) AS KK1,
        AVG(crn.KK2 * bn.Nilai) AS KK2,
        AVG(crn.KK3 * bn.Nilai) AS KK3,
        AVG(crn.KK4 * bn.Nilai) AS KK4,
        AVG(crn.KK5 * bn.Nilai) AS KK5,
        AVG(crn.KK6 * bn.Nilai) AS KK6
    FROM
        cpl_rn AS crn
    JOIN
        basdut_nilai_rn AS bn ON crn.Kode_Matkul = bn.Kode_Matkul
    JOIN
        mahasiswa_ftmm AS m ON bn.NIM = m.NIM
    WHERE
        crn.Kode_Matkul LIKE ? OR crn.Mata_Kuliah LIKE ?
    GROUP BY
        crn.Kode_Matkul, crn.Mata_Kuliah', ['%' . $searchQuery . '%', '%' . $searchQuery . '%']);


        // Transform the result into dynamic objects
        $transformedResult = [];
        foreach ($result as $row) {
            $object = (object) $row;
            $transformedResult[] = $object;
        }

        // Return the transformed result and search query to the view
        return view('raport', ['result' => $transformedResult, 'searchQuery' => $searchQuery]);
    }

    public function query6(Request $request)
    {
        // Get the search query from the request
        $searchQuery = $request->query('search');

        // Perform the query and retrieve the result
        $result = DB::select('SELECT crn.Kode_Matkul, crn.Mata_Kuliah, m.NIM, m.Nama,
        crn.S1 * bn.Nilai AS S1,
        crn.S2 * bn.Nilai AS S2,
        crn.S3 * bn.Nilai AS S3,
        crn.S4 * bn.Nilai AS S4,
        crn.S5 * bn.Nilai AS S5,
        crn.S6 * bn.Nilai AS S6,
        crn.S7 * bn.Nilai AS S7,
        crn.S8 * bn.Nilai AS S8,
        crn.S9 * bn.Nilai AS S9,
        crn.S10 * bn.Nilai AS S10,
        crn.S11 * bn.Nilai AS S11,
        crn.KU1 * bn.Nilai AS KU1,
        crn.KU2 * bn.Nilai AS KU2,
        crn.KU3 * bn.Nilai AS KU3,
        crn.KU4 * bn.Nilai AS KU4,
        crn.KU5 * bn.Nilai AS KU5,
        crn.KU6 * bn.Nilai AS KU6,
        crn.KU7 * bn.Nilai AS KU7,
        crn.KU8 * bn.Nilai AS KU8,
        crn.KU9 * bn.Nilai AS KU9,
        crn.P1 * bn.Nilai AS P1,
        crn.P2 * bn.Nilai AS P2,
        crn.P3 * bn.Nilai AS P3,
        crn.P4 * bn.Nilai AS P4,
        crn.KK1 * bn.Nilai AS KK1,
        crn.KK2 * bn.Nilai AS KK2,
        crn.KK3 * bn.Nilai AS KK3,
        crn.KK4 * bn.Nilai AS KK4
        FROM 
            cpl_tsd AS crn
        JOIN 
            basdut_nilai_tsd AS bn ON crn.Kode_Matkul = bn.Kode_Matkul
        JOIN 
            mahasiswa_ftmm AS m ON bn.NIM = m.NIM
        WHERE 
            crn.Kode_Matkul LIKE ? OR crn.Mata_Kuliah LIKE ? OR m.nama LIKE ? OR m.NIM LIKE ?', ['%' . $searchQuery . '%', '%' . $searchQuery . '%', '%' . $searchQuery . '%', '%' . $searchQuery . '%']);

        // Transform the result into dynamic objects
        $transformedResult = [];
        foreach ($result as $row) {
            $object = (object) $row;
            $transformedResult[] = $object;
        }

        // Return the transformed result and search query to the view
        return view('raport', ['result' => $transformedResult, 'searchQuery' => $searchQuery]);
    }

    public function query7(Request $request)
    {
        // Get the search query from the request
        $searchQuery = $request->query('search');

        // Perform the query and retrieve the result
        $result = DB::select('SELECT crn.Kode_Matkul, crn.Mata_Kuliah, m.NIM, m.Nama,
        crn.S1 * bn.Nilai AS S1,
        crn.S2 * bn.Nilai AS S2,
        crn.S3 * bn.Nilai AS S3,
        crn.S4 * bn.Nilai AS S4,
        crn.S5 * bn.Nilai AS S5,
        crn.S6 * bn.Nilai AS S6,
        crn.S7 * bn.Nilai AS S7,
        crn.S8 * bn.Nilai AS S8,
        crn.S9 * bn.Nilai AS S9,
        crn.S10 * bn.Nilai AS S10,
        crn.S11 * bn.Nilai AS S11,
        crn.KU1 * bn.Nilai AS KU1,
        crn.KU2 * bn.Nilai AS KU2,
        crn.KU3 * bn.Nilai AS KU3,
        crn.KU4 * bn.Nilai AS KU4,
        crn.KU5 * bn.Nilai AS KU5,
        crn.KU6 * bn.Nilai AS KU6,
        crn.KU7 * bn.Nilai AS KU7,
        crn.KU8 * bn.Nilai AS KU8,
        crn.KU9 * bn.Nilai AS KU9,
        crn.P1 * bn.Nilai AS P1,
        crn.P2 * bn.Nilai AS P2,
        crn.P3 * bn.Nilai AS P3,
        crn.P4 * bn.Nilai AS P4,
        crn.P5 * bn.Nilai AS P5,
        crn.P6 * bn.Nilai AS P6,
        crn.P7 * bn.Nilai AS P7,
        crn.KK1 * bn.Nilai AS KK1,
        crn.KK2 * bn.Nilai AS KK2,
        crn.KK3 * bn.Nilai AS KK3,
        crn.KK4 * bn.Nilai AS KK4,
        crn.KK5 * bn.Nilai AS KK5,
        crn.KK6 * bn.Nilai AS KK6,
        crn.KK7 * bn.Nilai AS KK7,
        crn.KK8 * bn.Nilai AS KK8,
        crn.KK9 * bn.Nilai AS KK9
        FROM 
            cpl_te AS crn
        JOIN 
            basdut_nilai_te AS bn ON crn.Kode_Matkul = bn.Kode_Matkul
        JOIN 
            mahasiswa_ftmm AS m ON bn.NIM = m.NIM
        WHERE 
            crn.Kode_Matkul LIKE ? OR crn.Mata_Kuliah LIKE ? OR m.nama LIKE ? OR m.NIM LIKE ?', ['%' . $searchQuery . '%', '%' . $searchQuery . '%', '%' . $searchQuery . '%', '%' . $searchQuery . '%']);

        // Transform the result into dynamic objects
        $transformedResult = [];
        foreach ($result as $row) {
            $object = (object) $row;
            $transformedResult[] = $object;
        }

        // Return the transformed result and search query to the view
        return view('raport', ['result' => $transformedResult, 'searchQuery' => $searchQuery]);
    }

    public function query8(Request $request)
    {
        // Get the search query from the request
        $searchQuery = $request->query('search');

        // Perform the query and retrieve the result
        $result = DB::select('SELECT crn.Kode_Matkul, crn.Mata_Kuliah, m.NIM, m.Nama,
        crn.S1 * bn.Nilai AS S1,
        crn.S2 * bn.Nilai AS S2,
        crn.S3 * bn.Nilai AS S3,
        crn.S4 * bn.Nilai AS S4,
        crn.S5 * bn.Nilai AS S5,
        crn.S6 * bn.Nilai AS S6,
        crn.S7 * bn.Nilai AS S7,
        crn.S8 * bn.Nilai AS S8,
        crn.S9 * bn.Nilai AS S9,
        crn.S10 * bn.Nilai AS S10,
        crn.S11 * bn.Nilai AS S11,
        crn.KU1 * bn.Nilai AS KU1,
        crn.KU2 * bn.Nilai AS KU2,
        crn.KU3 * bn.Nilai AS KU3,
        crn.KU4 * bn.Nilai AS KU4,
        crn.KU5 * bn.Nilai AS KU5,
        crn.KU6 * bn.Nilai AS KU6,
        crn.KU7 * bn.Nilai AS KU7,
        crn.KU8 * bn.Nilai AS KU8,
        crn.KU9 * bn.Nilai AS KU9,
        crn.P1 * bn.Nilai AS P1,
        crn.P2 * bn.Nilai AS P2,
        crn.P3 * bn.Nilai AS P3,
        crn.P4 * bn.Nilai AS P4,
        crn.KK1 * bn.Nilai AS KK1,
        crn.KK2 * bn.Nilai AS KK2,
        crn.KK3 * bn.Nilai AS KK3,
        crn.KK4 * bn.Nilai AS KK4,
        crn.KK5 * bn.Nilai AS KK5,
        crn.KK6 * bn.Nilai AS KK6,
        crn.KK7 * bn.Nilai AS KK7,
        crn.KK8 * bn.Nilai AS KK8,
        crn.KK9 * bn.Nilai AS KK9,
        crn.KK10 * bn.Nilai AS KK10
        FROM 
            cpl_ti AS crn
        JOIN 
            basdut_nilai_ti AS bn ON crn.Kode_Matkul = bn.Kode_Matkul
        JOIN 
            mahasiswa_ftmm AS m ON bn.NIM = m.NIM
        WHERE 
            crn.Kode_Matkul LIKE ? OR crn.Mata_Kuliah LIKE ? OR m.nama LIKE ? OR m.NIM LIKE ?', ['%' . $searchQuery . '%', '%' . $searchQuery . '%', '%' . $searchQuery . '%', '%' . $searchQuery . '%']);

        // Transform the result into dynamic objects
        $transformedResult = [];
        foreach ($result as $row) {
            $object = (object) $row;
            $transformedResult[] = $object;
        }

        // Return the transformed result and search query to the view
        return view('raport', ['result' => $transformedResult, 'searchQuery' => $searchQuery]);
    }

    public function query9(Request $request)
    {
        // Get the search query from the request
        $searchQuery = $request->query('search');

        // Perform the query and retrieve the result
        $result = DB::select('SELECT crn.Kode_Matkul, crn.Mata_Kuliah, m.NIM, m.Nama,
        crn.S1 * bn.Nilai AS S1,
        crn.S2 * bn.Nilai AS S2,
        crn.S3 * bn.Nilai AS S3,
        crn.S4 * bn.Nilai AS S4,
        crn.S5 * bn.Nilai AS S5,
        crn.S6 * bn.Nilai AS S6,
        crn.S7 * bn.Nilai AS S7,
        crn.S8 * bn.Nilai AS S8,
        crn.S9 * bn.Nilai AS S9,
        crn.S10 * bn.Nilai AS S10,
        crn.S11 * bn.Nilai AS S11,
        crn.KU1 * bn.Nilai AS KU1,
        crn.KU2 * bn.Nilai AS KU2,
        crn.KU3 * bn.Nilai AS KU3,
        crn.KU4 * bn.Nilai AS KU4,
        crn.KU5 * bn.Nilai AS KU5,
        crn.KU6 * bn.Nilai AS KU6,
        crn.KU7 * bn.Nilai AS KU7,
        crn.KU8 * bn.Nilai AS KU8,
        crn.KU9 * bn.Nilai AS KU9,
        crn.P1 * bn.Nilai AS P1,
        crn.P2 * bn.Nilai AS P2,
        crn.P3 * bn.Nilai AS P3,
        crn.P4 * bn.Nilai AS P4,
        crn.P5 * bn.Nilai AS P5,
        crn.P6 * bn.Nilai AS P6,
        crn.KK1 * bn.Nilai AS KK1,
        crn.KK2 * bn.Nilai AS KK2,
        crn.KK3 * bn.Nilai AS KK3,
        crn.KK4 * bn.Nilai AS KK4,
        crn.KK5 * bn.Nilai AS KK5
        FROM 
            cpl_trkb AS crn
        JOIN 
            basdut_nilai_trkb AS bn ON crn.Kode_Matkul = bn.Kode_Matkul
        JOIN 
            mahasiswa_ftmm AS m ON bn.NIM = m.NIM
        WHERE 
            crn.Kode_Matkul LIKE ? OR crn.Mata_Kuliah LIKE ? OR m.nama LIKE ? OR m.NIM LIKE ?', ['%' . $searchQuery . '%', '%' . $searchQuery . '%', '%' . $searchQuery . '%', '%' . $searchQuery . '%']);

        // Transform the result into dynamic objects
        $transformedResult = [];
        foreach ($result as $row) {
            $object = (object) $row;
            $transformedResult[] = $object;
        }

        // Return the transformed result and search query to the view
        return view('raport', ['result' => $transformedResult, 'searchQuery' => $searchQuery]);
    }

    public function query10(Request $request)
    {
        // Get the search query from the request
        $searchQuery = $request->query('search');

        // Perform the query and retrieve the result
        $result = DB::select('SELECT crn.Kode_Matkul, crn.Mata_Kuliah, m.NIM, m.Nama,
        crn.S1 * bn.Nilai AS S1,
        crn.S2 * bn.Nilai AS S2,
        crn.S3 * bn.Nilai AS S3,
        crn.S4 * bn.Nilai AS S4,
        crn.S5 * bn.Nilai AS S5,
        crn.S6 * bn.Nilai AS S6,
        crn.S7 * bn.Nilai AS S7,
        crn.S8 * bn.Nilai AS S8,
        crn.S9 * bn.Nilai AS S9,
        crn.S10 * bn.Nilai AS S10,
        crn.S11 * bn.Nilai AS S11,
        crn.KU1 * bn.Nilai AS KU1,
        crn.KU2 * bn.Nilai AS KU2,
        crn.KU3 * bn.Nilai AS KU3,
        crn.KU4 * bn.Nilai AS KU4,
        crn.KU5 * bn.Nilai AS KU5,
        crn.KU6 * bn.Nilai AS KU6,
        crn.KU7 * bn.Nilai AS KU7,
        crn.P1 * bn.Nilai AS P1,
        crn.P2 * bn.Nilai AS P2,
        crn.P3 * bn.Nilai AS P3,
        crn.P4 * bn.Nilai AS P4,
        crn.P5 * bn.Nilai AS P5,
        crn.P6 * bn.Nilai AS P6,
        crn.P7 * bn.Nilai AS P7,
        crn.KK1 * bn.Nilai AS KK1,
        crn.KK2 * bn.Nilai AS KK2,
        crn.KK3 * bn.Nilai AS KK3,
        crn.KK4 * bn.Nilai AS KK4,
        crn.KK5 * bn.Nilai AS KK5,
        crn.KK6 * bn.Nilai AS KK6
        FROM 
            cpl_rn AS crn
        JOIN 
            basdut_nilai_rn AS bn ON crn.Kode_Matkul = bn.Kode_Matkul
        JOIN 
            mahasiswa_ftmm AS m ON bn.NIM = m.NIM
        WHERE 
            crn.Kode_Matkul LIKE ? OR crn.Mata_Kuliah LIKE ? OR m.nama LIKE ? OR m.NIM LIKE ?', ['%' . $searchQuery . '%', '%' . $searchQuery . '%', '%' . $searchQuery . '%', '%' . $searchQuery . '%']);

        // Transform the result into dynamic objects
        $transformedResult = [];
        foreach ($result as $row) {
            $object = (object) $row;
            $transformedResult[] = $object;
        }

        // Return the transformed result and search query to the view
        return view('raport', ['result' => $transformedResult, 'searchQuery' => $searchQuery]);
    }

}
