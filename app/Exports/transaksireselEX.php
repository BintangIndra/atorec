<?php

namespace App\Exports;

use App\trans_reseller;
use Maatwebsite\Excel\Concerns\FromQuery;

class transaksireselEX implements FromQuery
{
    public function __construct(string $bulan)
    {
        $this->bulan = $bulan;
    }

    public function query(){
    	//dd(trans_reseller::wheremonth('created_at', $this->bulan));
    	return trans_reseller::wheremonth('created_at', $this->bulan);
    }

}
