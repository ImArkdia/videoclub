@extends('layouts.master')

@section('content')
<div class="row" style="margin-top:40px">
    <div class="offset-md-3 col-md-6">
       <div class="card">
          <div class="card-header text-center">
             Modificar película
          </div>
          <div class="card-body" style="padding:30px">
 
             <form action="" method="POST">
                @method('PUT')
                @csrf
 
             <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $pelicula->title }}" required>
             </div>
 
             <div class="form-group">
                <label for="year">Año</label>
                <input type="text" name="year" id="year" class="form-control" value="{{ $pelicula->year }}" required>
             </div>
 
             <div class="form-group">
                <label for="director">Director</label>
                <input type="text" name="director" id="director" class="form-control" value="{{ $pelicula->director }}" required>
             </div>
 
             <div class="form-group">
                <label for="poster">Poster</label>
                <input type="text" name="poster" id="poster" class="form-control" value="{{ $pelicula->poster }}" required>
             </div>
 
             <div class="form-group">
                <label for="synopsis">Resumen</label>
                <textarea name="synopsis" id="synopsis" class="form-control" rows="3" required>{{$pelicula->synopsis}}</textarea>
             </div>

             <input type="hidden" name="id" id="id" value="{{$id}}">
 
             <div class="form-group text-center">
                <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                    Modificar película
                </button>
             </div>
             @if(@isset($editado))
                  <div>No se ha podido editar</div>
             @endif
            </form>
          </div>
       </div>
    </div>
 </div>
@stop