<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diagnostic;
use Auth;
use App\Event;
class DiagnosticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('diagnostico.index');
    }

    public function index_json()
    {
        $diagnosticos = Diagnostic::where('doctor', Auth::user()->id)
                            ->with('user', 'event')
                            ->OrderBy('id', 'DESC')
                            ->paginate(10);
        return response()
            ->json($diagnosticos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $event = Event::find($id);
        $diagnostico = Diagnostic::where('event_id', $event->id)->first();
        if ($event->doctor == Auth::user()->id) {
            if ($diagnostico) {
                return redirect()->route('diagnostico.edit', $diagnostico->id);
            }
            return view('diagnostico.create', compact('event'));
        } else {
            return redirect()->route('name');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);
        $event = Event::find($id);
        if ($event->doctor == Auth::user()->id) {
            $diagnostico = Diagnostic::create([
                'user_id' => $event->cliente['id'],
                'doctor' => Auth::user()->id,
                'body' => $request->body,
                'event_id' => $event->id
            ]);
            toast('Diagnostico creado  con exito.','success','top-right')->autoClose(6000);
            return redirect()->route('diagnostico.index');
        } else {
            return redirect()->route('name');
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
        $diagnostico = Diagnostic::find($id);
        if ($diagnostico->doctor == Auth::user()->id) {
            return view('diagnostico.edit', compact('diagnostico'));
        } else {
            return redirect()->route('name');
        }
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
        $diagnostico = Diagnostic::find($id);
        if ($diagnostico->doctor == Auth::user()->id) {
            $diagnostico->update($request->all());
            toast('Diagnostico actualizado  con exito.','success','top-right')->autoClose(6000);
            return redirect()->route('diagnostico.index');
        } else {
            return redirect()->route('name');
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
        $diagnostico = Diagnostic::find($id);
        if ($diagnostico->doctor == Auth::user()->id) {
            $diagnostico = Diagnostic::find($id);
            $diagnostico->delete();
            return response()
                ->json('Elimindo correctamente.');
        } else {
            return redirect()->route('name');
        }
    }
}
