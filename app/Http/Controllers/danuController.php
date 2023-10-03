<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Identitas;
use App\Models\organisasi;
use App\Models\pendidikan;
use App\Models\Portofolio;
use App\Models\skill;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class danuController extends Controller
{
    public function index()
    {
        $identitasData = Identitas::all();
        $portofolioData = Portofolio::all();
        $pendidikanData = pendidikan::all();
        $organisasiData = organisasi::all();
        $skillData = skill::all();

        return view('landing-page.danu', compact('identitasData', 'portofolioData', 'pendidikanData', 'organisasiData', 'skillData'));
    }

    public function viewPdf()
    {
        // Ambil data yang ingin Anda tampilkan dalam PDF
        $data = [
            'identitasData' => Identitas::all(),
            'portofolioData' => Portofolio::all(),
            'pendidikanData' => pendidikan::all(),
            'organisasiData' => organisasi::all(),
            'skillData' => skill::all(),
        ];
    
        // Convert view ke HTML
        $html = view('landing-page.danu', $data)->render();
    
        // Load HTML ke Dompdf
        $pdf = new Dompdf();
        $pdf->loadHtml($html);
    
        // Set paper size
        $pdf->setPaper('A4', 'portrait');
    
        // Render PDF (first pass to get total pages)
        $pdf->render();
    
        // Stream atau unduh file PDF
        return $pdf->stream('document.pdf');
    }
    
}
