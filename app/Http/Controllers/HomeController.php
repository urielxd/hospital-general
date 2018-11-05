<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function pdf_show($id)
    {
        return view('pdf.index', compact('id'));
    }

    public function pdf ($id)
    {
        $evento = Event::find($id);
        if (Auth::user()->role == 'admin' || Auth::user()->id == $evento->paciente) {
            $view =  \View::make('pdf.cita', compact('evento'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);
            return $pdf->stream('invoice');
        } else {
            return redirect()->route('home');
        }
    }
}
