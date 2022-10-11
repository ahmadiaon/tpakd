<?php

namespace App\Http\Controllers;

use App\Models\Grafik;
use App\Models\Profile;
use App\Models\GrafikDua;
use Illuminate\Http\Request;

class GrafikController extends Controller
{
    public function index(){
        $profile = Profile::get()->first();
        $grafik1 = Grafik::where('is_aktif', 1)->get()->first();
        $grafik2 = GrafikDua::where('is_aktif', 1)->get()->first();

        if(!$grafik1){
           $grafik1 =  Grafik::create(['is_aktif'=>'1']);
        }

        if(!$grafik2){
            $grafik2 =  GrafikDua::create(['is_aktif'=>'1']);
         }


        $news='';
        $data = [
            'news'  => $news,
            'grafik1'=> $grafik1,
            'grafik2'=> $grafik2,
            'profile'   => $profile
        ];
        // dd($data);
        return view('admin.superadmin.grafik.index', $data);
    }
    public function store(Request $request){
        // return $request;
        $validatedData = $request->validate([
            'name'         => 'required|max:255',
            'value_1'       => 'required',
            'value_2'    => 'required',
            'value_3'        => 'required',
            'value_4'        => 'required',
            'name_value_1'       => 'required',
            'name_value_2'    => 'required',
            'name_value_3'        => 'required',
            'name_value_4'        => 'required',
        ]);
        $validatedData['is_aktif'] = 1;

        $store = Grafik::where('id',1)->update($validatedData);
        return redirect('/superadmin/grafik');
    }
    public function storeDua(Request $request){
        // return $request;
        $validatedData = $request->validate([
            'name'         => 'required|max:255',
            'value_1'       => 'required',
            'value_2'    => 'required',
            'value_3'        => 'required',
            'value_4'        => 'required',
            'name_value_1'       => 'required',
            'name_value_2'    => 'required',
            'name_value_3'        => 'required',
            'name_value_4'        => 'required',
        ]);
        $validatedData['is_aktif'] = 1;

        $store = GrafikDua::where('id',1)->update($validatedData);
        return redirect('/superadmin/grafik');
    }
}