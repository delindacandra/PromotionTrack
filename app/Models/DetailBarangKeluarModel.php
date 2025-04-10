<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailBarangKeluarModel extends Model
{
    use HasFactory;
    protected $table = 'detail_barangkeluar';
    protected $primaryKey = 'id_detailBarangKeluar';
    protected $fillable = ['id_barangKeluar', 'id_barang',  'jumlah'];

    public function barang_keluar(): BelongsTo
    {
        return $this->belongsTo(BarangKeluarModel::class, 'id_barangKeluar', 'id_barangKeluar');
    }

    public function barang(): BelongsTo
    {
        return $this->belongsTo(BarangModel::class, 'id_barang', 'id_barang');
    }
}
