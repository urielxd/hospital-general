<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Especialidad;
class DoctorController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.doctores.index');
    }

    public function profile($id)
    {
        $user = User::find($id);
        $especialidad = Especialidad::pluck('name', 'id');
        return view('admin.doctores.profile', compact('user', 'especialidad'));
    }

    public function profile_store(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'apellido' => 'required',
            'fecha_nacimiento' => 'required',
            'curp' => 'required|min:18|max:18',
            'cedula_profesional' => 'required',
            'especialidad_id' => 'required',
        ]);
        $user = User::find($id);
        $user->profile()->create($request->all());
        toast('Perfil creado, establece su horario.','success','top-center')->autoClose(6000);
        return redirect()->route('doctor.horario', $user->id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.doctores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = User::create([
            'avatar' => 'http://everydaynutrition.co.uk/wp-content/uploads/2015/01/default-user-avatar.png',
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'doctor'
        ]);
        $id = $user->id;
        toast('Doctor agregado.','success','top-right')->autoClose(6000);
        return redirect()->route('admin.profile_create', compact('id'));
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
        $user = User::find($id);
        return view('admin.doctores.edit', compact('user'));

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
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();
        toast('Doctor actualizado','success','top-right')->autoClose(6000);
        return redirect()->route('doctores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
