<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class trans_reseller extends Model
{
    protected $fillable = [
        'id_u', 'atas_nama', 'alamat', 'id_p', 'tr_qty', 'status',
    ];

    public function User(){
    	return $this->belongsTo(User::class,'id_u');
	}

	public function produk(){
    	return $this->belongsTo(produk::class,'id_p');
	}


}
