<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasukModel extends Model
{
    use HasFactory;
    protected $table = 'barang_masuk';
    protected $primaryKey = 'id_barangMasuk';
    protected $fillable = ['tanggal_barangMasuk', 'keterangan'];

    public function detailBarangMasuk()
    {
        return $this->hasMany(DetailBarangMasukModel::class, 'id_barangMasuk', 'id_barangMasuk');
    }
}
