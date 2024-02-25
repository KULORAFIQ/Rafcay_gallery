@extends('layout.dasar')
@section('konten')
<!-- START FORM -->
<form action="{{ route('foto.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="judul_foto" class="col-sm-2 col-form-label">Judul Foto</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="judul_foto" id="judul_foto">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="deskripsi_foto" class="col-sm-2 col-form-label">Deskripsi Foto</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="deskripsi_foto" id="deskripsi_foto">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="lokasi_file" class="col-sm-2 col-form-label">Lokasi File</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name="lokasi_file" id="lokasi_file">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="album_id" class="col-sm-2 col-form-label">Album</label>
            <div class="col-sm-10">
                <select class="form-control" name="album_id" id="album_id">
                    @foreach($albums as $album)
                        <option value="{{ $album->id }}">{{ $album->nama_album }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
            </div>
        </div>
    </div>
 </form>
 <!-- AKHIR FORM -->
 @endsection