<div id="video-list">
    @if(count($videos) >= 1)
        @foreach($videos as $video)
            <div class="video-item card col-md-10 rounded float-left mb-3" >
                <div class="n card-body">
                    <!--imagen de un video -->
                    @if(Storage::disk('images')->has($video->image))
                        <div class="video-image-thumb col-md-3 rounded float-left ">
                            <div class="video-image-mask">
                                <img src="{{url('miniatura/'.$video->image)}}" class="video-image"/>
                            </div>
                        </div>
                    @endif
                    <div class="data">
                        <h4>
                            <a class="video-title" href="{{route('detailVideo',['video_id'=>$video->id])}}">{{$video->title}}</a>
                        </h4>

                        <p>
                            <a href="{{route('channel',['user_id' => $video->user_id])}}">{{$video->user->name}}</a> | {{\FormatTime::LongTimeFilter($video->created_at) }}
                        </p>
                    </div>
                    <!--botones de accion -->
                    <a href="{{route('detailVideo',['video_id'=>$video->id])}}" class="btn btn-success">Ver</a>
                    @if(Auth::check()&& Auth::user()->id == $video->user->id)
                        <a href="{{route('editVideo',['video_id'=>$video->id])}}" class="btn btn-warning">Editar</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$video->id}}">
                            Eliminar
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$video->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">¿Estas Seguro?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ¿seguro quieres borrar este comentario?
                                        <p class="text-danger">{{$video->title}}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <a href="{{route('deleteVideo',['video_id'=>$video->id])}}" type="button" class="btn btn-danger">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-warning">No hay videos actualmente!!</div>
    @endif
    <div class="clearfix"></div>
    {{$videos->links()}}
</div>
