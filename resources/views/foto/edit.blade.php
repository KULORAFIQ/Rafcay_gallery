<!-- resources/views/fotos/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Foto</div>

                <div class="card-body">
                    <form action="{{ route('foto.update', $foto->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Form fields with pre-filled values from $foto object -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
