<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Identitas;
use App\Models\organisasi;
use App\Models\pendidikan;
use App\Models\Portofolio;
use App\Models\skill;
use App\Models\kontak;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class landingPageController extends Controller
{
    public function danu()
    {
        $identitasData = Identitas::all();
        $portofolioData = Portofolio::all();
        $pendidikanData = pendidikan::all();
        $organisasiData = organisasi::all();
        $skillData = skill::all();
        $kontakData = kontak::all();

        return view('landing-page.danu', compact('identitasData', 'portofolioData', 'pendidikanData', 'organisasiData', 'skillData','kontakData'));
    }

    public function danu2()
    {
        $identitasData = Identitas::all();
        $portofolioData = Portofolio::all();
        $pendidikanData = pendidikan::all();
        $organisasiData = organisasi::all();
        $skillData = skill::all();
        $kontakData = kontak::all();

        return view('landing-page.danu2', compact('identitasData', 'portofolioData', 'pendidikanData', 'organisasiData', 'skillData','kontakData'));
    }

    public function rahma()
    {
        $identitasData = Identitas::all();
        $portofolioData = Portofolio::all();
        $pendidikanData = pendidikan::all();
        $organisasiData = organisasi::all();
        $skillData = skill::all();
        $kontakData = kontak::all();

        return view('landing-page.rahma', compact('identitasData', 'portofolioData','pendidikanData', 'organisasiData','skillData','kontakData'));
    }

    public function rahma2()
    {
        $identitasData = Identitas::all();
        $portofolioData = Portofolio::all();
        $pendidikanData = pendidikan::all();
        $organisasiData = Organisasi::all();
        $skillData = skill::all();
        $kontakData = kontak::all();

        return view('landing-page.rahma2', compact('identitasData', 'portofolioData','pendidikanData', 'organisasiData','skillData','kontakData'));
    }

    public function reihan()
    {
        $identitasData = Identitas::all();
        $portofolioData = Portofolio::all();
        $pendidikanData = pendidikan::all();
        $organisasiData = organisasi::all();
        $skillData = skill::all();
        $kontakData = kontak::all();

        return view('landing-page.reihan', compact('identitasData', 'portofolioData','pendidikanData', 'organisasiData','skillData','kontakData'));
    }

    public function reihan2()
    {
        $identitasData = Identitas::all();
        $portofolioData = Portofolio::all();
        $pendidikanData = pendidikan::all();
        $organisasiData = organisasi::all();
        $skillData = skill::all();
        $kontakData = kontak::all();

        return view('landing-page.reihan2', compact('identitasData', 'portofolioData','pendidikanData', 'organisasiData','skillData','kontakData'));
    }

    public function yasmin()
    {
        $identitasData = Identitas::all();
        $portofolioData = Portofolio::all();
        $pendidikanData = pendidikan::all();
        $organisasiData = organisasi::all();
        $skillData = skill::all();
        $kontakData = kontak::all();

        return view('landing-page.yasmin', compact('identitasData', 'portofolioData','pendidikanData', 'organisasiData','skillData','kontakData'));
    }

    public function yasmin2()
    {
        $identitasData = Identitas::all();
        $portofolioData = Portofolio::all();
        $pendidikanData = pendidikan::all();
        $organisasiData = organisasi::all();
        $skillData = skill::all();
        $kontakData = kontak::all();

        return view('landing-page.yasmin2', compact('identitasData', 'portofolioData','pendidikanData', 'organisasiData','skillData','kontakData'));
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
            'kontakData' => kontak::all(),
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
