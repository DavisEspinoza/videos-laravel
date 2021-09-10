<hr>
    <h4>Comentarios</h4>
<hr>
@if(session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
@endif
@if(Auth::check())
<form class="col-md-4" method="post" action="{{route('comment')}}">
    @csrf
    <input type="hidden" name="video_id" value="{{$video->id}}" required>
    <p>
        <textarea class="form-control" name="body" required></textarea>
    </p>
    <input type="submit" value="Comentar" class="btn btn-success">
</form>
<div class="clearfix"></div>
<hr>
@endif
@if(isset($video->comments))
    <div id="coment-list">
        @foreach($video->comments as $comment)
            <div class="comment-item col-md-12 mb-3">
                <div class="card comment-data">
                    <div class="card-header">
                        <div class="card-title">
                            <strong>{{$comment->user->name}}</strong> {{\FormatTime::LongTimeFilter($comment->created_at) }}
                        </div>
                    </div>
                    <div class="card-body">
                        {{$comment->body}}
                        @if(Auth::check() && (Auth::user()->id == $comment->user_id || Auth::user()->id == $video->video_id))
                            <div class="float-right">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal{{$comment->id}}">
                                    Eliminar
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$comment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <p class="text-danger">{{$comment->body}}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <a href="{{route('deleteComment',['comment_id'=>$comment->id])}}" type="button" class="btn btn-danger">Eliminar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif