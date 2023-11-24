<?php
namespace App\Http\Controllers;
use App\Models\user; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
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
            $data = user::where('id', 'like', "%$katakunci%")
                ->orWhere('name', 'like', "%$katakunci%")
                ->orWhere('email', 'like', "%$katakunci%")
                ->orWhere('password', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = user::orderBy('id', 'asc')->paginate($jumlahbaris);
        }
        return view('users.index')->with('data', $data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|string|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            'password' => 'required|string|min:8|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',
            'role' => 'required|string|max:255'
        ]);
        
        if ($validator->fails()) {
            return redirect("users/create")
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'user',
        ];
    
        user::create($data); 
    
        return redirect()->to('users')->with('success', 'Berhasil menambahkan data user'); 
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
    $data = user::where('id', $id)->first(); 
    return view('users.edit')->with('data', $data); 
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
    Session::flash('name', $request->name);
    Session::flash('email', $request->email);
    Session::flash('password', $request->password);

    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
        'email' => 'required|string|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
        'password' => 'required|string|min:8|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',
    ]);
    
    if ($validator->fails()) {
        return redirect("users/{$id}/edit")
                    ->withErrors($validator)
                    ->withInput();
    }

    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ];

    user::where('id', $id)->update($data);
    return redirect()->to('users')->with('success', 'Berhasil melakukan update data');
}


/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    user::where('id', $id)->delete(); 
    return redirect()->to('users')->with('success', 'Berhasil melakukan delete data'); 
}


}

