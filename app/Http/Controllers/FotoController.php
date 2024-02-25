<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('foto.index')->with([
            'foto' => Foto::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $albums = Album::all();
        return view('foto.create', compact('albums'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Album $album)
    {
        $album->validate([
            'judul_foto' => 'required',
            'deskripsi_foto' => 'required',
            'lokasi_file' => 'required',
            'album_id' => 'required|exists:albums,id',
        ]);

        // Mendapatkan ID pengguna yang sedang masuk
        $user_id = Auth::id();

        // Membuat foto baru dengan atribut yang diberikan dan user_id yang sesuai
        Foto::create([
            'judul_foto' => $album->judul_foto,
            'deskripsi_foto' => $album->deskripsi_foto,
            'lokasi_file' => $album->lokasi_file,
            'album_id' => $album->album_id,
            'user_id' => $user_id, // Menggunakan id pengguna yang sedang masuk
        ]);

        return redirect()->route('foto.index')->with('success','Foto berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Foto $foto)
    {
        return view('foto.show', compact('foto')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Foto $foto)
    {
        return view('foto.edit', compact('foto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $album, Foto $foto)
    {
        $album->validate([
            'judul_foto' => 'required',
            'deskripsi_foto' => 'required',
            'tanggal_unggah' => 'required|date',
            'lokasi_file' => 'required',
            'album_id' => 'required|exists:albums,id',
        ]);

        $foto->update($album->all());

        return redirect()->route('foto.index')
                         ->with('success','Foto berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foto $foto)
    {
        $foto->delete();

        return redirect()->route('foto.index')
                         ->with('success','Foto berhasil dihapus.');
    
    }
}
