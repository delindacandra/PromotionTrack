<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailBarangMasukModel extends Model
{
    use HasFactory;
    protected $table = 'detail_barang_masuk';
    protected $primaryKey = 'id_detail_barang_masuk';
    protected $fillable = ['id_barang_masuk', 'id_barang',  'jumlah',  'createdby', 'editedby', 'deletedby'];

    public function barang_masuk(): BelongsTo
    {
        return $this->belongsTo(BarangMasukModel::class, 'id_barang_masuk', 'id_barang_masuk');
    }

    public function barang(): BelongsTo
    {
        return $this->belongsTo(BarangModel::class, 'id_barang', 'id_barang');
    }
}
