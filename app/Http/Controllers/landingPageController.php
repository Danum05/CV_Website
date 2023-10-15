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
    public function danu($identitas_id)
    {
        $identitasData = Identitas::find($identitas_id);
        $portofolioData = Portofolio::where('identitas_id', $identitas_id)->get();
        $pendidikanData = Pendidikan::where('identitas_id', $identitas_id)->get();
        $organisasiData = Organisasi::where('identitas_id', $identitas_id)->get();
        $skillData = Skill::where('identitas_id', $identitas_id)->get();
        $kontakData = Kontak::where('identitas_id', $identitas_id)->first();

        return view('landing-page.danu', compact('identitasData', 'portofolioData', 'pendidikanData', 'organisasiData', 'skillData','kontakData'));
    }

    public function danu2($identitas_id)
    {
        $identitasData = Identitas::find($identitas_id);
        $portofolioData = Portofolio::where('identitas_id', $identitas_id)->get();
        $pendidikanData = Pendidikan::where('identitas_id', $identitas_id)->get();
        $organisasiData = Organisasi::where('identitas_id', $identitas_id)->get();
        $skillData = Skill::where('identitas_id', $identitas_id)->get();
        $kontakData = Kontak::where('identitas_id', $identitas_id)->first();

        return view('landing-page.danu2', compact('identitasData', 'portofolioData', 'pendidikanData', 'organisasiData', 'skillData','kontakData'));
    }

    public function rahma($identitas_id)
    {
        $identitasData = Identitas::find($identitas_id);
        $portofolioData = Portofolio::where('identitas_id', $identitas_id)->get();
        $pendidikanData = Pendidikan::where('identitas_id', $identitas_id)->get();
        $organisasiData = Organisasi::where('identitas_id', $identitas_id)->get();
        $skillData = Skill::where('identitas_id', $identitas_id)->get();
        $kontakData = Kontak::where('identitas_id', $identitas_id)->first();
    
        return view('landing-page.rahma', compact('identitasData', 'portofolioData', 'pendidikanData', 'organisasiData', 'skillData', 'kontakData'));
    }
    

    public function rahma2($identitas_id)
    {
        $identitasData = Identitas::find($identitas_id);
        $portofolioData = Portofolio::where('identitas_id', $identitas_id)->get();
        $pendidikanData = Pendidikan::where('identitas_id', $identitas_id)->get();
        $organisasiData = Organisasi::where('identitas_id', $identitas_id)->get();
        $skillData = Skill::where('identitas_id', $identitas_id)->get();
        $kontakData = Kontak::where('identitas_id', $identitas_id)->first();

        return view('landing-page.rahma2', compact('identitasData', 'portofolioData','pendidikanData', 'organisasiData','skillData','kontakData'));
    }

    public function reihan($identitas_id)
    {
        $identitasData = Identitas::find($identitas_id);
        $portofolioData = Portofolio::where('identitas_id', $identitas_id)->get();
        $pendidikanData = Pendidikan::where('identitas_id', $identitas_id)->get();
        $organisasiData = Organisasi::where('identitas_id', $identitas_id)->get();
        $skillData = Skill::where('identitas_id', $identitas_id)->get();
        $kontakData = Kontak::where('identitas_id', $identitas_id)->first();

        return view('landing-page.reihan', compact('identitasData', 'portofolioData','pendidikanData', 'organisasiData','skillData','kontakData'));
    }

    public function reihan2($identitas_id)
    {
        $identitasData = Identitas::find($identitas_id);
        $portofolioData = Portofolio::where('identitas_id', $identitas_id)->get();
        $pendidikanData = Pendidikan::where('identitas_id', $identitas_id)->get();
        $organisasiData = Organisasi::where('identitas_id', $identitas_id)->get();
        $skillData = Skill::where('identitas_id', $identitas_id)->get();
        $kontakData = Kontak::where('identitas_id', $identitas_id)->first();

        return view('landing-page.reihan2', compact('identitasData', 'portofolioData','pendidikanData', 'organisasiData','skillData','kontakData'));
    }

    public function yasmin($identitas_id)
    {
        $identitasData = Identitas::find($identitas_id);
        $portofolioData = Portofolio::where('identitas_id', $identitas_id)->get();
        $pendidikanData = Pendidikan::where('identitas_id', $identitas_id)->get();
        $organisasiData = Organisasi::where('identitas_id', $identitas_id)->get();
        $skillData = Skill::where('identitas_id', $identitas_id)->get();
        $kontakData = Kontak::where('identitas_id', $identitas_id)->first();

        return view('landing-page.yasmin', compact('identitasData', 'portofolioData','pendidikanData', 'organisasiData','skillData','kontakData'));
    }

    public function yasmin2($identitas_id)
    {
        $identitasData = Identitas::find($identitas_id);
        $portofolioData = Portofolio::where('identitas_id', $identitas_id)->get();
        $pendidikanData = Pendidikan::where('identitas_id', $identitas_id)->get();
        $organisasiData = Organisasi::where('identitas_id', $identitas_id)->get();
        $skillData = Skill::where('identitas_id', $identitas_id)->get();
        $kontakData = Kontak::where('identitas_id', $identitas_id)->first();

        return view('landing-page.yasmin2', compact('identitasData', 'portofolioData','pendidikanData', 'organisasiData','skillData','kontakData'));
    }

    public function viewPdf($identitas_id)
    {
        // Pastikan $id valid dan buat validasi sesuai kebutuhan Anda
        if (!is_numeric($identitas_id)) {
            // Handle kesalahan jika $id tidak valid
            return abort(404); // Contoh: Anda dapat menampilkan halaman 404
        }
    
        // Ambil data yang ingin Anda tampilkan dalam PDF berdasarkan $id
        $identitasData = Identitas::find($identitas_id);
        $portofolioData = Portofolio::where('identitas_id', $identitas_id)->get();
        $pendidikanData = Pendidikan::where('identitas_id', $identitas_id)->get();
        $organisasiData = Organisasi::where('identitas_id', $identitas_id)->get();
        $skillData = Skill::where('identitas_id', $identitas_id)->get();
        $kontakData = Kontak::where('identitas_id', $identitas_id)->first();
    
        // Validasi apakah data ditemukan
        if (!$identitasData) {
            // Handle kesalahan jika data tidak ditemukan
            return abort(404); // Contoh: Anda dapat menampilkan halaman 404
        }
    
        $data = [
            'id' => $identitas_id,
            'identitasData' => $identitasData,
            'portofolioData' => $portofolioData,
            'pendidikanData' => $pendidikanData,
            'organisasiData' => $organisasiData,
            'skillData' => $skillData,
            'kontakData' => $kontakData,
        ];
    
        $pdf = PDF::loadView('landing-page.pdf', $data);
    
        // Aktifkan Local File Access supaya bisa pakai file external (cth File .CSS)
        $pdf->setOption('enable-local-file-access', true);
    
        // Stream untuk menampilkan tampilan PDF pada browser
        return $pdf->stream('table.pdf');
    }
    
    
}
