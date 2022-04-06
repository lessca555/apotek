<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class obat extends Model
{
    use HasFactory;

    public function pemesanan_detail(){
        return $this->hasMany('App\Models\PemesananDetail', 'barang_id', 'id_obat');
    }

    
}
