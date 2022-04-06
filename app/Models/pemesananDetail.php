<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesananDetail extends Model
{
    use HasFactory;

    public function obat(){
        return $this->belongsTo('App\Models\Obat', 'barang_id', 'id_obat');
    }

    public function pemesanan(){
        return $this->belongsTo('App\Models\Pemesanan', 'pesanan_id', 'id');
    }
}
