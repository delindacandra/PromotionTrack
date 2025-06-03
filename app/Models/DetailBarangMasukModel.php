<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailBarangMasukModel extends Model
{
    use HasFactory;
    protected $table = 'detail_barangmasuk';
    protected $primaryKey = 'id_detailBarangMasuk';
    protected $fillable = ['id_barangMasuk', 'id_barang',  'jumlah',  'createdby', 'editedby', 'deletedby'];

    public function barang_masuk(): BelongsTo
    {
        return $this->belongsTo(BarangMasukModel::class, 'id_barangMasuk', 'id_barangMasuk');
    }

    public function barang(): BelongsTo
    {
        return $this->belongsTo(BarangModel::class, 'id_barang', 'id_barang');
    }
}
