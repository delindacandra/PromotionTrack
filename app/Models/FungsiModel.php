<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FungsiModel extends Model
{
    use HasFactory;
    protected $table = 'fungsi';
    protected $primaryKey = 'id_fungsi';
    protected $fillable = ['nama_fungsi'];
}
