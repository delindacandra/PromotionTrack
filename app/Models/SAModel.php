<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SAModel extends Model
{
    use HasFactory;
    protected $table = 'sales_area';
    protected $primaryKey = 'id_sa';
    protected $fillable = ['nama_sa',  'createdby', 'editedby', 'deletedby'];
}
