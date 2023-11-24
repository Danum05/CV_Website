<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Identitas;
use App\Models\organisasi;
use App\Models\pendidikan;
use App\Models\Portofolio;
use App\Models\skill;
use App\Models\gallery;
use App\Models\kontak;
use Illuminate\Http\Request;
use PDF; //import Fungsi PDF

class landingPageController extends Controller
{
    public function dashboard($name)
    {
        $identitasData = Identitas::where('nama', $name)->first();
        if (!$identitasData) {
            // Handle jika data tidak ditemukan
        }
    
        $identitas_id = $identitasData->id;
    
        $portofolioData = Portofolio::where('identitas_id', $identitas_id)->get();
        $pendidikanData = Pendidikan::where('identitas_id', $identitas_id)->get();
        $organisasiData = Organisasi::where('identitas_id', $identitas_id)->get();
        $skillData = Skill::where('identitas_id', $identitas_id)->get();
        $galeriData = Gallery::where('identitas_id', $identitas_id)->get();
        $kontakData = Kontak::where('identitas_id', $identitas_id)->first();
    
        return view('landing-page.dashboard', compact('identitasData', 'portofolioData', 'pendidikanData', 'organisasiData', 'skillData', 'galeriData', 'kontakData'));
    }
    
    public function dashboard2($name)
    {
        $identitasData = Identitas::where('nama', $name)->first();
        if (!$identitasData) {
            // Handle jika data tidak ditemukan
        }
    
        $identitas_id = $identitasData->id;
    
        $portofolioData = Portofolio::where('identitas_id', $identitas_id)->get();
        $pendidikanData = Pendidikan::where('identitas_id', $identitas_id)->get();
        $organisasiData = Organisasi::where('identitas_id', $identitas_id)->get();
        $skillData = Skill::where('identitas_id', $identitas_id)->get();
        $galeriData = Gallery::where('identitas_id', $identitas_id)->get();
        $kontakData = Kontak::where('identitas_id', $identitas_id)->first();
    
        return view('landing-page.dashboard2', compact('identitasData', 'portofolioData', 'pendidikanData', 'organisasiData', 'skillData', 'galeriData', 'kontakData'));
    }
    
    public function viewPdf($name)
    {
    $identitasData = Identitas::where('nama', $name)->first();
    
    if (!$identitasData) {
        return abort(404); // Menangani jika data tidak ditemukan
    }

    $identitas_id = $identitasData->id;
    
    // Pastikan $identitas_id valid
    if (!is_numeric($identitas_id)) {
        return abort(404); // Menangani jika $identitas_id tidak valid
    }
    
    $portofolioData = Portofolio::where('identitas_id', $identitas_id)->get();
    $pendidikanData = Pendidikan::where('identitas_id', $identitas_id)->get();
    $organisasiData = Organisasi::where('identitas_id', $identitas_id)->get();
    $skillData = Skill::where('identitas_id', $identitas_id)->get();
    $kontakData = Kontak::where('identitas_id', $identitas_id)->first();
    
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
