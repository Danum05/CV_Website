<?php

namespace App\Http\Controllers;
use App\Models\identitas;
use App\Models\skill; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class skillUserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $identitasData = identitas::all();

        return view('skill_user.create')->with('identitasData', $identitasData); 
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
        'nama_skill' => 'required',
        'persen_skill' => 'required',
    ]);
    
    if ($validator->fails()) {
        return redirect("skill_user/create")
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

    return redirect()->to('skill_user/' . $identitas_id)->with('success', 'Berhasil menambahkan data');
    }

    /**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($identitas_id)
{
    $data = skill::where('identitas_id', $identitas_id)->get(); 
    $identitas = identitas::find($identitas_id);

    return view('skill_user.show')->with('data', $data)->with('identitas', $identitas);
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
    return view('skill_user.edit')->with('data', $data); 
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

    $skill = Skill::find($id);
    $identitas_id = $skill->identitas_id;

    // Update the skill record
    Skill::where('id', $id)->update($data);

    return redirect()->to('skill_user/' . $identitas_id)->with('success', 'Berhasil melakukan update data');
}



/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $skill = Skill::find($id);
    $identitas_id = $skill->identitas_id;

    skill::where('id', $id)->delete(); 
    return redirect()->to('skill_user/' . $identitas_id)->with('success', 'Berhasil melakukan delete data'); 
}
}
