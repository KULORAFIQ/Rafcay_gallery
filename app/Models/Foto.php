<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $fillable = ['judul_foto', 'deskripsi_foto', 'lokasi_file', 'album_id', 'user_id'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    protected $guarded = ['id'];
    protected $table = 'foto';
}
