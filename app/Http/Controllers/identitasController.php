<?php
namespace App\Http\Controllers;
use App\Models\identitas; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class identitasController extends Controller
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
            $data = Identitas::where('id', 'like', "%$katakunci%")
                ->orWhere('nama', 'like', "%$katakunci%")
                ->orWhere('tempat_lahir', 'like', "%$katakunci%")
                ->orWhere('tanggal_lahir', 'like', "%$katakunci%")
                ->orWhere('jenis_kelamin', 'like', "%$katakunci%")
                ->orWhere('agama', 'like', "%$katakunci%")
                ->orWhere('kewarganegaraan', 'like', "%$katakunci%")
                ->orWhere('status', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = Identitas::orderBy('id', 'asc')->paginate($jumlahbaris);
        }
        return view('identitas.index')->with('data', $data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('identitas.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama', $request->nama);
        Session::flash('pekerjaan', $request->pekerjaan);
        Session::flash('tempat_lahir', $request->tempat_lahir);
        Session::flash('tanggal_lahir', $request->tanggal_lahir);
        Session::flash('jenis_kelamin', $request->jenis_kelamin);
        Session::flash('agama', $request->agama);
        Session::flash('kewarganegaraan', $request->kewarganegaraan);
        Session::flash('status', $request->status);
        
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'pekerjaan' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'tempat_lahir' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'agama' => 'required|string|max:255',
            'kewarganegaraan' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'status' => 'required|string|max:255',
            'pas_foto' => 'required|image' 
        ]);
        
        if ($validator->fails()) {
            return redirect('identitas/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $foto_file = $request->file('pas_foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . '.' . $foto_ekstensi;
        $foto_file->move(public_path('pas_foto'), $foto_nama);

        $data = [
            'nama' => $request->nama,
            'pekerjaan' => $request->pekerjaan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'kewarganegaraan' => $request->kewarganegaraan,
            'status' => $request->status,
            'pas_foto' => $foto_nama
        ];

        Identitas::create($data); 
        return redirect()->to('identitas')->with('success', 'Berhasil menambahkan data'); 
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
        $data = Identitas::where('id', $id)->first(); 
        return view('identitas.edit')->with('data', $data); 
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
        Session::flash('nama', $request->nama);
        Session::flash('pekerjaan', $request->pekerjaan);
        Session::flash('tempat_lahir', $request->tempat_lahir);
        Session::flash('tanggal_lahir', $request->tanggal_lahir);
        Session::flash('jenis_kelamin', $request->jenis_kelamin);
        Session::flash('agama', $request->agama);
        Session::flash('kewarganegaraan', $request->kewarganegaraan);
        Session::flash('status', $request->status);
        
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'pekerjaan' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'tempat_lahir' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'agama' => 'required|string|max:255',
            'kewarganegaraan' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'status' => 'required|string|max:255',
            'pas_foto' => 'required'
        ]);
        
        if ($validator->fails()) {
            return redirect("identitas/{$id}/edit")
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $data = [
            'nama' => $request->nama,
            'pekerjaan' => $request->pekerjaan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'kewarganegaraan' => $request->kewarganegaraan,
            'status' => $request->status,
        ];

        if ($request->hasFile('pas_foto')) {

            $foto_file = $request->file('pas_foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis') . '.' . $foto_ekstensi;
            $foto_file->move(public_path('pas_foto'), $foto_nama);

            $data['pas_foto'] = $foto_nama;
        }

        Identitas::where('id', $id)->update($data);
        return redirect()->to('identitas')->with('success', 'Berhasil melakukan update data');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Identitas::where('id', $id)->delete(); 
        return redirect()->to('identitas')->with('success', 'Berhasil melakukan delete data'); 
    }

}

