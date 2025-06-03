<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UsersModel extends Authenticatable
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id_users';
    protected $fillable = ['id_level', 'id_sa', 'id_fungsi', 'email', 'password',  'createdby', 'editedby', 'deletedby'];    

    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'id_level', 'id_level');
    }

    public function sales_area(): BelongsTo{
        return $this->belongsTo(SAModel::class, 'id_sa', 'id_sa');
    }

    public function fungsi(): BelongsTo{
        return $this->belongsTo(FungsiModel::class, 'id_fungsi', 'id_fungsi');
    }
}
