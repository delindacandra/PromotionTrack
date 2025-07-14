<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    use HasFactory;
    protected $table = 'data_barang';
    protected $primaryKey = 'id_barang';
    protected $fillable = ['nama_barang', 'id_vendor', 'gambar', 'createdby', 'editedby', 'deletedby'];

    public function stok(){
        return $this->hasOne(StokModel::class, 'id_barang', 'id_barang');
    }
    public function vendor(){
        return $this->belongsTo(VendorModel::class, 'id_vendor', 'id_vendor');
    }
    public function detailBarangKeluar(){
        return $this->hasMany(DetailBarangKeluarModel::class, 'id_barang', 'id_barang');
    }
}
