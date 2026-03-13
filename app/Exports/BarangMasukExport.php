<?php

namespace App\Exports;

use App\Models\Inventaris;
use Maatwebsite\Excel\Concerns\FromCollection;

class BarangMasukExport implements FromCollection
{
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Inventaris::all();
    // }
    // public function collection()
    // {
    //     return Inventaris::select(
    //         'kode',
    //         'nama',
    //         'tanggal_masuk',
    //         'kondisi',
    //         'jumlah',
    //         'lokasi'
    //     )->get();
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
            $query->whereDate('tanggal_masuk', '>=', $this->tanggalMasuk);
        }

        if ($this->tanggalKeluar) {
            $query->whereDate('tanggal_masuk', '<=', $this->tanggalKeluar);
        }

        return $query->select(
            'kode',
            'nama',
            'tanggal_masuk',
            'kondisi',
            'jumlah',
            'lokasi'
        )->get();
    }
}
