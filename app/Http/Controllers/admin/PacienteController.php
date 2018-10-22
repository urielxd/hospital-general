<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Profile;

class PacienteController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pacientes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pacientes.create');
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
            'password' => bcrypt($request->password)
        ]);
        toast('Paciente agregado.','success','top-right')->autoClose(6000);
        return redirect()->route('pacientes.profile', $user->id);
    }

    public function create_profile ($id) {
        $user = User::find($id);
        if (!$user->profile) {
            return view('admin.pacientes.profile', compact('user'));
        }
        toast('Paciente con perfil.','error','top-right')->autoClose(6000);
        return redirect()->route('pacientes.index');
    }

    public function store_profile (Request $request, $id) {
        $this->validate($request, [
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'fecha_nacimiento' => 'required|max:255',
            'curp' => 'required|min:18|max:18',
            'entidad_nacimiento' => 'required|max:255',
            'clave_de_edad' => 'required|max:10',
            'sexo' => 'required',

            'indigena' => 'required',
            'derechohabiencia' => 'required',
            'peso' => 'required',
            'talla' => 'required',
            'discapacidad' => 'required',
            'relacion' => 'required',
            'migrante' => 'required'
        ]);
        $user = User::find($id);
        if (!$user->profile) {
            toast('Perfil creado con exito.','success','top-right')->autoClose(6000);
            $user->profile()->create($request->all());
            return redirect()->route('pacientes.index');
        }
        toast('Ya tiene un perfil.','error','top-right')->autoClose(6000);
        return redirect()->route('pacientes.index');
    }

    public function edit_profile($id) {
        $profile = Profile::find($id);
        return view('admin.pacientes.profile_edit', compact('profile'));
    }

    public function update_profile(Request $request, $id) {
        $this->validate($request, [
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'fecha_nacimiento' => 'required|max:255',
            'curp' => 'required|min:18|max:18',
            'entidad_nacimiento' => 'required|max:255',
            'clave_de_edad' => 'required|max:10',
            'sexo' => 'required',

            'indigena' => 'required',
            'derechohabiencia' => 'required',
            'peso' => 'required',
            'talla' => 'required',
            'discapacidad' => 'required',
            'relacion' => 'required',
            'migrante' => 'required'
        ]);
        $profile = Profile::find($id);
        $profile->update($request->all());
        toast('Actualizado correctamente.','success','top-right')->autoClose(6000);
        return redirect()->route('pacientes.index');
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
        return view('admin.pacientes.edit', compact('user'));

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
        toast('Paciente actualizado','success','top-right')->autoClose(6000);
        return redirect()->route('pacientes.index');
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
