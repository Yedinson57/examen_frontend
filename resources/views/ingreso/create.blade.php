@extends('layouts.app')

@section('content')

<div class="py-5 rounded-4" style="background-color: #f4f6f9;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    
                    <div class="card-header text-white text-center py-4" style="background-color: #0087a9; border-bottom: none;">
                        <h4 class="mb-0 fw-bold">Registrar Ingreso</h4>
                        <p class="mb-0 mt-1 small opacity-75">Añada un nuevo Ingreso</p>
                    </div>
                    
                    <div class="card-body p-4 p-md-5 bg-white">
                        <form action="{{ route('ingreso.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-floating mb-4">
                                <input type="text" 
                                    class="form-control" 
                                    id="habitacion" 
                                    name="habitacion" 
                                    placeholder="Habitacion de ingreso" 
                                    required>
                                <label for="habitacion" class="text-secondary">Habitacion de ingreso</label>
                            </div>
                            
                            <div class="form-floating mb-4">
                                <input type="date" 
                                    class="form-control" 
                                    id="fecha" 
                                    name="fecha" 
                                    placeholder="Fecha de ingreso" 
                                    required>
                                <label for="fecha" class="text-secondary">Fecha de ingreso</label>
                            </div>

                            <div class="form-floating mb-4">
                                <select name="medico_id" id="ingreso_medico_id" class="form-select" required>
                                    <option value="" selected disabled>Seleccione un medico...</option>
                                    @foreach ($medicos as $medico)
                                        <option value="{{ $medico['id'] }}">{{ $medico['nombre'] }}</option>
                                    @endforeach
                                </select>
                                <label for="ingreso_medico_id" class="text-secondary">Medico Asociado</label>
                            </div>

                            <div class="form-floating mb-4">
                                <select name="paciente_id" id="ingreso_paciente_id" class="form-select" required>
                                    <option value="" selected disabled>Seleccione un paciente...</option>
                                    @foreach ($pacientes as $paciente)
                                        <option value="{{ $paciente['id'] }}">{{ $paciente['nombre'] }}</option>
                                    @endforeach
                                </select>
                                <label for="ingreso_paciente_id" class="text-secondary">Paciente Asociado</label>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-5">
                                <a href="/" class="btn btn-outline-secondary px-4 py-2 fw-medium rounded-3">
                                    Cancelar
                                </a>
                                <button type="submit" class="btn btn-dark px-5 py-2 fw-bold rounded-3">
                                    Guardar Ingreso
                                </button>
                            </div>
                            
                        </form>
                    </div>
                    <a href="{{ route('ingreso.index') }}" class="btn text-white fw-bold px-4 py-2 shadow-sm d-inline-flex align-items-center gap-2" style="background-color: #0087a9;">
                        Revisar Registros
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection