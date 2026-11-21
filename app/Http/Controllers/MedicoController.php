<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class MedicoController extends Controller
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
        $medicos = $this->fetchDataFromApi($url . '/medicos');
        return view('medico.index', compact('medicos'));
    }

    public function show($id)
    {

        $url = env('URL_SERVER_API');
        $medicos = $this->fetchDataFromApi($url . '/medicos/' . $id);

        return view('medico.show', compact('medicos'));
    }

    public function create()
    {
        return view('medico.create');
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/medicos', $request->all());

        return redirect()->route('medico.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $medico = $this->fetchDataFromApi($url . '/medicos/' . $id);
        return view('medico.edit', compact('medico'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/medicos/' . $id, $request->all());

        return redirect()->route('medico.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/medicos/' . $id);
        return redirect()->route('medico.index');
    }
}
