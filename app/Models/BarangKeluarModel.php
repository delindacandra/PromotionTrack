<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangKeluarModel extends Model
{
    use HasFactory;
    protected $table = 'barang_keluar';
    protected $primaryKey = 'id_barangKeluar';
    protected $fillable = ['tanggal_barangKeluar', 'keterangan', 'keperluan', 'id_permintaan', 'id_fungsi',  'createdby', 'editedby', 'deletedby'];


    public function permintaan():BelongsTo {
        return $this->belongsTo(PermintaanModel::class, 'id_permintaan', 'id_permintaan');
    }

    public function detailBarangkeluar()
    {
        return $this->hasMany(DetailBarangKeluarModel::class, 'id_barangKeluar', 'id_barangKeluar');
    }

    public function fungsi(){
        return $this->belongsTo(FungsiModel::class, 'id_fungsi', 'id_fungsi');
    }

    public function sales_area(){
        return $this->belongsTo(SAModel::class, 'id_sa', 'id_sa');
    }
    protected $casts = [
        'tanggal_barangKeluar' => 'datetime',
    ];
}
