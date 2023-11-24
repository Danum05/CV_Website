<?php
namespace App\Http\Controllers;
use App\Models\identitas;
use App\Models\organisasi; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class organisasiUserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $identitasData = identitas::all();

        return view('organisasi_user.create')->with('identitasData', $identitasData); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama_organisasi', $request->nama_organisasi);
        Session::flash('jabatan', $request->jabatan);
        Session::flash('tahun_awal', $request->tahun_awal);
        Session::flash('tahun_akhir', $request->tahun_akhir);

        $validator = Validator::make($request->all(), [
            'nama_organisasi' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'jabatan' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'tahun_awal' => 'required|digits:4|integer',
            'tahun_akhir' => 'required|digits:4|integer|gt:tahun_awal',
            'identitas_id' => [
                'required',
                'exists:identitas,id',
            ],
        ]);
        
        if ($validator->fails()) {
            return redirect("organisasi_user/create")
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = [
            'nama_organisasi' => $request->nama_organisasi,
            'jabatan' => $request->jabatan,
            'tahun_awal' => $request->tahun_awal,
            'tahun_akhir' => $request->tahun_akhir,
        ];

        $identitas_id = $request->input('identitas_id');
        if ($identitas_id) {
            $data['identitas_id'] = $identitas_id;
        }

        organisasi::create($data); 
        return redirect()->to('organisasi_user/'.$identitas_id)->with('success', 'Berhasil menambahkan data'); 
    }
    /**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($identitas_id)
{
    $data = Organisasi::where('identitas_id', $identitas_id)->get(); 
    $identitas = identitas::find($identitas_id);

    return view('organisasi_user.show')->with('data', $data)->with('identitas', $identitas);
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    $data = organisasi::where('id', $id)->first(); 
    return view('organisasi_user.edit')->with('data', $data); 
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
    Session::flash('nama_organisasi', $request->nama_organisasi);
    Session::flash('jabatan', $request->jabatan);
    Session::flash('tahun_awal', $request->tahun_awal);
    Session::flash('tahun_akhir', $request->tahun_akhir);

    $validator = Validator::make($request->all(), [
        'nama_organisasi' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
        'jabatan' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
        'tahun_awal' => 'required|digits:4|integer',
        'tahun_akhir' => 'required|digits:4|integer|gt:tahun_awal',
    ]);
    
    if ($validator->fails()) {
        return redirect("organisasi_user/{$id}/edit")
                    ->withErrors($validator)
                    ->withInput();
    }
    $data = [
        'nama_organisasi' => $request->nama_organisasi,
        'jabatan' => $request->jabatan,
        'tahun_awal' => $request->tahun_awal,
        'tahun_akhir' => $request->tahun_akhir,
    ];

    $organisasi = Organisasi::find($id);
    $identitas_id = $organisasi->identitas_id;

    organisasi::where('id', $id)->update($data);
    return redirect()->to('organisasi_user/'.$identitas_id)->with('success', 'Berhasil melakukan update data');
}


/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $organisasi = Organisasi::find($id);
    $identitas_id = $organisasi->identitas_id;

    Organisasi::where('id', $id)->delete(); 
    return redirect()->to('organisasi_user/'.$identitas_id)->with('success', 'Berhasil melakukan delete data'); 
}


}