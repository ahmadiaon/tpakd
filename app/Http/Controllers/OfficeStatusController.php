<?php

namespace App\Http\Controllers;

use App\Models\OfficeStatus;
use Illuminate\Http\Request;

class OfficeStatusController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'id'         => '',
            'office_status'       => ''
        ]);
        $store = OfficeStatus::updateOrCreate(['id' => $validatedData['id']], $validatedData);
        return response()->json(['code'=>200, 'message'=>'Data Storeed','data' => $validatedData], 200);
    }
    public function show($id){
        $data = OfficeStatus::where('id', $id)->get()->first();
        
        return response()->json(['code'=>200, 'message'=>'Data Get','data' => $data], 200);
    }
    public function delete(Request $request){
        $data = OfficeStatus::where('id', $request->id)->delete();
        
        return response()->json(['code'=>200, 'message'=>'Data Get','data' => $data], 200);
    }
}