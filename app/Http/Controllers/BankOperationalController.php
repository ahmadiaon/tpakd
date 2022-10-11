<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankOperational;

class BankOperationalController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'id'         => '',
            'bank_operational'       => ''
        ]);
        $store = BankOperational::updateOrCreate(['id' => $validatedData['id']], $validatedData);
        return response()->json(['code'=>200, 'message'=>'Data Storeed','data' => $validatedData], 200);
    }
    public function show($id){
        $data = BankOperational::where('id', $id)->get()->first();
        
        return response()->json(['code'=>200, 'message'=>'Data Get','data' => $data], 200);
    }
    public function delete(Request $request){
        $data = BankOperational::where('id', $request->id)->delete();
        
        return response()->json(['code'=>200, 'message'=>'Data Get','data' => $data], 200);
    }
}