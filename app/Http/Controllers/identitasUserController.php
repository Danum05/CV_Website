<?php

namespace App\Http\Controllers;

use App\Models\Identitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class identitasUserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id)
    {
        $user = User::find($user_id);
        $UserData = User::all();

        return view('identitas_user.create',['user' => $user])->with('UserData', $UserData);
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
    
        $data = [
            'identitas_id' => auth()->user()->id,
            'nama' => $request->nama,
            'pekerjaan' => $request->pekerjaan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'kewarganegaraan' => $request->kewarganegaraan,
            'status' => $request->status,
            'pas_foto' => '', // Initialize or handle as needed
            'user_id' => [
                'required',
                'exists:users,id',
            ],
        ];
    
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'pekerjaan' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'tempat_lahir' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'agama' => 'required|string|max:255',
            'kewarganegaraan' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'status' => 'required|string|max:255',
            'pas_foto' => 'required|image',
        ]);
    
        if ($validator->fails()) {
            return redirect('identitas_user/create')
                        ->withErrors($validator)
                        ->withInput();
        }
    
        $foto_file = $request->file('pas_foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . '.' . $foto_ekstensi;
        $foto_file->move(public_path('pas_foto'), $foto_nama);
    
        $data['pas_foto'] = $foto_nama;

        $user_id = $request->input('user_id');
        if ($user_id) {
            $data['user_id'] = $user_id;
        }
    
        $identitas = Identitas::create($data);
        $id = $identitas->id;
    
        return redirect()->route('identitas_user.show', $user_id)->with('success', 'Berhasil menambahkan data');
    }    

    public function show($id)
    {
        $data = Identitas::find($id);
    
        if (!$data) {
            $data = (object) [
                'id' => $id,
                'nama' => 'Data Not Inputted Yet',
                'pekerjaan' => 'Data Not Inputted Yet',
                'tempat_lahir' => 'Data Not Inputted Yet',
                'tanggal_lahir' => 'Data Not Inputted Yet',
                'jenis_kelamin' => 'Data Not Inputted Yet',
                'agama' => 'Data Not Inputted Yet',
                'kewarganegaraan' => 'Data Not Inputted Yet',
                'status' => 'Data Not Inputted Yet',
                'pas_foto' => 'default.jpg', // Assuming you have a default image
            ];
        }
    
        return view('identitas_user.show')->with('data', $data);
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
        return view('identitas_user.edit')->with('data', $data); 
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
            'pas_foto' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("identitas_user/{$id}/edit")
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
        return redirect()->to('identitas_user/'.$id)->with('success', 'Berhasil melakukan update data');
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
    
        return redirect()->to('identitas_user/'.$id)->with('success', 'Berhasil melakukan delete data');
    }
    
}
