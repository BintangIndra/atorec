<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{	
    protected $fillable = [
        'nama_p', 'harga', 'harga_r', 'qty_p', 'img_url'
    ];

    protected $primaryKey = 'id';


    public 	function trans_resellers(){
        return $this->hasMany(trans_reseller::class);
    }
}
