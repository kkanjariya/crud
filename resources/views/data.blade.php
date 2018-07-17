@foreach($articles as $article)
    <tr>
{{--        <td>{{$article->name}}</td>--}}
        <td>{{$article->title}}</td>
        <td>{{$article->description}}</td>
        <!-- we will also add show, edit, and delete buttons -->
        <td>
            <a class="btn btn-small btn-info" href="{{route('edit:article' , $article->id)}}">Update</a>
            <a class="btn btn-small btn-danger" onclick="return confirm('Are you sure delete this article?')" href="{{route('destroy' , $article->id)}}">Delete</a>
            <a class="btn btn-small btn-outline-dark" href="{{route('details',$article->id)}}">Detail</a>
            {{--                    <a class="btn btn-info" href="{{route('like' , $article->id)}}"><i onclick="myFunction(this)" class="fa fa-thumbs-up"  style="font-size: 18px;"></i></a>--}}

        </td>
    </tr>
@endforeach