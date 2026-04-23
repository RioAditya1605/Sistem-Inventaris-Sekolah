<?php

// namespace App\Exports;

// use App\Models\Inventaris;
// use Maatwebsite\Excel\Concerns\FromCollection;

// class BarangkeluarExport implements FromCollection
// {
//     // /**
//     // * @return \Illuminate\Support\Collection
//     // */
//     // public function collection()
//     // {
//     //     return Inventaris::all();
//     // }
//     protected $tanggalMasuk;
//     protected $tanggalKeluar;

//     public function __construct($tanggalMasuk, $tanggalKeluar)
//     {
//         $this->tanggalMasuk = $tanggalMasuk;
//         $this->tanggalKeluar = $tanggalKeluar;
//     }

//     public function collection()
//     {
//         $query = Inventaris::query();

//         if ($this->tanggalMasuk) {
//             $query->whereDate('tanggal_keluar', '>=', $this->tanggalMasuk);
//         }

//         if ($this->tanggalKeluar) {
//             $query->whereDate('tanggal_keluar', '<=', $this->tanggalKeluar);
//         }

//         return $query->get();
//     }
// }

namespace App\Exports;

use App\Models\BarangKeluar;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class BarangKeluarExport implements FromArray, WithStyles, WithColumnWidths, WithEvents
{
    protected $tanggalAwal;
    protected $tanggalAkhir;

    public function __construct($tanggalAwal, $tanggalAkhir)
    {
        $this->tanggalAwal = $tanggalAwal;
        $this->tanggalAkhir = $tanggalAkhir;
    }

    public function array(): array
    {
        // $query = BarangKeluar::with('inventaris')
        //     ->whereHas('inventaris', function ($q) {
        //         $q->where('jumlah', '>', 0);
        //     });
        $query = BarangKeluar::with('inventaris');

        if ($this->tanggalAwal) {
            $query->whereDate('tanggal_keluar', '>=', $this->tanggalAwal);
        }

        if ($this->tanggalAkhir) {
            $query->whereDate('tanggal_keluar', '<=', $this->tanggalAkhir);
        }

        $data = [];

        //JUDUL
        $data[] = ['LAPORAN BARANG KELUAR'];
        $data[] = ['Periode: ' . ($this->tanggalAwal ?? '-') . ' s/d ' . ($this->tanggalAkhir ?? '-')];
        $data[] = [' ']; // kosong

        //HEADER TABEL
        $data[] = ['No', 'Kode Barang', 'Nama Barang', 'Tanggal Keluar', 'Kondisi', 'Jumlah', 'Lokasi'];

        //DATA
        foreach ($query->get() as $index => $item) {
            $data[] = [
                $index + 1,
                $item->inventaris->kode ?? '-',
                $item->inventaris->nama ?? '-',
                $item->tanggal_keluar,
                $item->inventaris->kondisi ?? '-',
                $item->jumlah_keluar,
                $item->inventaris->lokasi ?? '-',
            ];
        }

        return $data;
    }

    // 🔥 STYLE
    public function styles(Worksheet $sheet)
    {
        return [
            // Judul
            1 => ['font' => ['bold' => true, 'size' => 14]],
            
            // Periode
            2 => ['font' => ['italic' => true]],

            // Header tabel (baris ke 4)
            4 => ['font' => ['bold' => true]],
        ];
    }

    // 🔥 LEBAR KOLOM
    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 20,
            'C' => 30,
            'D' => 20,
            'E' => 15,
            'F' => 10,
            'G' => 20,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function($event) {

                $sheet = $event->sheet;

                // 🔥 Hitung jumlah baris
                $totalRows = $sheet->getHighestRow();

                // 🔥 Border dari header sampai data terakhir
                $sheet->getStyle('A4:G' . $totalRows)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => 'thin',
                        ],
                    ],
                ]);

                // 🔥 Rata tengah kolom No & Jumlah
                $sheet->getStyle('A4:G4')
                    ->getAlignment()
                    ->setHorizontal('center');
                // Tengah
                $sheet->getStyle('A5:A' . $totalRows)->getAlignment()->setHorizontal('center'); // No
                $sheet->getStyle('B5:B' . $totalRows)->getAlignment()->setHorizontal('center'); // Kode
                $sheet->getStyle('D5:D' . $totalRows)->getAlignment()->setHorizontal('center'); // Tanggal
                $sheet->getStyle('F5:F' . $totalRows)->getAlignment()->setHorizontal('center'); // Jumlah

                // 🔥 Kiri (mepet kiri tabel)
                $sheet->getStyle('C5:C' . $totalRows)->getAlignment()->setHorizontal('left'); // Nama Barang
                $sheet->getStyle('E5:E' . $totalRows)->getAlignment()->setHorizontal('left'); // Kondisi
                $sheet->getStyle('G5:G' . $totalRows)->getAlignment()->setHorizontal('left'); // Lokasi

                $sheet->getStyle('C5:C' . $totalRows)->getAlignment()->setIndent(1);
                $sheet->getStyle('E5:E' . $totalRows)->getAlignment()->setIndent(1);
                $sheet->getStyle('G5:G' . $totalRows)->getAlignment()->setIndent(1);

                $sheet->mergeCells('A1:G1');
                $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

                // =====================================
                // 🔥 TANDA TANGAN (AMAN & TIDAK MASUK TABEL)
                // =====================================

                $lastTableRow = $sheet->getHighestRow();
                $ttdStart = $lastTableRow + 2;

                // ======================
                // 🔥 KOLOM B (KEPSEK)
                // ======================
                $sheet->setCellValue('B' . $ttdStart, 'MENGETAHUI');
                $sheet->setCellValue('B' . ($ttdStart + 1), 'KEPALA SDN 1 KESUMADADI');

                // Spasi tanda tangan
                $sheet->setCellValue('B' . ($ttdStart + 2), '');
                $sheet->setCellValue('B' . ($ttdStart + 3), '');
                $sheet->setCellValue('B' . ($ttdStart + 4), '');

                // Nama
                $sheet->setCellValue('B' . ($ttdStart + 5), '__________________');

                // NIP
                $sheet->setCellValue('B' . ($ttdStart + 6), 'NIP.                   ');


                // ======================
                // 🔥 KOLOM G (PENGURUS)
                // ======================
                $sheet->setCellValue('G' . $ttdStart, 'Kesumadadi, ' . date('d F Y'));
                $sheet->setCellValue('G' . ($ttdStart + 1), 'PENGURUS BARANG');

                // Spasi tanda tangan
                $sheet->setCellValue('G' . ($ttdStart + 2), '');
                $sheet->setCellValue('G' . ($ttdStart + 3), '');
                $sheet->setCellValue('G' . ($ttdStart + 4), '');

                // Nama
                $sheet->setCellValue('G' . ($ttdStart + 5), '__________________');

                // NIP
                $sheet->setCellValue('G' . ($ttdStart + 6), 'NIP.                   ');


                // ======================
                // 🔥 ALIGNMENT
                // ======================

                // Kepsek (kolom B) rata kiri
                $sheet->getStyle('B' . $ttdStart . ':B' . ($ttdStart + 6))
                    ->getAlignment()->setHorizontal('left');

                // Pengurus (kolom G) tetap di kanan area tapi teks rata kiri
                $sheet->getStyle('G' . $ttdStart . ':G' . ($ttdStart + 6))
                    ->getAlignment()->setHorizontal('left');

                // Nama bold
                $sheet->getStyle('B' . ($ttdStart + 5))->getFont()->setBold(true);
                $sheet->getStyle('G' . ($ttdStart + 5))->getFont()->setBold(true);

                // 🔥 HILANGKAN GARIS DEFAULT EXCEL
                $event->sheet->getDelegate()->setShowGridlines(false);
                
            }
        ];
    }
}
