<?php

namespace App\Http\Controllers;
use App\Models\identitas;
use App\Models\gallery; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class galleryUserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $identitasData = identitas::all();

        return view('gallery_user.create')->with('identitasData', $identitasData); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'identitas_id' => [
                'required',
                'exists:identitas,id',
            ],
            'foto' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect("gallery_user/create")
                        ->withErrors($validator)
                        ->withInput();
        }

        // Periksa apakah file telah diunggah
        if ($request->hasFile('foto')) {
            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis') . '.' . $foto_ekstensi;
            $foto_file->move(public_path('foto'), $foto_nama);
        } else {
            // Tidak ada file yang diunggah, atur nilai $foto_nama ke string kosong
            $foto_nama = 'default.jpg';
        }

        $data = [
            'foto' => $foto_nama
        ];
        
        $identitas_id = $request->input('identitas_id');
        if ($identitas_id) {
            $data['identitas_id'] = $identitas_id;
        }

        gallery::create($data);

        return redirect()->to('gallery_user/'.$identitas_id)->with('success', 'Berhasil menambahkan data');
    }

    /**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($identitas_id)
{
    $data = Gallery::where('identitas_id', $identitas_id)->get(); 
    $identitas = identitas::find($identitas_id);

    return view('gallery_user.show')->with('data', $data)->with('identitas', $identitas);
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    $data = gallery::where('id', $id)->first(); 
    return view('gallery_user.edit')->with('data', $data); 
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
    if ($request->hasFile('foto')) {

        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . '.' . $foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);

        $data['foto'] = $foto_nama;
    }

    $gallery = Gallery::find($id);
    $identitas_id = $gallery->identitas_id;

    Gallery::where('id', $id)->update($data);
    return redirect()->to('gallery_user/'.$identitas_id)->with('success', 'Berhasil melakukan update data');
}


/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $gallery = Gallery::find($id);
    $identitas_id = $gallery->identitas_id;

    gallery::where('id', $id)->delete(); 
    return redirect()->to('gallery_user/'.$identitas_id)->with('success', 'Berhasil melakukan delete data'); 
}
}
