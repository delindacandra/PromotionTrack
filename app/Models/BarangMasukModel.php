<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasukModel extends Model
{
    use HasFactory;
    protected $table = 'barang_masuk';
    protected $primaryKey = 'id_barang_masuk';
    protected $fillable = ['tanggal_barang_masuk', 'keterangan',  'createdby', 'editedby', 'deletedby'];

    public function detailBarangMasuk()
    {
        return $this->hasMany(DetailBarangMasukModel::class, 'id_barang_masuk', 'id_barang_masuk');
    }
}
