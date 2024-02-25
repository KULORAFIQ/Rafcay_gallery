<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        return view('gallery.index'); // Mengembalikan tampilan untuk halaman awal galeri
    }
}
