<form class="form-inline" method="post" action="{{route('replay' ,  $comment->id)}}">
    @csrf
    <input type="hidden" value="{{$comment->id}}">

    <div class="col-lg-6 offset-lg-2 col-10">
        @csrf
        <input type="text" class="form-control " name="reply" placeholder="Enter replay ">
    </div>
    <div class="col-lg-2 col-2 send-icon">
        {{--<a href="{{route('comment' , $article->id)}}" target="_blank"><i class="fa fa-paper-plane" aria-hidden="true"></i></a>--}}
        <button type="submit" class="btn btn-primary mb-2">replay</button>
    </div>
</form>