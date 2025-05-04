<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorModel extends Model
{
    use HasFactory;
    
    protected $table = 'vendor';
    protected $primaryKey = 'id_vendor';
    protected $fillable = [ 'nama_vendor', 'no_telepon' ];
    
    public function barang(){
        return $this->hasMany(BarangModel::class, 'id_vendor', 'id_vendor');
    }
}
