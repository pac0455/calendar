@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>
    <i class="far fa-fw fa-user"></i>
    Edición de tipo de evento
</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('tipo_evento.update', ['tipo_evento' => $tipo_evento->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label" >Nombre</label>
                <input type="text" class="form-control" value={{$tipo_evento->nombre}} @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}">
                @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fondo" class="form-label">Fondo</label>
                <div class="input-group">
                    <input type="text" readonly  class="form-control @error('fondo') is-invalid @enderror" id="fondo" name="fondo" value="{{ old('fondo') }}" style="width: 90%;">
                    <!-- El input de color tiene un ancho del 20% -->
                    <input type="color" value="{{ $tipo_evento->fondo }}" id="color_fondo" style="width: 10%;" class="form-control" aria-label="fondo">
                    @error('fondo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="border" class="form-label">Borde</label>
                <div class="input-group">
                    <input type="text" readonly class="form-control @error('border') is-invalid @enderror" id="border" name="border" value="{{ old('border') }}" style="width: 90%;">
                    <!-- El input de color tiene un ancho del 20% -->
                    <input type="color" value="{{ $tipo_evento->border }}" id="color_border" style="width: 10%;" class="form-control" aria-label="border">
                    @error('border')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="texto" class="form-label">Texto</label>
                <div class="input-group">
                    <input type="text" readonly class="form-control @error('texto') is-invalid @enderror" id="texto" name="texto" value="{{ old('texto') }}" style="width: 90%;">
                    <!-- El input de color tiene un ancho del 20% -->
                    <input type="color" value="{{ $tipo_evento->texto }}" id="color_texto" style="width: 10%;" class="form-control" aria-label="texto">
                    @error('texto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </div>
    </form>
</div>
</div>
@stop

@section('css')
{{-- Add here extra stylesheets --}}
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
@vite(['resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
<script src="https://kit.fontawesome.com/eb88410152.js" crossorigin="anonymous"></script>
@stop
