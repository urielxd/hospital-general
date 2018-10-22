<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\Especialidad;
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
        $doctores = DB::table('profiles')->where('user_id', $cita->doctor)->get();
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
        $user = User::where('id', $request->doctor)->first();
        $events = Event::where('doctor', $user->id)->get();
        $event = $user->events_doctor()->overlapsWith($from, $to, 'start', 'end')->exists();

        if ($cita->start == $from) {
            $cita->doctor = $request->doctor;
            $cita->save();
            toast('Cita editada correctamente','success','top-right')->autoClose(6000);
            return redirect()->route('citas.index');
        } else {
            if (!$event) {
                $cita->doctor = $request->doctor;
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
}
