<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Http\Controllers\Controller;
use App\Schedule;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.schedule.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $doctor = User::find($id);
        if ($doctor->schedule) {
            toast('Ya asignaste su horario.','error','top-center')->autoClose(6000);
            return redirect()->route('horarios.index');
        } else {
            return view('admin.schedule.create', compact('doctor'));
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
        $today = Carbon::now();
        $user = User::find($request->user_id);
        if ($user->schedule) {
            toast('Ya asignaste su horario.','error','top-center')->autoClose(6000);
            return redirect()->route('horarios.index');
        } else {
            $this->validate($request, [
                'end' => 'required',
                'start' => 'required',
                'interval' => 'required',
            ]);
            $start = Carbon::parse($request->start);
            $end = Carbon::parse($request->end);
            if ($end < $today) {
                toast('Fecha no valida','error','center')->autoClose(6000);
                return redirect()->back();
            }
            $user->schedule()->create($request->all());
            toast('Horario agregado.','success','top-right')->autoClose(6000);
            return redirect()->route('horarios.index');
        }
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
        $horario = Schedule::find($id);
        return view('admin.schedule.edit', compact('horario'));
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
        $today = Carbon::now();
        $horario = Schedule::find($id);
        $this->validate($request, [
            'end' => 'required',
            'start' => 'required',
            'interval' => 'required',
        ]);
        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);
        if ($end < $today) {
            toast('Fecha no valida','error','center')->autoClose(6000);
            return redirect()->back();
        }
        $horario->update($request->all());
        toast('Horario actualizado.','success','top-right')->autoClose(6000);
        return redirect()->route('horarios.index');
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
