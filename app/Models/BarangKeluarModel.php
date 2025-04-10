<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangKeluarModel extends Model
{
    use HasFactory;
    protected $table = 'barang_keluar';
    protected $primaryKey = 'id_barangeluar';
    protected $fillable = ['tanggal_barangKeluar', 'keterangan', 'keperluan', 'id_permintaan'];


    public function permintaan():BelongsTo {
        return $this->belongsTo(PermintaanModel::class, 'id_permintaan', 'id_permintaan');
    }

    public function detailBarangakeluar()
    {
        return $this->hasMany(DetailBarangKeluarModel::class, 'id_barangKeluar', 'id_barangKeluar');
    }
}
