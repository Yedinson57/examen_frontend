<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class IngresoController extends Controller
{
    // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()   
    {
        $url = env('URL_SERVER_API');
        $ingresos = $this->fetchDataFromApi($url . '/ingresos');
        return view('ingreso.index', compact('ingresos'));
    }

    public function show($id)
    {

        $url = env('URL_SERVER_API');
        $ingresos = $this->fetchDataFromApi($url . '/ingresos/' . $id);

        return view('ingreso.show', compact('ingresos'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $medicos = Http::get($url .'/medicos')->json();
        $pacientes = Http::get($url .'/pacientes')->json();

        return view('ingreso.create',compact('medicos','pacientes'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/ingresos', $request->all());

        return redirect()->route('ingreso.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $medicos = Http::get($url .'/medicos')->json();
        $pacientes = Http::get($url .'/pacientes')->json();
        $ingreso = $this->fetchDataFromApi($url . '/ingresos/' . $id);
        return view('ingreso.edit', compact('ingreso','medicos','pacientes'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');
        Http::put($url . '/ingresos/' . $id, $request->all());
        return redirect()->route('ingreso.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/ingresos/' . $id);
        return redirect()->route('ingreso.index');
    }
}
