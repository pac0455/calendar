@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>
        <i class="far fa-fw fa-user"></i>
        Listado de Tipos de eventos
    </h1>
@stop

@section('content')
    @include('components.modal.edit_tipo_eventos')
    <div class="mb-5 d-flex">
        <a href="{{ route('tipo_evento.create') }}" class="btn btn-primary ml-5"><i class="fa-solid fa-plus"></i></a>
        <button class="btn btn-primary ml-5"><i class="fa-solid fa-rotate-right mr-2"></i></i>Recargar</button>
        <a href="{{ route('calendar.index') }}" class="btn btn-primary ml-5"><i
                class="fa-solid fa-arrow-left mr-2"></i></i>Volver</a>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="example1" class="display compact">
                <thead class="bg-primary">
                    <tr>
                        <td>ID</td>
                        <td>Nombre</td>
                        <td>Fondo</td>
                        <td>Borde</td>
                        <td>Texto</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tipos_eventos as $tipo_evento)
                        <tr>
                            <td>{{ $tipo_evento->id }}</td>
                            <td class="text-center nombre">{{ $tipo_evento->nombre }}</td>
                            <td class="text-center fondo">
                                <span class="mr-2 color" style="background-color: {{ $tipo_evento->fondo }};"> </span>
                                {{ $tipo_evento->fondo }}
                            </td>
                            <td class="text-center border">
                                <span class="mr-2 color" style="background-color: {{ $tipo_evento->border }}; "> </span>
                                {{ $tipo_evento->border }}
                            </td>
                            <td class="text-center texto">
                                <span class="mr-2 color" style="background-color: {{ $tipo_evento->texto }}; "> </span>
                                {{ $tipo_evento->texto }}
                            </td>
                            <td class="d-flex justify-content-center">
                                <!-- Button trigger modal -->
                                <button type="button"  data-id="{{$tipo_evento->id}}" class="btn btn-primary mr-2 update_tipoEventos" data-bs-toggle="modal"
                                    data-bs-target="#edit_modal_tipoEventos">
                                    <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                </button>
                                <button  type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#edit_modal_tipEventos" id="edit_modal_tipEventos">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <style>
        .color {
            width: 20px;
            height: 20px;
            display: inline-block;
            border: solid 1px black;
        }
    </style>

@stop

@section('js')
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
@vite(['resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
<script src="https://kit.fontawesome.com/eb88410152.js" crossorigin="anonymous"></script>
<script>
    let table = new DataTable('#example1')
    localStorage.setItem('tipos_eventos',JSON.stringify(@json($tipos_eventos)))
    </script>
    @vite(['resources/js/app.js','resources/css/app.css'])
@stop
