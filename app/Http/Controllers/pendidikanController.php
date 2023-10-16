<?php
namespace App\Http\Controllers;
use App\Models\identitas;
use App\Models\pendidikan; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class pendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $data = Pendidikan::where('id', 'like', "%$katakunci%")
                ->orWhere('nama_instansi', 'like', "%$katakunci%")
                ->orWhere('nama_jurusan', 'like', "%$katakunci%")
                ->orWhere('tahun_masuk', 'like', "%$katakunci%")
                ->orWhere('tahun_lulus', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = Pendidikan::orderBy('id', 'desc')->paginate($jumlahbaris);
        }
        return view('pendidikan.index')->with('data', $data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $identitasData = identitas::all();

        return view('pendidikan.create')->with('identitasData', $identitasData); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama_instansi', $request->nama_instansi);
        Session::flash('nama_jurusan', $request->nama_jurusan);
        Session::flash('tahun_masuk', $request->tahun_masuk);
        Session::flash('tahun_lulus', $request->tahun_lulus);

        $validator = Validator::make($request->all(), [
            'nama_instansi' => 'required|string|max:255',
            'tahun_masuk' => 'required|digits:4|integer',
            'tahun_lulus' => 'required|digits:4|integer|gt:tahun_masuk',
            'identitas_id' => [
                'required',
                'exists:identitas,id',
            ],
            'identitas_id' => [
                'required',
                'exists:identitas,id',
            ],
        ]);
        
        if ($validator->fails()) {
            return redirect("pendidikan/create")
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = [
            'nama_instansi' => $request->nama_instansi,
            'nama_jurusan' => $request->nama_jurusan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_lulus' => $request->tahun_lulus,
        ];
        
        $identitas_id = $request->input('identitas_id');
        if ($identitas_id) {
            $data['identitas_id'] = $identitas_id;
        }
        Pendidikan::create($data); 
    
        return redirect()->to('pendidikan')->with('success', 'Berhasil menambahkan data pendidikan'); 
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
    $data = Pendidikan::where('id', $id)->first(); 
    return view('pendidikan.edit')->with('data', $data); 
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
    Session::flash('nama_instansi', $request->nama_instansi);
    Session::flash('nama_jurusan', $request->nama_jurusan);
    Session::flash('tahun_masuk', $request->tahun_masuk);
    Session::flash('tahun_lulus', $request->tahun_lulus);

    $validator = Validator::make($request->all(), [
        'nama_instansi' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
        'nama_jurusan' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
        'tahun_masuk' => 'required|digits:4|integer',
        'tahun_lulus' => 'required|digits:4|integer|gt:tahun_masuk',
    ]);
    
    if ($validator->fails()) {
        return redirect("pendidikan/{$id}/edit")
                    ->withErrors($validator)
                    ->withInput();
    }

    $data = [
        'nama_instansi' => $request->nama_instansi,
        'nama_jurusan' => $request->nama_jurusan,
        'tahun_masuk' => $request->tahun_masuk,
        'tahun_lulus' => $request->tahun_lulus,
    ];

    Pendidikan::where('id', $id)->update($data);
    return redirect()->to('pendidikan')->with('success', 'Berhasil melakukan update data');
}


/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    Pendidikan::where('id', $id)->delete(); 
    return redirect()->to('pendidikan')->with('success', 'Berhasil melakukan delete data'); 
}

}

