@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h2>Editar {{$video->title}}</h2>
            <hr>
            <form action="{{route('updateVideo',['video_id' => $video->id])}}" method="post" enctype="multipart/form-data" class="col-lg-7">
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
                    <input type="text" class="form-control" id="title" name="title" value="{{$video->title}}"/>
                </div>
                <div class="form-group">
                    <lavel for="description">Descripcion</lavel>
                    <textarea class="form-control" id="description" name="description">{{$video->description}}</textarea>
                </div>
                <div class="form-group">
                    <lavel for="image">Miniatura</lavel>
                        <div class="video-image-mask">
                            <img src="{{url('miniatura/'.$video->image)}}" class="video-image"/>
                        </div>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="form-group">
                    <lavel for="video">Archivo de video</lavel>
                    <div>
                        <video controls id="video-player" src="{{route('videoFile',['filename'=>$video->video_patch])}}">
                        </video>
                    </div>
                    <input type="file" class="form-control" id="video" name="video">
                </div>
                <button type="submit" class="btn btn-success">Modificar Video</button>
            </form>
        </div>
    </div>
@endsection