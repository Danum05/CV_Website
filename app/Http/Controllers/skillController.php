<?php

namespace App\Http\Controllers;
use App\Models\skill; 
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
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $data = skill::where('id', 'like', "%$katakunci%")
                ->orWhere('nama_skill', 'like', "%$katakunci%")
                ->orWhere('persen_skill', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = skill::orderBy('id', 'desc')->paginate($jumlahbaris);
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
        return view('skill.create'); 
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
    ]);
    
    if ($validator->fails()) {
        return redirect("skill/create")
                    ->withErrors($validator)
                    ->withInput();
    }

    $data = [
        'nama_skill' => $request->nama_skill,
        'persen_skill' => $request->persen_skill,
    ];
    
    $identitas_id = $request->input('identitas_id');
    if ($identitas_id) {
        $data['identitas_id'] = $identitas_id;
    }

    skill::create($data);

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
