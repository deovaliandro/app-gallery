<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::all();
        return view('gallery.index', ['title' => 'Admin Gallery', 'gallery' => $gallery,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery.create', ['title' => 'Add Item']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('photo');
        if(!is_null($file))
		    $photo_name = time()."_".$file->getClientOriginalName();
        else
            $photo_name = null;
          
        // isi dengan nama folder tempat kemana file diupload
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery = Gallery::find($id);
        return view('gallery.show', ['title' => 'Detail', 'gallery' => $gallery]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::find($id);
        return view('gallery.edit',['title' => 'Edit Gallery', 'gallery' => $gallery]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
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
        if(!is_null($file))
		    $photo_name = time()."_".$file->getClientOriginalName();
        else
            $photo_name = null;
          
        // isi dengan nama folder tempat kemana file diupload
        $upload_folder = 'data_file';

        if(!is_null($file))
        $file->move($upload_folder,$photo_name);

        $gallery = Gallery::find($id);
        $gallery->name                     = $request->name;
        $gallery->category                 = $request->category;
        $gallery->address                  = $request->address;
        $gallery->long                     = $request->long;
        $gallery->lat                      = $request->lat;
        $gallery->information              = $request->information;
        $gallery->photo                    = $photo_name;

        $gallery->save();
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        $gallery->delete();
        return redirect('/admin');
    }
}
