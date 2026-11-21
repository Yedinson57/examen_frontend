@extends('layouts.app')

@section('content')

<div class="py-5 rounded-4" style="background-color: #f4f6f9;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    
                    <div class="card-header text-white text-center py-4" style="background-color: #0087a9; border-bottom: none;">
                        <h4 class="mb-0 fw-bold">Actualizar Ingreso</h4>
                        <p class="mb-0 mt-1 small opacity-75">Modifique la información del Ingreso</p>
                    </div>
                    
                    <div class="card-body p-4 p-md-5 bg-white">
                        <form action="{{ route('ingreso.update', $ingreso['id']) }}" method="POST">
                            @csrf
                            @method('put')

                            <div class="mb-4">
                                <label for="habitacion" class="form-label text-muted small fw-bold text-uppercase tracking-wider">habitacion del ingreso</label>
                                <input type="text" 
                                    id="habitacion"
                                    name="habitacion" 
                                    class="form-control form-control-lg bg-light border-0 rounded-3 text-dark fw-medium" 
                                    placeholder="habitacion de ingreso"
                                    value="{{ old('habitacion', $ingreso['habitacion']) }}" 
                                    required>
                            </div>

                            <div class="mb-4">
                                <label for="fecha" class="form-label text-muted small fw-bold text-uppercase tracking-wider">fecha del ingreso</label>
                                <input type="date" 
                                    id="fecha"
                                    name="fecha" 
                                    class="form-control form-control-lg bg-light border-0 rounded-3 text-dark fw-medium" 
                                    placeholder="Ciudad o complejo regional"
                                    value="{{ old('fecha', $ingreso['fecha']) }}" 
                                    required>
                            </div>

                            <div class="mb-4">
                                <label for="medico_id" class="form-label text-muted small fw-bold text-uppercase tracking-wider">medico asociado</label>
                                <select name="medico_id" id="medico_id" class="form-select form-select-lg bg-light border-0 rounded-3 text-dark fw-medium" required>
                                    @foreach($medicos as $medico)
                                    <option value="{{ $medico['id'] }}" {{ old('medico_id', $ingreso['medico_id']) == $medico['id'] ? 'selected' : '' }}>
                                        {{ $medico['nombre'] }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="paciente_id" class="form-label text-muted small fw-bold text-uppercase tracking-wider">paciente asociado</label>
                                <select name="paciente_id" id="paciente_id" class="form-select form-select-lg bg-light border-0 rounded-3 text-dark fw-medium" required>
                                    @foreach($pacientes as $paciente)
                                    <option value="{{ $paciente['id'] }}" {{ old('paciente_id', $ingreso['paciente_id']) == $paciente['id'] ? 'selected' : '' }}>
                                        {{ $paciente['nombre'] }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <hr class="my-4 opacity-25">

                            <div class="d-flex justify-content-center align-items-center gap-2 mt-4">
                                <a href="{{ url()->previous() }}" class="btn btn-light border fw-bold px-4 py-2 rounded-3">
                                    Cancelar
                                </a>
                                <button type="submit" class="btn text-white fw-bold px-4 py-2 rounded-3 shadow-sm" style="background-color: #0087a9;">
                                    Actualizar Ingreso
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection