<?php
namespace App\Http\Controllers;
use App\Models\identitas;
use App\Models\kontak; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class kontakUserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $identitasData = identitas::all();

        return view('kontak_user.create')->with('identitasData', $identitasData); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('email', $request->email);
        Session::flash('alamat', $request->alamat);
        Session::flash('no_telepon', $request->no_telepon);

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|regex:/^\+62[0-9]{9,21}$/',
            'identitas_id' => [
                'required',
                'exists:identitas,id',
            ],
        ]);
        
        if ($validator->fails()) {
            return redirect("kontak_user/create")
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = [
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
        ];
    
        $identitas_id = $request->input('identitas_id');
        if ($identitas_id) {
            $data['identitas_id'] = $identitas_id;
        }
        kontak::create($data); 
    
        return redirect()->to('kontak_user/'.$identitas_id)->with('success', 'Berhasil menambahkan data kontak'); 
    }
    /**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($identitas_id)
{
    $data = Kontak::where('identitas_id', $identitas_id)->get(); 
    $identitas = identitas::find($identitas_id);

    return view('kontak_user.show')->with('data', $data)->with('identitas', $identitas);
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    $data = kontak::where('id', $id)->first(); 
    return view('kontak_user.edit')->with('data', $data); 
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
    Session::flash('email', $request->email);
    Session::flash('alamat', $request->alamat);
    Session::flash('no_telepon', $request->no_telepon);

    $validator = Validator::make($request->all(), [
        'email' => 'required|string|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
        'alamat' => 'required|string|max:255',
        'no_telepon' => 'required|regex:/^\+62[0-9]{10,15}$/',
    ]);
    
    if ($validator->fails()) {
        return redirect("kontak_user/{$id}/edit")
                    ->withErrors($validator)
                    ->withInput();
    }

    $data = [
        'email' => $request->email,
        'alamat' => $request->alamat,
        'no_telepon' => $request->no_telepon,
    ];

    $kontak = kontak::find($id);
    $identitas_id = $kontak->identitas_id;

    kontak::where('id', $id)->update($data);
    return redirect()->to('kontak_user/'.$identitas_id)->with('success', 'Berhasil melakukan update data');
}


/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $kontak = kontak::find($id);
    $identitas_id = $kontak->identitas_id;

    kontak::where('id', $id)->delete(); 
    return redirect()->to('kontak_user/'.$identitas_id)->with('success', 'Berhasil melakukan delete data'); 
}


}

