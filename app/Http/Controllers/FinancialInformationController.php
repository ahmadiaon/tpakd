<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FinancialInformation;

class FinancialInformationController extends Controller
{
    
    public function index(){
        $financialInformations = FinancialInformation::whereNot('financial', 'Latar Belakang')->whereNot('financial', 'Dasar Pembentukan')->whereNot('financial', 'Road Map')->get();
        
        $data = [
            'financialInformations'=> $financialInformations,
            'title' => 'Financial Information'
        ];
        // dd($financialInformations);
        return view('admin.superadmin.financial_information.index', $data);
    }
    public function show($id){
        $financialInformations = FinancialInformation::where('slug', $id)->get()->first();
        // dd($financialInformations);
        $data = [
            'financialInformations'=> $financialInformations,
            'title' => 'Financial Information'
        ];
        // dd($financialInformations);
        return view('admin.superadmin.financial_information.edit', $data);
    }
    public function store(Request $request){
        // dd($request);
        $validatedData = $request->validate([
            'title'       => 'required',
            'litte_description'    => 'required',
            'paragrafh_1'    => 'required',
            'paragrafh_2'    => '',
            'paragrafh_3'    => '',
            
        ]);
        if ($request->file('image')) {
            $imageName =  $request->id . $request->image->extension();
            $name = 'image/assets/'.$imageName;
            if(file_exists($name)){
                 $da = unlink($name);
            }
            
            $isMoved = $request->image->move('image/assets/', $imageName);

            if($isMoved){
                $validatedData['path_image'] = 'image/assets/'.$imageName;
            }
        }
        // dd($validatedData);
        $store = FinancialInformation::where('id',$request->id)->update($validatedData);
        // dd($store);
        return redirect('/superadmin/financial-information');
    }
}
