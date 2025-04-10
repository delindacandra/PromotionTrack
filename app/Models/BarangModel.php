<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    use HasFactory;
    protected $table = 'data_barang';
    protected $primaryKey = 'id_barang';
    protected $fillable = ['nama_barang', 'vendor', 'gambar'];

    public function stok(){
        return $this->hasOne(StokModel::class, 'id_barang', 'id_barang');
    }
}
