<?php

namespace App\Http\Controllers;

use App\Models\CPL_TSD;
use App\Http\Requests\UpdateCPL_TSDRequest;
use Illuminate\Support\Facades\Redirect;

class CPLTSDController extends Controller
{
    public function update(UpdateCPL_TSDRequest $request, CPL_TSD $data)
    {
        $fields = [
            'S' => 'S',
            'KU' => 'KU',
            'P' => 'P',
            'KK' => 'KK'
        ];

        foreach ($fields as $fieldKey => $fieldName) {
            for ($i = 1; $i <= 11; $i++) {
                $inputKey = $fieldKey . $i;
                if ($request->has($inputKey)) {
                    $validatedData = $request->validate([
                        $inputKey => 'required|numeric|min:0|max:1',
                    ]);
                    $data->update($validatedData);
                    $redirectUrl = $this->getRedirectUrl($request);
                    return Redirect::to($redirectUrl)->with('success', "You have successfully changed the $fieldName$i on {$data->Mata_Kuliah}!")
                        ->with('prodi_filter', $request->input('prodi_filter'));
                }
            }
        }
    }
    private function getRedirectUrl($request)
    {
        return $request->has('prodi_filter') ? '/editcpmk?prodi_filter=' . $request->input('prodi_filter') : '/editcpmk';
    }
}
