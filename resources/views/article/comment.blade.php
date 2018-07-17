  <form method="post" class="form-inline" action="{{route('comment' , $article->id)}}">
    @csrf
       <input type="hidden" value="{{$article->id}}">
         <div class="col-lg-9 offset-lg-1 col-9">
            <input type="text" class="form-control" size="40" name="comment" placeholder="write comments ...">
         </div>
         <div class="col-lg-2 col-2 offset-0 send-icon">
            <button class="btn-info">Comment</button>
         </div>
  </form>

