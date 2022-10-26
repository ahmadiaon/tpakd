<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Promotion;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PromotionController extends Controller
{
    public function index()
    {   
        $newss = Promotion::latest()->get();
        // dd($newss);
        $data = [
            'newss'     => $newss
        ];
        return view('admin.superadmin.promosi.index', $data);
    }

    public function create()
    {
        $data = [
            'title'  => 'create promosi'
        ];
        return view('admin.superadmin.promosi.create', $data);
    }
    public function store(Request $request){
        // dd($request);
        $validatedData = $request->validate([
            'id'      => '',
            'title'      => 'required',
            'status'      => 'required',
        ]);

        $slug =str_replace(' ', '-', $request->title);
        $slug_tolower = strtolower($slug);

        $validatedData['slug'] = $slug_tolower;
        $validatedData['date']  = Carbon::now('Asia/Jakarta')->isoFormat('Y-M-D');;

        // return $validatedData;
        $created = Promotion::updateOrCreate(['id' => $request->id], $validatedData);

        if ($request->file('image')) {
            $imageName =  $created->id . $request->image->extension();
            $name = 'image/berita/'.$imageName;
            if(file_exists($name)){
                 $da = unlink($name);
            }
            
            $isMoved = $request->image->move('image/berita/', $imageName);

            if($isMoved){
                $validatedData['photo_path'] = 'image/berita/'.$imageName;
            }
            $created = Promotion::updateOrCreate(['id' => $created->id], $validatedData);
        }

        return redirect('/superadmin/promosi')->with('success', 'Done');   
    }
    public function show($id){
        $news = News::where('slug', $id)->get()->first();
        // dd($news);
        $data = [
            'news'=> $news,
            'title' => 'news'
        ];
        return view('admin.superadmin.berita.edit', $data);
    }
    public function delete($slug){
        News::where('slug', $slug)->delete();
        return redirect('/superadmin/berita')->with('success', 'Done');   
    }
}
