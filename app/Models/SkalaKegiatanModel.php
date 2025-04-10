<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkalaKegiatanModel extends Model
{
    use HasFactory;
    protected $table = 'skala_kegiatan';
    protected $primaryKey = 'id_skala';
    protected $fillable = ['skala_kegiatan'];
}
