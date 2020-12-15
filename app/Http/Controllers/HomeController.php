<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        // $gallery = Gallery::all()->paginate(9);
        $gallery = DB::table('gallery')->paginate(6);
        return view('home', ['title' => 'Gallery', 'gallery' => $gallery]);
    }

    public function show($id)
    {
        $gallery = Gallery::find($id);
        return view('detail', ['title' => '$gallery->title', 'gallery' => $gallery]);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $gallery = DB::table('gallery')->where('name','like',"%".$search."%")->paginate();
        return view('home',['gallery' => $gallery]);
    }
}
