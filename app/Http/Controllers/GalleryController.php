<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    public function __construct() {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index()
    {
        $gallery = Gallery::all();
        return view('gallery.index', ['title' => 'Admin Panel', 'gallery' => $gallery,]);
    }

    public function create()
    {
        return view('gallery.create', ['title' => 'Add Item']);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'          => 'required',
            'category'      => 'required',
            'address'       => 'required',
            'long'          => 'required',
            'lat'           => 'required',
            'information'   => 'required',
            'photo'         => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        $file = $request->file('photo');
        if(!is_null($file))
		    $photo_name = time()."_".$file->getClientOriginalName();
        else
            $photo_name = null;
          
        $upload_folder = 'data_file';

        if(!is_null($file))
            $file->move($upload_folder,$photo_name);
            
        Gallery::create([
            'name'                       => $request->name,
            'category'                   => $request->category,
            'address'                    => $request->address,
            'long'                       => $request->long,
            'lat'                        => $request->lat,
            'information'                => $request->information,
            'photo'                      => $photo_name
        ]);
     
        return redirect('/admin');
    }

    public function show($id)
    {
        $gallery = Gallery::find($id);
        return view('gallery.show', ['title' => 'Detail', 'gallery' => $gallery]);
    }

    public function edit($id)
    {
        $gallery = Gallery::find($id);
        return view('gallery.edit',['title' => 'Edit', 'gallery' => $gallery]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'          => 'required',
            'category'      => 'required',
            'address'       => 'required',
            'long'          => 'required',
            'lat'           => 'required',
            'information'   => 'required',
            'photo'         => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('photo');
        if($file){
		    $photo_name = time()."_".$file->getClientOriginalName();
            $upload_folder = 'data_file';
            $file->move($upload_folder,$photo_name);
        }

        if($file){
            $gallery = Gallery::find($id);
            $gallery->name                     = $request->name;
            $gallery->category                 = $request->category;
            $gallery->address                  = $request->address;
            $gallery->long                     = $request->long;
            $gallery->lat                      = $request->lat;
            $gallery->information              = $request->information;
            $gallery->photo                    = $photo_name;
        }else{
            $gallery = Gallery::find($id);
            $gallery->name                     = $request->name;
            $gallery->category                 = $request->category;
            $gallery->address                  = $request->address;
            $gallery->long                     = $request->long;
            $gallery->lat                      = $request->lat;
            $gallery->information              = $request->information;
        }


        $gallery->save();
        return redirect('/admin');
    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        $gallery->delete();
        return redirect('/admin');
    }
}
