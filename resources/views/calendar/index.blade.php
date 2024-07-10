@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Calendar</h1>
@stop

@section('content')
@include('components.modal.add')
@include('components.modal.edit')
    <div class="card ">
        <div class="body">
            <div id="calendar"></div>
        </div>
    </div>
@stop
@section('footer')
    <div class="d-flex justify-content-center mysidebar">
        Created by Francisco Hidalgo Alcaide
    </div>
@stop
@section('css')
    {{-- Add here extra stylesheets --}}

@stop

@section('js')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/eb88410152.js" crossorigin="anonymous"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
@stop
