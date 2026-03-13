<?php

namespace App\Exports;

use App\Models\Inventaris;
use Maatwebsite\Excel\Concerns\FromCollection;

class BarangkeluarExport implements FromCollection
{
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Inventaris::all();
    // }
    protected $tanggalMasuk;
    protected $tanggalKeluar;

    public function __construct($tanggalMasuk, $tanggalKeluar)
    {
        $this->tanggalMasuk = $tanggalMasuk;
        $this->tanggalKeluar = $tanggalKeluar;
    }

    public function collection()
    {
        $query = Inventaris::query();

        if ($this->tanggalMasuk) {
            $query->whereDate('tanggal_keluar', '>=', $this->tanggalMasuk);
        }

        if ($this->tanggalKeluar) {
            $query->whereDate('tanggal_keluar', '<=', $this->tanggalKeluar);
        }

        return $query->get();
    }
}
