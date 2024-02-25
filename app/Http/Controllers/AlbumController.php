<?php

namespace App\Http\Controllers;

use app\Models\User;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('album.index')->with([
            'album' => Album::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('album.create');
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
        {
            $request->validate([
                'nama_album' => 'required',
                'deskripsi' => 'required',
            ]);
        
            $album = new Album;
            $album->nama_album = $request->nama_album;
            $album->deskripsi = $request->deskripsi;
            $album->user_id = Auth::id(); // Menggunakan id pengguna yang sedang masuk
            $album->save();
        
            return redirect()->route('album.index')->with('success','Data Berhasil Di Tambahkan.');
        }
        

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        return view('album.show', compact('album')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('album.edit')->with([
            'album' => Album::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
{
    $request->validate([
        'nama_album' => 'required',
        'deskripsi' => 'required',
    ]);

    // Perbarui data album yang ada
    $album->nama_album = $request->nama_album;
    $album->deskripsi = $request->deskripsi;
    $album->save();

    return redirect()->route('album.index')->with('success', 'Album berhasil diperbarui.');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $album->delete();

        return redirect()->route('album.index')
                         ->with('success','Foto berhasil dihapus.');
    }
}
