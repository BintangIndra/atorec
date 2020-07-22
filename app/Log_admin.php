<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log_admin extends Model
{
    protected $fillable = [
        'id_u', 'nama_db', 'id_tg', 'action'
    ];
}
