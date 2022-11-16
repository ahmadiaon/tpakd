<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;

class KecamatanController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'kecamatan'    => '',
            'kabupaten_id'    => '',
            'id'    => ''
        ]);
        
        // return response()->json(['code'=>200, 'message'=>'Data Storeed','data' => $validatedData], 200);
        $store = Kecamatan::updateOrCreate(['id' => $validatedData['id']], $validatedData);
        return response()->json(['code'=>200, 'message'=>'Data Storeed','data' => $validatedData], 200);
    }

    public function show($id){
        $data = Kecamatan::where('id', $id)->get()->first();
        
        return response()->json(['code'=>200, 'message'=>'Data Get','data' => $data], 200);
    }

    public function delete(Request $request){
        $data = Kecamatan::where('id', $request->id)->delete();
        
        return response()->json(['code'=>200, 'message'=>'Data Get','data' => $data], 200);
    }
}
