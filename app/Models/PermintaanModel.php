<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PermintaanModel extends Model
{
    use HasFactory;
    protected $table = 'permintaan';
    protected $primaryKey = 'id_permintaan';
    protected $fillable = ['id_users', 'id_skala', 'tanggal_diperlukan', 'jumlah', 'keperluan', 'keterangan', 'dokumen'];

    public function users(): BelongsTo
    {
        return $this->belongsTo(UsersModel::class, 'id_users', 'id_users');
    }

    public function skala(): BelongsTo
    {
        return $this->belongsTo(SkalaKegiatanModel::class, 'id_skala', 'id_skala');
    }
}
