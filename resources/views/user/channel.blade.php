@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="container row">

                    <h2>Canal de  {{$user->name}}</h2>

                <div class="col-md-12 ">
                    @include('video.videoList')
                </div>

            </div>

        </div>
    </div>
@endsection
