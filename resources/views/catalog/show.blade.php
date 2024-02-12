@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <img src="{{ $pelicula->poster }}" alt="" style="height: 400px">
        </div>
        <div class="col-sm-8">
            <div class="col-12"><h1>{{$pelicula->title}}</h1></div>
            <div class="col-12"><h3>Año: {{$pelicula->year}}</h3></div>
            <div class="col-12"><h3>Director: {{$pelicula->director}}</h3></div>
            <div class="col-12"><p class=""><span class="fw-bold">Resumen: </span>{{$pelicula->synopsis}}</p></div>
            <div class="col-12"><span class="fw-bold">Estado: </span>@if($pelicula->rented == true)
                                    <p>Película actualmente alquilada.</p>
                                    @else
                                    <p>Película disponible.</p>
                                    @endif
            </div>
            <div class="col-8 d-flex justify-content-between">
                @if($pelicula->rented == false)
                <div class="col-3"><a href="{{url('/catalog/alquilar/' . $id)}}"><button class="btn btn-primary">Alquilar película</button></a></div>
            @else    
                <div class="col-3"><a href="{{url('/catalog/devolver/' . $id)}}"><button class="btn btn-danger">Devolver película</button></a></div>
            @endif
            <div class="col-3"><a class="btn btn-warning" href="{{ url('/catalog/edit/' . $id ) }}" role="button">Editar película</a></div>
            <div class="col-3"><a class="btn btn-light" href="{{ url('/catalog' ) }}" role="button">Volver al listado</a></div>
            </div>
        </div>
    </div>
@stop