<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function historial(){
        
        $url = env('URL_SERVER_API'); 

        $medicos = Http::get($url . '/medicos')->json();
        $pacientes = Http::get($url . '/pacientes')->json();
        $ingresos = Http::get($url . '/ingresos')->json();

        return view('historial', compact('medicos', 'pacientes', 'ingresos'));
    }
}