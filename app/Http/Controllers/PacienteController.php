<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PacienteController extends Controller
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
        $pacientes = $this->fetchDataFromApi($url . '/pacientes');

        return view('paciente.index', compact('pacientes'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $pacientes = $this->fetchDataFromApi($url . '/pacientes/' . $id);
        return view('paciente.show', compact('pacientes'));
    }

    public function create()
    {
        return view('paciente.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $url = env('URL_SERVER_API');

        $file = $request->file('imagen');

        $response = Http::attach(
            'imagen',file_get_contents($file->getRealPath()),
            $file->getClientOriginalName())->post(env('URL_SERVER_API') . '/pacientes',[
            'nombre' => $request->nombre, 
            'apellidos' => $request->apellidos,
            ]);

        return redirect()->route('paciente.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $paciente = $this->fetchDataFromApi($url . '/pacientes/' . $id);

        return view('paciente.edit', compact('paciente'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/pacientes/' . $id, $request->all());

        return redirect()->route('paciente.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/pacientes/' . $id);
        return redirect()->route('paciente.index');
    }
}
