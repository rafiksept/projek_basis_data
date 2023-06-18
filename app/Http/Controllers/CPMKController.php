<?php

namespace App\Http\Controllers;

use App\Models\CPMK;
use App\Models\CPL_TSD;
use App\Models\CPL_TE;
use App\Models\CPL_TI;
use App\Models\CPL_TRKB;
use App\Models\CPL_RN;
use Illuminate\Http\Request;
use Box\Spout\Reader\ReaderInterface;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class CPMKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $prodiFilter = $request->input('prodi_filter');
        
        // $data = CPMK::latest()->filter(request(['prodi_filter']))->get();

        $tabelCPL_TSD = 'cpl_tsd';
        $tabelCPL_TI = 'cpl_ti';
        $tabelCPL_TE = 'cpl_te';
        $tabelCPL_TRKB = 'cpl_trkb';
        $tabelCPL_RN = 'cpl_rn';

        if ($prodiFilter === 'TSD') {
            $dataTSD = DB::table($tabelCPL_TSD)
            ->select('id','Mata_Kuliah','S1', 'S2', 'S3', 'S4', 'S5', 'S6', 'S7', 'S8', 'S9', 'S10', 'S11', 'KU1', 'KU2', 'KU3', 'KU4', 'KU5', 'KU6', 'KU7', 'KU8', 'KU9', 'P1', 'P2', 'P3', 'P4', 'KK1', 'KK2', 'KK3', 'KK4')
            ->latest()->get();
            $data = $dataTSD;
        } elseif ($prodiFilter === 'TRKB') {
            $dataTRKB = DB::table($tabelCPL_TRKB)
            ->select('id','Mata_Kuliah','S1', 'S2', 'S3', 'S4', 'S5', 'S6', 'S7', 'S8', 'S9', 'S10', 'S11', 'KU1', 'KU2', 'KU3', 'KU4', 'KU5', 'KU6', 'KU7', 'KU8', 'KU9', 'P1', 'P2', 'P3', 'P4', 'P5', 'P6', 'KK1', 'KK2', 'KK3', 'KK4', 'KK5')
            ->latest()->get();
            $data = $dataTRKB;
        } elseif ($prodiFilter === 'TE') {
            $dataTE = DB::table($tabelCPL_TE)
            ->select('id','Mata_Kuliah','S1', 'S2', 'S3', 'S4', 'S5', 'S6', 'S7', 'S8', 'S9', 'S10', 'S11', 'KU1', 'KU2', 'KU3', 'KU4', 'KU5', 'KU6', 'KU7', 'KU8', 'KU9', 'P1', 'P2', 'P3', 'P4', 'P5', 'P6', 'P7', 'KK1', 'KK2', 'KK3', 'KK4', 'KK5', 'KK6', 'KK7', 'KK8', 'KK9', 'KK10')
            ->latest()->get();
            $data = $dataTE;
        } elseif ($prodiFilter === 'TI') {
            $dataTI = DB::table($tabelCPL_TI)
            ->select('id','Mata_Kuliah','S1', 'S2', 'S3', 'S4', 'S5', 'S6', 'S7', 'S8', 'S9', 'S10', 'S11', 'KU1', 'KU2', 'KU3', 'KU4', 'KU5', 'KU6', 'KU7', 'KU8', 'KU9', 'P1', 'P2', 'P3', 'P4', 'KK1', 'KK2', 'KK3', 'KK4', 'KK5', 'KK6', 'KK7', 'KK8', 'KK9', 'KK10')
            ->latest()->get();
            $data = $dataTI;
        } elseif ($prodiFilter === 'RN') {
            $dataRN = DB::table($tabelCPL_RN)
            ->select('id','Mata_Kuliah','S1', 'S2', 'S3', 'S4', 'S5', 'S6', 'S7', 'S8', 'S9', 'S10', 'S11', 'KU1', 'KU2', 'KU3', 'KU4', 'KU5', 'KU6', 'KU7', 'P1', 'P2', 'P3', 'P4', 'P5', 'P6', 'P7', 'KK1', 'KK2', 'KK3', 'KK4', 'KK5', 'KK6')
            ->latest()->get();
            $data = $dataRN;
        } else {
            $dataTSD = DB::table($tabelCPL_TSD)
            ->select('id','Mata_Kuliah','S1', 'S2', 'S3', 'S4', 'S5', 'S6', 'S7', 'S8', 'S9', 'S10', 'S11', 'KU1', 'KU2', 'KU3', 'KU4', 'KU5', 'KU6', 'KU7', 'KU8', 'KU9', 'P1', 'P2', 'P3', 'P4', 'KK1', 'KK2', 'KK3', 'KK4')
            ->latest()->get();
            $data = $dataTSD;
        }

        // $data = $dataTSD->concat($dataTI)->concat($dataTE)->concat($dataTRKB)->concat($dataRN);
        return view('editcpmk', [
            'data' => $data,
            'prodiFilter' => $prodiFilter,
        ]);
    }   

    public function import(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xls,xlsx,csv'
        ]);

        $file = $request->file('excel_file');

        $reader = $this->createReader($file->path());

        if (!$reader) {
            return redirect()->back()->with('error', 'Invalid file format.');
        }

        $reader->open($file->path());

        $isFirstRow = true; // Tandai apakah baris pertama adalah kolom judul

        foreach ($reader->getSheetIterator() as $sheet) {
            foreach ($sheet->getRowIterator() as $row) {
                $data = $row->getCells();

                // Jika baris pertama, maka inisialisasi nama kolom
                if ($isFirstRow) {
                    $columns = [];
                    foreach ($data as $cell) {
                        $columns[] = $cell->getValue();
                    }
                    $isFirstRow = false;
                    continue; // Lewati baris pertama (kolom judul)
                }

                // Menginisialisasi array data dengan nilai default 0
                $rowData = array_fill_keys($columns, '0');

                foreach ($data as $index => $cell) {
                    $columnName = isset($columns[$index]) ? $columns[$index] : null;
                    if ($columnName !== null && array_key_exists($columnName, $rowData)) {
                        $rowData[$columnName] = $cell->getValue();
                    } else {
                        // Jika kolom tidak ada, tetapkan nilai 0
                        $rowData[$columnName] = '0';
                    }
                }

                // Cek apakah data dengan Mata_Kuliah dan Prodi yang sama sudah ada
                $existingDataTSD = CPL_TSD::where('Mata_Kuliah',$rowData['Mata_Kuliah'])->first();
                $existingDataTI = CPL_TI::where('Mata_Kuliah',$rowData['Mata_Kuliah'])->first();
                $existingDataTE = CPL_TE::where('Mata_Kuliah',$rowData['Mata_Kuliah'])->first();
                $existingDataTRKB = CPL_TRKB::where('Mata_Kuliah',$rowData['Mata_Kuliah'])->first();
                $existingDataRN = CPL_RN::where('Mata_Kuliah',$rowData['Mata_Kuliah'])->first();
                $prodi = $rowData['Prodi'];
                if ($existingDataTSD) {
                    // Cek nilai 'Prodi' untuk menentukan tabel tujuan
                    switch ($prodi) {
                        case 'TSD':
                            // Simpan data ke tabel cpl_tsd
                            $existingDataTSD->update($rowData);
                            break;
                    }
                } elseif ($existingDataTI) {
                    // Cek nilai 'Prodi' untuk menentukan tabel tujuan
                    switch ($prodi) {
                        case 'TI':
                            // Simpan data ke tabel cpl_ti
                            $existingDataTI->update($rowData);
                            break;
                    }
                } elseif ($existingDataTE) {
                    // Cek nilai 'Prodi' untuk menentukan tabel tujuan
                    switch ($prodi) {
                        case 'TE':
                            // Simpan data ke tabel cpl_te
                            $existingDataTE->update($rowData);
                            break;
                    }
                } elseif ($existingDataTRKB) {
                    // Cek nilai 'Prodi' untuk menentukan tabel tujuan
                    switch ($prodi) {
                        case 'TRKB':
                            // Simpan data ke tabel cpl_trkb
                            $existingDataTRKB->update($rowData);
                            break;
                    }
                } elseif ($existingDataRN) {
                    // Cek nilai 'Prodi' untuk menentukan tabel tujuan
                    switch ($prodi) {
                        case 'RN':
                            // Simpan data ke tabel cpl_rn
                            $existingDataRN->update($rowData);
                            break;
                    }
                } else {
                    // Cek nilai 'Prodi' untuk menentukan tabel tujuan
                    switch ($prodi) {
                        case 'TSD':
                            // Simpan data ke tabel cpl_tsd
                            CPL_TSD::create($rowData);
                            break;
                        case 'TI':
                            // Simpan data ke tabel cpl_ti
                            CPL_TI::create($rowData);
                            break;
                        case 'TE':
                            // Simpan data ke tabel cpl_te
                            CPL_TE::create($rowData);
                            break;
                        case 'TRKB':
                            // Simpan data ke tabel cpl_trkb
                            CPL_TRKB::create($rowData);
                            break;
                        case 'RN':
                            // Simpan data ke tabel cpl_rn
                            CPL_RN::create($rowData);
                            break;
                        default:
                            // Prodi tidak dikenali, lakukan tindakan yang sesuai
                            break;
                    }
                }
            }
        }

        $reader->close();

        return redirect()->back()->with('success', 'Data Excel berhasil diimpor ke database.');
    }

    private function createReader($filePath): ReaderInterface
    {
        $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

        if ($fileExtension === 'csv') {
            $reader = ReaderEntityFactory::createCSVReader();
            $reader->setFieldDelimiter(',');
        } else {
            $reader = ReaderEntityFactory::createXLSXReader();
        }

        return $reader;
    }
}
