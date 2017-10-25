@extends('layouts.master')

@section('content')

    <div class="row">

        <div class="col-sm-4">

            <img src="{{$pelicula['poster']}}" class="img-responsive"/>

        </div>
        <div class="col-sm-8">

            <h2>
                {{$pelicula['title']}}
            </h2>

            <p>
                <strong>Año:</strong> {{$pelicula['year']}}
            </p>

            <p>
                <strong>Director:</strong> {{$pelicula['director']}}
            </p>

            <p>
                <strong>Resumen:</strong> {{$pelicula['synopsis']}}
            </p> 

            <p>
                <strong>Estado:</strong> {{ $pelicula['rented'] == 0 ? "Película disponible"  : "Película actualmente alquilada" }} 
            </p>

            @if ($pelicula['rented'])
                <a class='btn btn-danger'>Devolver película</a>
            @else
                <a class='btn btn-success'>Alquilar película</a>
            @endif

            <a class="btn btn-warning" href="{{ url('/catalog/edit/' . $pelicula['id'] ) }}"><span class="glyphicon glyphicon-pencil"></span> Editar pelicula</a>

            <a >
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-chevron-left"></span> Volver al listado
                </button>
            </a>    

        </div>
    </div>

@stop