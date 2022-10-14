<?php

namespace App\Http\Controllers;

use Mail;
use Carbon\Carbon;
use App\Models\Bank;
use App\Mail\SendMail;
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
        $validatedData['date_pending']  = Carbon::today('Asia/Jakarta')->isoFormat('Y-M-D');
        $validatedData['status']  = 'pending';
        $pengajuanKurs = PengajuanKur::create($validatedData);


        $id_kur = 'KUR-'.$pengajuanKurs->id;
        $mailData = [
            'title' => 'Pengajuan KUR TPKAD',
            'id_pengajuan'  => $id_kur,
            'body' => 'Anda telah melakukan pengajuan, dengan nomor pengajuan :'.$id_kur.' Silahkan cek secara berkala pada web'
        ];   
        //  dd($mailData);
        Mail::to($pengajuanKurs->kur_email)->send(new SendMail($mailData));
        return view('pub.pengajuan_sukses',[
            'title'=>'pengajuan kur',
            'active' => 'home',
            'mail_data' => $mailData,
            'id_kur'    => $id_kur,
            'data'     => $pengajuanKurs,
        ]);

    }
    public function pengajuanKur(){

        // return session('dataUser')->id;
        $bank_admin = BankAdmin::where('user_id',session('dataUser')->id )->first();
        $bank = Bank::where('id',$bank_admin->bank_id )->first();
        $pengajuanKurs = PengajuanKur::join('banks','banks.id','=','pengajuan_kurs.bank_id')->where('bank_id', $bank->id)->get();
        // return $pengajuanKurs;
        return view('admin.pengajuan.index',[
            'title'=>'pengajuan kur',
            'active' => 'home',
            'datas'  => $pengajuanKurs]);
    }
}
