<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Especialidad;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Auth::user()->profile;
        return view('profile/index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->profile) {
            toast('Solo puedes tener un perfil.','error','center')->autoClose(6000);
            return redirect()->route('home');
        } else {
            $especialidad = Especialidad::pluck('name', 'id');
            return view('profile.new', compact('especialidad'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->role == 'doctor') {
            $this->validate($request, [
                'nombre' => 'required',
                'apellido' => 'required',
                'fecha_nacimiento' => 'required',
                'curp' => 'required|min:18|max:18',
                'cedula_profesional' => 'required',
                'especialidad_id' => 'required',
            ]);
        }
        if (Auth::user()->role == 'paciente') {
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
                'migrante' => 'required',
                'temporal' => 'required',
                'temporal_2' => 'required'
            ]);
        }
        toast('Perfil creado con exito.','success','top-right')->autoClose(6000);
        Auth::user()->profile()->create($request->all());
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $especialidad = Especialidad::pluck('name', 'id');
        return view('profile.edit', compact('especialidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profile = Auth::user()->profile;
        $profile->update($request->all());
        toast('Perfil actualizado con exito.','success','top-right')->autoClose(6000);
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
