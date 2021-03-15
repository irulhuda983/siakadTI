<?php

namespace App\Exports;

use App\Models\Kurikulum;
use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class KhsExport implements FromView, WithColumnWidths, WithDrawings
{
    protected $nim;
    protected $semester;
    // protected $periode;

    // public function __construct(string $nim, int $semester, int $periode)
    public function __construct(string $nim, int $semester)
    {
        $this->nim = $nim;
        $this->semester = $semester;
        // $this->periode = $periode;
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('dist/img/unugiri.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('B1');

        return $drawing;
    }

    public function columnWidths(): array
    {
        return [
            'A' => 4,
            'B' => 35,
            'C' => 20,            
            'D' => 20,            
            'E' => 20,            
            'F' => 20,            
            'G' => 20,                      
            'H' => 50,                      
        ];
    }
    
    public function view(): View
    {
        $data = Kurikulum::khs($this->nim, $this->semester);
        $khs = $data['khs'];
        $total = $data['total'];
        $totalSks = $data['totalSks'];
        $mahasiswa = $data['mahasiswa'];
        $ipk_sementara = $data['ipk_sementara'];

        return view('exports.khs', compact('khs', 'total', 'totalSks', 'mahasiswa', 'ipk_sementara'));
    }
}
