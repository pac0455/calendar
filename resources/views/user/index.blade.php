@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>
    <i class="far fa-fw fa-user"></i>
    Lista de usuarios
</h1>
@stop

@section('content')
<div class="mb-5 d-flex">
    <a href="{{route('user.create')}}" class="btn btn-primary ml-5"><i class="fa-solid fa-plus "></i></a>
    <button class="btn btn-primary ml-5"><i class="fa-solid fa-rotate-right mr-2"></i>Recargar</button>
    <a href="{{route('calendar.index')}}" class="btn btn-primary ml-5"><i class="fa-solid fa-arrow-left mr-2"></i></i>Volver</a>
</div>
<div class="card">
    <div class="card-body">
        <table id="example" class="display compact ">
            <thead class="custom-bg">
                <tr class="text-white">
                    <td>ID</td>
                    <td>Nombre</td>
                    <td>Email</td>
                    <td>Administrador</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if ($user->role)
                        <span>Administrador</span>
                        @else
                        <span>Demo</span>
                        @endif
                    </td>
                    <td class="d-flex justify-content-center">
                        <form action="{{route('user.destroy', ['user' => $user->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mr-1">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                        <a href="{{route('user.edit', ['user' => $user->id])}}" class="btn btn-primary">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
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
@stop

@section('js')
@vite(['resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://kit.fontawesome.com/eb88410152.js" crossorigin="anonymous"></script>
<script>
    let table=  new DataTable('#example')
</script>
@stop
