
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="container row">
                <div class="col-md-4">
                    <h2>Busqueda: {{$search}}</h2>
                </div>
                <div class="col-md-8">
                    <form class="col-md-4 float-right" action="{{route('videoSearch',['search'=>$search])}}" method="get">
                        <label for="filter">Ordenar</label>
                        <select name="filter" class="form-control">
                            <option value="new">Mas nuevo primero</option>
                            <option value="old">Mas antiguo primero</option>
                            <option value="alfa">De la A a la Z</option>
                        </select>
                        <input type="submit" value="ordenar" class="btn-filter btn btn-sm btn-primary ">
                        <br>
                    </form>
                </div>
                <div class="col-md-12 ">
                    @include('video.videoList')
                </div>

            </div>

        </div>
    </div>
@endsection
