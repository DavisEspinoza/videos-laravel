@extends('layouts.app')
@section('content')
    <div class="col-md-10 offset-md-1 ">
        <h2>{{$video->title}}</h2>
        <hr>
        <div class="col-md-8">
            <!--video-->
            <video controls id="video-player" src="{{route('videoFile',['filename'=>$video->video_patch])}}">
            </video>
            <!--descripcion-->
            <div class="card video-data">
                <div class="card-header">
                    <div class="card-title">
                        Subido por
                        <strong>
                            <a href="{{route('channel',['user_id' => $video->user_id])}}">{{$video->user->name}}</a>
                        </strong> el {{\FormatTime::LongTimeFilter($video->created_at) }}
                    </div>
                </div>
                <div class="card-body">
                    {{$video->description}}
                </div>
            </div>
            <!--comentario-->
            @include('video.comments')
        </div>
    </div>
@endsection

