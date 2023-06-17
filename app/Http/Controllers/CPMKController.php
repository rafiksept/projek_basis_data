<?php

namespace App\Http\Controllers;

use App\Models\CPMK;
use Illuminate\Http\Request;
use Box\Spout\Reader\ReaderInterface;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Illuminate\Support\Facades\Redirect;

class CPMKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $prodiFilter = $request->input('prodi_filter');
        $data = CPMK::latest()->filter(request(['prodi_filter']))->get();

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
                $existingData = CPMK::where('Mata_Kuliah', $rowData['Mata_Kuliah'])
                    ->where('Prodi', $rowData['Prodi'])
                    ->first();

                if ($existingData) {
                    // Jika sudah ada, update data yang sudah ada dengan nilai baru
                    $existingData->update($rowData);
                } else {
                    // Jika belum ada, simpan data baru ke database
                    CPMK::create($rowData);
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CPMK $data)
    {
        if ($request->has('S1')) {
            $validatedData = $request->validate([
                'S1' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the S1 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('S2')) {
            $validatedData = $request->validate([
                'S2' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the S2 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('S3')) {
            $validatedData = $request->validate([
                'S3' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the S3 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('S4')) {
            $validatedData = $request->validate([
                'S4' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the S4 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('S5')) {
            $validatedData = $request->validate([
                'S5' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the S5 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('S6')) {
            $validatedData = $request->validate([
                'S6' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the S6 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('S7')) {
            $validatedData = $request->validate([
                'S7' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the S7 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('S8')) {
            $validatedData = $request->validate([
                'S8' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the S8 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('S9')) {
            $validatedData = $request->validate([
                'S9' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the S9 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('S10')) {
            $validatedData = $request->validate([
                'S10' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the S10 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('S11')) {
            $validatedData = $request->validate([
                'S11' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the S11 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        
        } elseif ($request->has('KU1')) {
            $validatedData = $request->validate([
                'KU1' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the KU1 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('KU2')) {
            $validatedData = $request->validate([
                'KU2' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the KU2 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('KU3')) {
            $validatedData = $request->validate([
                'KU3' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the KU3 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('KU4')) {
            $validatedData = $request->validate([
                'KU4' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the KU4 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('KU5')) {
            $validatedData = $request->validate([
                'KU5' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the KU5 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('KU6')) {
            $validatedData = $request->validate([
                'KU6' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the KU6 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('KU7')) {
            $validatedData = $request->validate([
                'KU7' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the KU7 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('KU8')) {
            $validatedData = $request->validate([
                'KU8' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the KU8 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('KU9')) {
            $validatedData = $request->validate([
                'KU9' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the KU9 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        
        } elseif ($request->has('P1')) {
            $validatedData = $request->validate([
                'P1' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the P1 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('P2')) {
            $validatedData = $request->validate([
                'P2' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the P2 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('P3')) {
            $validatedData = $request->validate([
                'P3' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the P3 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('P4')) {
            $validatedData = $request->validate([
                'P4' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the P4 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('P5')) {
            $validatedData = $request->validate([
                'P5' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the P5 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('P6')) {
            $validatedData = $request->validate([
                'P6' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the P6 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('P7')) {
            $validatedData = $request->validate([
                'P7' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the P7 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));    

        } elseif ($request->has('KK1')) {
            $validatedData = $request->validate([
                'KK1' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the KK1 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('KK2')) {
            $validatedData = $request->validate([
                'KK2' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the KK2 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('KK3')) {
            $validatedData = $request->validate([
                'KK3' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the KK3 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('KK4')) {
            $validatedData = $request->validate([
                'KK4' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the KK4 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('KK5')) {
            $validatedData = $request->validate([
                'KK5' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the KK5 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('KK6')) {
            $validatedData = $request->validate([
                'KK6' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the KK6 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('KK7')) {
            $validatedData = $request->validate([
                'KK7' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the KK7 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('KK8')) {
            $validatedData = $request->validate([
                'KK8' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the KK8 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('KK9')) {
            $validatedData = $request->validate([
                'KK9' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the KK9 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } elseif ($request->has('KK10')) {
            $validatedData = $request->validate([
                'KK10' => 'required|numeric|min:0|max:1',
            ]);
            $data->update($validatedData);
            $redirectUrl = $this->getRedirectUrl($request);
            return Redirect::to($redirectUrl)->with('success', "You have successfully changed the KK10 on {$data->Mata_Kuliah}!")->with('prodi_filter', $request->input('prodi_filter'));
        } 
    }

    // private function validateDecimalValue($value)
    // {
    //     // Validasi nilai desimal dengan rentang 0-1
    //     if ($value < 0) {
    //         return 0;
    //     } elseif ($value > 1) {
    //         return 1;
    //     } else {
    //         return $value;
    //     }
    // }

    private function getRedirectUrl($request)
    {
        return $request->has('prodi_filter') ? '/editcpmk?prodi_filter=' . $request->input('prodi_filter') : '/editcpmk';
    }
}
