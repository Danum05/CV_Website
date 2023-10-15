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
use PDF; //import Fungsi PDF

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
    
        $pdf = pdf::loadView('landing-page.pdf', $data);

        //Aktifkan Local File Access supaya bisa pakai file external ( cth File .CSS )
        $pdf->setOption('enable-local-file-access', true);

        // Stream untuk menampilkan tampilan PDF pada browser
        return $pdf->stream('table.pdf');

        // return $pdf->download('table.pdf');
    }
    
}
