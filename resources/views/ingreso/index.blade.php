@extends('layouts.app')

@section('content')

<div class="py-4">
    <div class="container">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
            <div>
                <h2 class="fw-bold text-dark mb-1">Listado de Ingresos</h2>
                <p class="text-muted small mb-0">Ingresos registrados.</p>
            </div>
            <a href="{{ route('ingreso.create') }}" class="btn text-white fw-bold px-4 py-2 shadow-sm d-inline-flex align-items-center gap-2" style="background-color: #0087a9;">
                Nuevo Ingreso
            </a>
        </div>

        <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
            <div class="card-body p-0">
                <div class="table-responsive">

                    <table id="idIngreso" class="table table-hover align-middle mb-0" style="width:100%">
                        <thead class="table-dark" style="background-color: #212529;">
                            <tr>
                                <th class="ps-4 py-3" style="width: 15%">ID</th>
                                <th class="py-3" style="width: 25%">Habitacion</th>
                                <th class="py-3" style="width: 25%">Fecha</th>
                                <th class="py-3" style="width: 25%">Medico</th>
                                <th class="py-3" style="width: 25%">Paciente</th>
                                <th class="text-center py-3" style="width: 30%">Acciones de Gestión</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($ingresos as $ingreso)
                            <tr>
                                <td class="ps-4 fw-bold text-secondary">#{{ $ingreso['id'] }}</td>
                                <td class="fw-bold text-dark">{{ $ingreso['habitacion'] }}</td>
                                <td class="fw-bold text-dark">{{ $ingreso['fecha'] }}</td>
                                <td class="fw-bold text-dark">{{ $ingreso['medico_id'] }}</td>
                                <td class="fw-bold text-dark">{{ $ingreso['paciente_id'] }}</td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center gap-2">

                                        <a href="{{ route('ingreso.show', $ingreso['id']) }}"
                                            class="btn btn-sm btn-light border fw-medium d-inline-flex justify-content-center align-items-center"
                                            style="width: 90px; height: 32px;">
                                            Ver
                                        </a>

                                        <a href="{{ route('ingreso.edit', $ingreso['id']) }}"
                                            class="btn btn-sm btn-outline-dark fw-medium d-inline-flex justify-content-center align-items-center"
                                            style="width: 90px; height: 32px;">
                                            Editar
                                        </a>

                                        <form action="{{ route('ingreso.destroy', $ingreso['id']) }}"
                                            method="POST"
                                            class="d-inline-flex m-0"
                                            style="width: 90px;"
                                            onsubmit="return confirm('¿Está seguro de eliminar este ingreso?')">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="btn btn-sm btn-danger fw-medium w-100 d-inline-flex justify-content-center align-items-center"
                                                style="height: 32px;">
                                                Eliminar
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection