<?php

namespace App\Http\Controllers;
use App\Models\identitas;
use App\Models\portofolio; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class skillController extends Controller
{
           /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10;
        if (strlen($katakunci)) {
            $data = skill::where('id', 'like', "%$katakunci%")
                ->orWhere('nama_skill', 'like', "%$katakunci%")
                ->orWhere('persen_skill', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = portofolio::orderBy('id', 'asc')->paginate($jumlahbaris);
        }
        return view('skill.index')->with('data', $data); 
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $identitasData = identitas::all();

        return view('portofolio.create')->with('identitasData', $identitasData); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    Session::flash('nama_skill', $request->nama_skill);
    Session::flash('persen_skill', $request->persen_skill);    

    $validator = Validator::make($request->all(), [
        'identitas_id' => [
            'required',
            'exists:identitas,id',
        ],
        'nama_proyek' => 'required',
        'deskripsi' => 'required',
        'foto_proyek' => 'required|image',
    ]);
    
    if ($validator->fails()) {
        return redirect("portofolio/create")
                    ->withErrors($validator)
                    ->withInput();
    }

    // Periksa apakah file telah diunggah
    if ($request->hasFile('foto_proyek')) {
        $foto_file = $request->file('foto_proyek');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . '.' . $foto_ekstensi;
        $foto_file->move(public_path('foto_proyek'), $foto_nama);
    } else {
        // Tidak ada file yang diunggah, atur nilai $foto_nama ke string kosong
        $foto_nama = 'default.jpg';
    }

    $data = [
        'nama_skill' => $request->nama_skill,
        'persen_skill' => $request->persen_skill,
    ];
    
    $identitas_id = $request->input('identitas_id');
    if ($identitas_id) {
        $data['identitas_id'] = $identitas_id;
    }
    portofolio::create($data);

    return redirect()->to('skill')->with('success', 'Berhasil menambahkan data');
    }

    /**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
   //
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    $data = skill::where('id', $id)->first(); 
    return view('skill.edit')->with('data', $data); 
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
    $data = [
        'nama_skill' => $request->nama_skill,
        'persen_skill' => $request->persen_skill,
    ];

    skill::where('id', $id)->update($data);
    return redirect()->to('skill')->with('success', 'Berhasil melakukan update data');
}


/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    skill::where('id', $id)->delete(); 
    return redirect()->to('skill')->with('success', 'Berhasil melakukan delete data'); 
}
}
