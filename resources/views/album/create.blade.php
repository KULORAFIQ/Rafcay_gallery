@extends('layout.dasar')
@section('konten')
    <!-- START FORM -->
<form action="{{ route('album.store') }}" method="POST">
   @csrf
   <div class="my-3 p-3 bg-body rounded shadow-sm">
       <div class="mb-3 row">
           <label for="nama_album" class="col-sm-2 col-form-label">Nama_album</label>
           <div class="col-sm-10">
               <input type="text" class="form-control" name="nama_album" id="nama_album">
           </div>
       </div>
       <div class="mb-3 row">
           <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
           <div class="col-sm-10">
               <input type="text" class="form-control" name="deskripsi" id="deskripsi">
           </div>
       </div>
       <div class="mb-3 row">
           <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
       </div>
   </div>
</form>
   <!-- AKHIR FORM -->
@endsection
