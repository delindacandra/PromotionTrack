<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StokModel extends Model
{
    use HasFactory;
    protected $table = 'stok';
    protected $primaryKey = 'id_stok';
    protected $fillable = ['id_barang', 'jumlah', 'createdby', 'editedby', 'deletedby'];
    public $timestamps = true;

    public function barang(): BelongsTo{
        return $this->belongsTo(BarangModel::class, 'id_barang', 'id_barang');
    }
}
