<?php

namespace App\Exports;

use App\trans_reseller;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class transaksireselEX implements FromQuery,WithHeadings
{
    public function __construct(string $bulan)
    {
        $this->bulan = $bulan;
    }

    public function query(){
    	//dd(trans_reseller::wheremonth('created_at', $this->bulan));
    	return trans_reseller::wheremonth('created_at', $this->bulan);
    }

    public function headings(): array
    {
    	return[
    		'id',
    		'Atas nama',
    		'Alamat',
    		'quantity',
    		'status',
    		'tanggal order',
    		'terakhir update',
    		'id user',
    		'id produk'
    	];
    }

}
