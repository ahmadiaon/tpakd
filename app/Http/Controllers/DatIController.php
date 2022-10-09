<?php

namespace App\Http\Controllers;

use App\Models\DatI;
use Illuminate\Http\Request;

class DatIController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'id'         => '',
            'dat_i_code'       => '',
            'dat_i_name'    => '',
        ]);
        $store = DatI::updateOrCreate(['id' => $validatedData['id']], $validatedData);
        return response()->json(['code'=>200, 'message'=>'Data Storeed','data' => $validatedData], 200);
    }
    public function show($id){
        $data = DatI::where('id', $id)->get()->first();
        
        return response()->json(['code'=>200, 'message'=>'Data Get','data' => $data], 200);
    }
    public function delete(Request $request){
        $data = DatI::where('id', $request->id)->delete();
        
        return response()->json(['code'=>200, 'message'=>'Data Get','data' => $data], 200);
    }
}