<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $gallery = Gallery::all();
        return view('home', ['title' => 'Gallery', 'gallery' => $gallery]);
    }

    public function show($id)
    {
        $gallery = Gallery::find($id);
        return view('detail', ['title' => '$gallery->title', 'gallery' => $gallery]);
    }
}
