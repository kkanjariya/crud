@extends('layouts.app')
@section('css')
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <style>
        .ajax-load{
            background: #e1e1e1;
            padding: 10px 0px;
            width: 100%;
        }
    </style>
@stop
@section('content')
   <div class="container">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            {{--<a class="navbar-brand" href="{{ URL::to('nerds') }}">Nerd Alert</a>--}}

        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{route('add:article')}}" class="btn btn-success">Create Article</a>
        </ul>
    </nav>

    <h1>All Article</h1>
       <table class="table table-striped table-bordered">
        <thead>
        <tr>
            {{--<td>Name</td>--}}
            <td>Title</td>
            <td>Description</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody id="post-data">
                @include('data')
        </tbody>
    </table>
       <div class="ajax-load text-center">
           <td><button type="button" name="btn_more"  id="btn_more" class="btn btn-success form-control">more</button></td>
       </div></div>
       {{--{{ $articles ->links() }}--}}
@stop
@section('js')
    <script >
        var page =1 ;
//        loadMoreData(page);
//        $(window).scroll(function() {
//            console.log('test');
//            if($(window).scrollTop() + $(window).height() >= $(document).height()) {
//                page++;
//                loadMoreData(page);
////
//            }
//        });
        $(document).ready(function () {
            $('#btn_more').click(function () {
              if('#b')
                page++;
                loadMoreData(page);

            });

        function loadMoreData(page) {
            $.ajax(
                    {
                        url: '?page=' + page,
                        type: "get",
                        beforeSend: function () {
                            $('.ajax-load').show();
                        }
                    })
                    .done(function (data) {
                        if (data.html == '') {
                            $('.ajax-load').html("No more records found");
                            return;
                        }else {
                            $('.ajax-loading').hide();
                            $("#post-data").append(data.html);
                        }
                    })
                    .fail(function (jqXHR, ajaxOptions, thrownError) {
                        alert('server not responding...');
                    });
        }
        });
    </script>

@endsection