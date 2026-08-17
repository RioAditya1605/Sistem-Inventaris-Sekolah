<?php

namespace App\Exports;

use App\Models\BarangMasuk;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class BarangMasukExport implements FromArray, WithStyles, WithColumnWidths, WithEvents
{
    protected $tanggalAwal;
    protected $tanggalAkhir;
    protected $lokasi;

    public function __construct($tanggalAwal, $tanggalAkhir, $lokasi = null)
    {
        $this->tanggalAwal = $tanggalAwal;
        $this->tanggalAkhir = $tanggalAkhir;
        $this->lokasi = $lokasi;
    }

    public function array(): array
    {
        $query = BarangMasuk::with('inventaris');

        if ($this->tanggalAwal) {
            $query->whereDate('tanggal_masuk', '>=', $this->tanggalAwal);
        }

        if ($this->tanggalAkhir) {
            $query->whereDate('tanggal_masuk', '<=', $this->tanggalAkhir);
        }

        if ($this->lokasi) {
            $query->whereHas('inventaris', function ($q) {
                $q->where('lokasi', $this->lokasi);
            });
        }

        $data = [];

        // JUDUL
        $data[] = ['LAPORAN BARANG MASUK'];
        $data[] = ['Periode: ' . ($this->tanggalAwal ?? '-') . ' s/d ' . ($this->tanggalAkhir ?? '-'). ' | Lokasi: ' .($this->lokasi ?: 'Semua Lokasi')];
        $data[] = [' '];

        // HEADER
        $data[] = ['No', 'Kode Barang', 'Nama Barang', 'Tanggal Masuk', 'Kondisi', 'Jumlah', 'Lokasi'];

        // return $data;
        $grouped = $query->get()->groupBy('inventaris_id');

        $no = 1;

        foreach ($grouped as $items) {

            $first = $items->first();

            $data[] = [
                $no++,
                $first->inventaris->kode ?? '-',
                $first->inventaris->nama ?? '-',
                $first->tanggal_masuk,
                $first->inventaris->kondisi ?? '-',
                $items->sum('jumlah_masuk'),
                $first->inventaris->lokasi ?? '-',
            ];
        }

        return $data;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'size' => 14]],
            2 => ['font' => ['italic' => true]],
            4 => ['font' => ['bold' => true]],
        ];
    }

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

                $totalRows = $sheet->getHighestRow();

                // BORDER TABEL
                $sheet->getStyle('A4:G' . $totalRows)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => 'thin',
                        ],
                    ],
                ]);

                // HEADER
                $sheet->getStyle('A4:G4')->getAlignment()->setHorizontal('center');

                // DATA TENGAH
                $sheet->getStyle('A5:A' . $totalRows)->getAlignment()->setHorizontal('center');
                $sheet->getStyle('B5:B' . $totalRows)->getAlignment()->setHorizontal('center');
                $sheet->getStyle('D5:D' . $totalRows)->getAlignment()->setHorizontal('center');
                $sheet->getStyle('F5:F' . $totalRows)->getAlignment()->setHorizontal('center');

                // DATA KIRI
                $sheet->getStyle('C5:C' . $totalRows)->getAlignment()->setHorizontal('left');
                $sheet->getStyle('E5:E' . $totalRows)->getAlignment()->setHorizontal('left');
                $sheet->getStyle('G5:G' . $totalRows)->getAlignment()->setHorizontal('left');

                $sheet->getStyle('C5:C' . $totalRows)->getAlignment()->setIndent(1);
                $sheet->getStyle('E5:E' . $totalRows)->getAlignment()->setIndent(1);
                $sheet->getStyle('G5:G' . $totalRows)->getAlignment()->setIndent(1);

                // JUDUL CENTER
                $sheet->mergeCells('A1:G1');
                $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

                // TTD
                $lastTableRow = $sheet->getHighestRow();
                $ttdStart = $lastTableRow + 2;

                // KOLOM B (KEPSEK)
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

                // KOLOM G (PENGURUS)
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

                // ALIGNMENT
                // Kepsek (kolom B) rata kiri
                $sheet->getStyle('B' . $ttdStart . ':B' . ($ttdStart + 6))
                    ->getAlignment()->setHorizontal('left');

                // Pengurus (kolom G) tetap di kanan area tapi teks rata kiri
                $sheet->getStyle('G' . $ttdStart . ':G' . ($ttdStart + 6))
                    ->getAlignment()->setHorizontal('left');

                // Nama bold
                $sheet->getStyle('B' . ($ttdStart + 5))->getFont()->setBold(true);
                $sheet->getStyle('G' . ($ttdStart + 5))->getFont()->setBold(true);

                // HILANGKAN GRID
                $event->sheet->getDelegate()->setShowGridlines(false);
            }
        ];
    }
}
