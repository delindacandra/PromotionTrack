<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FungsiModel extends Model
{
    use HasFactory;
    protected $table = 'fungsi';
    protected $primaryKey = 'id_fungsi';
    protected $fillable = ['nama_fungsi',  'createdby', 'editedby', 'deletedby'];

    public function barang_keluar()
    {
        return $this->hasMany(BarangKeluarModel::class, 'id_fungsi', 'id_fungsi');
    }
}
