<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\BankAdmin;
use App\Models\PengajuanKur;
use Illuminate\Http\Request;

class PengajuanKurController extends Controller
{
    public function store(Request $request){
    //    return $request;
        $validatedData = $request->validate([
            'kur_nama'         => 'required|max:255',
            'kur_email'       => 'required',
            'kur_nik'    => 'required',
            'kur_gender'        => 'required',
            'kur_no_telepon'        => 'required',
            'kur_tanggal_lahir'        => 'required',
            'bank_id'        => 'required'
        ]);

        $pengajuanKurs = PengajuanKur::create($validatedData);
        return redirect()->intended('/');

        
    }
    public function pengajuanKur(){

        // return session('dataUser')->id;
        $bank_admin = BankAdmin::where('user_id',session('dataUser')->id )->first();
        $bank = Bank::where('id',$bank_admin->bank_id )->first();
        $pengajuanKurs = PengajuanKur::join('banks','banks.id','=','pengajuan_kurs.bank_id')->where('bank_id', $bank->id)->get();
        // return $pengajuanKurs;
        return view('admin.pengajuan_kur.index',[
            'title'=>'pengajuan kur',
            'active' => 'home',
            'datas'  => $pengajuanKurs]);
    }
}
