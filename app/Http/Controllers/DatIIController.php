<?php

namespace App\Http\Controllers;

use App\Models\DatII;
use Illuminate\Http\Request;

class DatIIController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'id'         => '',
            'dat_i_i_code'       => '',
            'dat_i_i_name'    => '',
        ]);
        $store = DatII::updateOrCreate(['id' => $validatedData['id']], $validatedData);
        return response()->json(['code'=>200, 'message'=>'Data Storeed','data' => $validatedData], 200);
    }
    public function show($id){
        $data = DatII::where('id', $id)->get()->first();
        
        return response()->json(['code'=>200, 'message'=>'Data Get','data' => $data], 200);
    }
    public function delete(Request $request){
        $data = DatII::where('id', $request->id)->delete();
        
        return response()->json(['code'=>200, 'message'=>'Data Get','data' => $data], 200);
    }
}