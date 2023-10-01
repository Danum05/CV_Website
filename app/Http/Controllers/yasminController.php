<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Identitas;
use App\Models\organisasi;
use App\Models\pendidikan;
use App\Models\Portofolio;
use App\Models\skill;
use Illuminate\Http\Request;

class yasminController extends Controller
{
    public function index()
    {
        $identitasData = Identitas::all();
        $portofolioData = Portofolio::all();
        $pendidikanData = pendidikan::all();
        $organisasiData = organisasi::all();
        $skillData = skill::all();

        return view('landing-page.yasmin', compact('identitasData', 'portofolioData','pendidikanData', 'organisasiData','skillData'));
    }
}
