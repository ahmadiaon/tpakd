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
        $data = [
            'title'  => 'create news'
        ];
        return view('admin.superadmin.berita.create', $data);
    }
    public function store(Request $request){
        // dd($request);
        $validatedData = $request->validate([
            'id'      => '',
            'title'      => 'required',
            'little_description'      => 'required',
            'paragrafh_1'      => 'required',
            'paragrafh_2'      => 'required',
            'paragrafh_3'      => 'required',
            'status'      => 'required',
        ]);

        $slug =str_replace(' ', '-', $request->title);
        $slug_tolower = strtolower($slug);

        $validatedData['excerpt'] = Str::limit(strip_tags($request->little_description), 70, '...');
        $validatedData['slug'] = $slug_tolower;
        $validatedData['date']  = Carbon::now('Asia/Jakarta')->isoFormat('Y-M-D');;

        // return $validatedData;
        $created = News::updateOrCreate(['id' => $request->id], $validatedData);

        if ($request->file('image')) {
            $imageName =  $created->id .'.'. $request->image->extension();
            $name = 'image/berita/'.$imageName;
            if(file_exists($name)){
                 $da = unlink($name);
            }
            
            $isMoved = $request->image->move('image/berita/', $imageName);

            if($isMoved){
                $validatedData['photo_path'] = 'image/berita/'.$imageName;
            }
            $created = News::updateOrCreate(['id' => $created->id], $validatedData);
        }

        return redirect('/superadmin/berita')->with('success', 'Done');   
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
