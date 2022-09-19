<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {   
        $newss = News::latest()->get();
        // dd($newss);
        $data = [
            'newss'     => $newss
        ];
        return view('admin.superadmin.berita.index', $data);
    }

    public function create()
    {
        $news='';
        $data = [
            'news'  => $news
        ];
        return view('admin.superadmin.berita.create', $data);
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'id'      => '',
            'title'      => 'required',
            'description'      => 'required',
            'status'      => 'required',
            'date'      => '',
        ]);

        if ($request->file('photo_path')) {
            $imageName =  $request->title . '.' . $request->photo_path->extension();
            $imageName_und =str_replace(' ', '_', $imageName);
            $imageName_tolower = strtolower($imageName_und);
            $imageName_final = random_int(0000,9999).$imageName_tolower;

            $isMoved = $request->photo_path->move('image/berita/', $imageName_final);

            if($isMoved){
                $validatedData['photo_path'] = 'image/berita/'.$imageName_final;
            }
        }

        $slug =str_replace(' ', '-', $request->title);
        $slug_tolower = strtolower($slug);

        $validatedData['excerpt'] = Str::limit(strip_tags($request->description), 70, '...');
        $validatedData['slug'] = $slug_tolower;
        $validatedData['date']  = Carbon::now('Asia/Jakarta')->isoFormat('Y-M-D');;

        // return $validatedData;
        $created = News::updateOrCreate(['id' => $request->id], $validatedData);
        return redirect('/superadmin/berita')->with('success', 'News Added!');   
    }
}
