@extends('layout.dasar')
 @section('konten')
     <!-- START FORM -->
     <form method="POST" action="{{ route('album.update', ['album' => $album->id]) }}">
        @csrf
        @method('PUT')
        <!-- Isi formulir edit di sini -->
        
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="nama_album" class="col-sm-2 col-form-label">Nama_album</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_album" value="{{ $album->nama_album }}" id="nama_album">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="deskripsi" class="col-sm-2 col-form-label">deskripsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="deskripsi" value="{{ $album->deskripsi }}"  id="deskripsi">
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
                </div>
            </div>
        </form>
    <!-- AKHIR FORM -->
 @endsection
 