<?php

namespace App\Http\Controllers;

use App\Event;
use Carbon\Carbon;
use App\User;
use Auth;
use App\Especialidad;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function myevents()
    {
        if (Auth::user()->role == 'paciente') {
            $eventos = Auth::user()->events_paciente()->get();
            $events = array();
            foreach ($eventos as $e) {
                array_push($events, [
                    'id' => $e->id,
                    'title' =>(String)$e->medico->profile->nombre,
                    'start' => (String)$e->start,
                    'end' => (String)$e->end
                ]);
            }
        }
        if (Auth::user()->role == 'doctor') {
            $eventos = Auth::user()->events_doctor()->get();
            $events = array();
            foreach ($eventos as $e) {
                array_push($events, [
                    'id' => $e->id,
                    'title' =>(String)$e->cliente->profile->nombre,
                    'start' => (String)$e->start,
                    'end' => (String)$e->end
                ]);
            }
        }

        return response()->json($events);
    }

    public function events ()
    {
        $eventos = Event::all();
        $events = array();
        foreach ($eventos as $e) {
            array_push($events, [
                'id' => $e->id,
                'title' => 'Apartado',
                'start' => (String)$e->start,
                'end' => (String)$e->end,
                'color' => 'red'
            ]);
        }
        return response()->json($events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $especialidad = DB::table('especialidads')->where('id', $id)->first();
        if ($especialidad) {
            $doctores = DB::table('profiles')->where('especialidad_id', $id)->get();
            $doctores = $doctores->pluck('nombre', 'id');
            if ($doctores->count() > 0) {
                return view('event.create', compact('doctores'));
            } else {
                toast('Lo siento, por el momento no hay doctores en esta especialidad','error','center')->autoClose(6000);
                return redirect()->route('especialidad');
            }
        } else {
            toast('Lo siento, la especialidad es incorrecta','error','center')->autoClose(6000);
            return redirect()->route('especialidad');
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
        $this->validate($request, [
            'doctor' => 'required',
            'start' => 'required',
        ]);
        $from = Carbon::parse($request->start);
        $to = Carbon::parse($request->start)->addMinutes(60);
        $user = User::where('id', $request->doctor)->first();
        $events = Event::where('doctor', $user->id)->get();
        $event = $user->events_doctor()->overlapsWith($from, $to, 'start', 'end')->exists();
        //dd($user->events_doctor()->count());
        if (!$event) {
            Event::create([
                'doctor' => $request->doctor,
                'paciente' => Auth::user()->id,
                'start' => $from,
                'end' => $to
            ]);
            toast('Cita agendada','success','top-right')->autoClose(6000);
            return redirect()->route('home');
        } else {
            toast('No esta disponible, intenta con otra fecha','error','center')->autoClose(6000);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
