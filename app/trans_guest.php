<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trans_guest extends Model
{
    protected $fillable = [
        'atas_nama', 'alamat', 'id_p', 't_qty'
    ];
}
