<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailBarangKeluarModel extends Model
{
    use HasFactory;
    protected $table = 'detail_barang_keluar';
    protected $primaryKey = 'id_detail_barang_keluar';
    protected $fillable = ['id_barang_keluar', 'id_barang',  'jumlah',  'createdby', 'editedby', 'deletedby'];

    public function barang_keluar(): BelongsTo
    {
        return $this->belongsTo(BarangKeluarModel::class, 'id_barang_keluar', 'id_barang_keluar');
    }

    public function barang(): BelongsTo
    {
        return $this->belongsTo(BarangModel::class, 'id_barang', 'id_barang');
    }
}
