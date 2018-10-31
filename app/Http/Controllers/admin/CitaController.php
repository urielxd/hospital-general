<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\Especialidad;
use App\Profile;
use App\User;
use DB;
use Carbon\Carbon;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especialidades = Especialidad::pluck('name', 'id')
                            ->toJson();
        return view('admin.citas.index', compact('especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $cita = DB::table('events')
                ->where('id', $id)
                ->first();
        $doctor = Profile::where('user_id',$cita->doctor)->first();
        $doctores = $doctor->especialidad->profile;
        $doctores = $doctores->pluck('nombre', 'id');
        return view('admin.citas.edit', compact('cita', 'doctores'));
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
        $cita = Event::find($id);
        $this->validate($request, [
            'doctor' => 'required',
            'start' => 'required',
        ]);
        $from = Carbon::parse($request->start);
        $to = Carbon::parse($request->start)->addMinutes(60);
        $profile = Profile::find($request->doctor);
        $user = User::find($profile->user_id);
        $events = Event::where('doctor', $user->id)->get();
        $event = $user->events_doctor()->overlapsWith($from, $to, 'start', 'end')->exists();
        
        if ($cita->start == $from) {
            $cita->doctor = $user->id;
            $cita->save();
            toast('Cita editada correctamente','success','top-right')->autoClose(6000);
            return redirect()->route('citas.index');
        } else {
            if (!$event) {
                $cita->doctor = $user->id;
                $cita->start = $from;
                $cita->end = $to;
                $cita->update();
                toast('Cita editada correctamente','success','top-right')->autoClose(6000);
                return redirect()->route('citas.index');
            } else {
                toast('No esta disponible, intenta con otra fecha','error','center')->autoClose(6000);
                return redirect()->back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pacientes () 
    {
        return view('admin.citas.pacientes');
    }

    public function especialidades ($id) 
    {
        $user = User::find($id);
        $especialidad = Especialidad::all();
        return view('admin.citas.especialidades', compact('user', 'especialidad'));
    }

    public function event ($id, $especialidad) {
        $user = User::find($id);
        $doctores = DB::table('profiles')->where('especialidad_id', $especialidad)->get();
        $doctores = $doctores->pluck('nombre', 'id');
        $especialidad = Especialidad::find($especialidad);
        return view('admin.citas.event', compact('user', 'doctores','especialidad'));
    }

    public function store_event (Request $request)
    {
        $today = Carbon::now();
        $paciente = $request->user_id;
        $this->validate($request, [
            'doctor' => 'required',
            'start' => 'required',
        ]);
        $from = Carbon::parse($request->start);
        if ($from < $today) {
            toast('Fecha no valida','error','center')->autoClose(6000);
            return redirect()->back();
        }
        $to = Carbon::parse($request->start)->addMinutes(60);
        $profile = Profile::find($request->doctor);
        $user = User::find($profile->user_id);

        if ($user->schedule) {
            if ( $from >= Carbon::parse($user->schedule->start) && $to <= Carbon::parse($user->schedule->end) ){
                $events = Event::where('doctor', $user->id)->get();
                $event = $user->events_doctor()->overlapsWith($from, $to, 'start', 'end')->exists();
                if (!$event) {
                    Event::create([
                        'doctor' => $user->id,
                        'start' => $from,
                        'end' => $to,
                        'paciente' => $paciente
                    ]);
                    toast('Cita agendada','success','top-right')->autoClose(6000);
                    return redirect()->route('citas.index');
                } else {
                    toast('No esta disponible, intenta con otra fecha','error','center')->autoClose(6000);
                    return redirect()->back();
                }
            } else {
                toast('No se puede agendar para esa fecha','error','center')->autoClose(6000);
                return redirect()->back();
            }
        } else {
            toast('No hay horario disponible, intente mas tarde','error','center')->autoClose(6000);
            return redirect()->back();
        }

    }
}
