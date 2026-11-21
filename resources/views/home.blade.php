@extends('layouts.app')

@section('content')

<div class="container-fluid px-0 mb-5 rounded-3 overflow-hidden shadow-sm">
    <div id="homeCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <div class="carousel-inner">

            <div class="carousel-item active" data-bs-interval="5000">
                <div class="position-relative" style="height: 500px;">
                    <div class="w-100 h-100 bg-dark opacity-50 position-absolute top-0 start-0 z-1"></div>
                    <img src="https://www.las2orillas.co/wp-content/uploads/2023/08/Servicio-Nacional-de-Aprendizaje-SENA.jpg" class="d-block w-100 h-100 object-fit-cover" alt="Gestion de Aprendices">
                </div>
                <div class="carousel-caption d-none d-md-block z-2 mt-4">
                    <h1 class="display-4 fw-bold text-uppercase" style="color: #0087a9; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">Examen Home</h1>
                    <p class="fs-4 fw-medium text-white" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">Bienvenido</p>
                    <a href="/medico/create" class="btn btn-light fw-bold px-4 py-2 mt-2">Comenzar Registro</a>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection