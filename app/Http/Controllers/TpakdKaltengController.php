<?php

namespace App\Http\Controllers;

use App\Models\TpakdKalteng;
use Illuminate\Http\Request;

class TpakdKaltengController extends Controller
{
    public function index(){
        $tpakd_kaltengs = TpakdKalteng::latest()->get();
        // dd($tpakd_kaltengs);
        $data = [
            'tpakd_kaltengs'=> $tpakd_kaltengs,
            'title' => 'Tpakd Kalteng'
        ];
        // dd($data);
        return view('admin.superadmin.tpakd_kalteng.index', $data);
    }
    public function create(){
        // dd($tpakd_kalteng);
        $data = [
            'title' => 'Tpakd Information'
        ];
        // dd($financialInformations);
        return view('admin.superadmin.tpakd_kalteng.create', $data);
    }
    public function show($id){
        $tpakd_kalteng = TpakdKalteng::where('slug', $id)->get()->first();
        // dd($tpakd_kalteng);
        $data = [
            'tpakd_kalteng'=> $tpakd_kalteng,
            'title' => 'Tpakd Information'
        ];
        // dd($financialInformations);
        return view('admin.superadmin.tpakd_kalteng.edit', $data);
    }
    public function store(Request $request){
        // dd($request);
        $validatedData = $request->validate([
            'id'      => '',
            'slug'      => '',
            'name'      => 'required',
            'status'      => 'required',
        ]);
        if($validatedData['slug']  == ''){
            $slug =str_replace(' ', '-', $request->name);
            $slug_tolower = strtolower($slug);
    
            $validatedData['slug'] = $slug_tolower;
        }
       

        // return $validatedData;
        $created = TpakdKalteng::updateOrCreate(['id' => $request->id], $validatedData);

        if ($request->file('image')) {
            $imageName =  $created->id . $request->image->extension();
            $name = 'assets/img/'.$imageName;
            if(file_exists($name)){
                 $da = unlink($name);
            }
            
            $isMoved = $request->image->move('assets/img/', $imageName);

            if($isMoved){
                $validatedData['path_image'] = 'assets/img/'.$imageName;
            }
            $created = TpakdKalteng::updateOrCreate(['id' => $created->id], $validatedData);
        }

        return redirect('/superadmin/tpakd-kalteng')->with('success', 'Done');   
    }

    public function delete($slug){
        TpakdKalteng::where('slug', $slug)->delete();
        return redirect('/superadmin/tpakd-kalteng')->with('success', 'Done');   
    }
}
