@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h2>Crear un nuevo video</h2>
            <hr>
            <form action="{{url('guardar-video')}}" method="post" enctype="multipart/form-data" class="col-lg-7">
                @csrf
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <lavel for="title">Titulo</lavel>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}"/>
                </div>
                <div class="form-group">
                    <lavel for="description">Descripcion</lavel>
                    <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
                </div>
                <div class="form-group">
                    <lavel for="image">Miniatura</lavel>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="form-group">
                    <lavel for="video">Archivo de video</lavel>
                    <input type="file" class="form-control" id="video" name="video">
                </div>
                <button type="submit" class="btn btn-success">Crear Video</button>
            </form>
        </div>
    </div>
@endsection