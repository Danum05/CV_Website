<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Identitas;
use Illuminate\Http\Request;


class homeController extends Controller
{
    public function home()
    {
        $identitas = Identitas::all();

        return view('home', ['identitas' => $identitas]);
    }

}