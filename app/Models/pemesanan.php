<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function pemesanan_detail(){
        return $this->hasMany('App\Models\PemesananDetail', 'pesanan_id', 'id');
    }

}
