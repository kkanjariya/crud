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
       <tr id="remove_row">
           <td><button type="button" name="btn_more"  id="btn_more" class="btn btn-success form-control">more</button></td>
       </tr>
       @stop
@section('js')
    <script >
        $(document).ready(function(){
            $(document).on('click', '#btn_more', function(){
              var article_id = $(this).data("article_id");
                $('#btn_more').html("Loding...");
                $.ajax({
                    url:"crud",
                    method: "Post",
                    data:{article_id:article_id},
                    dataType:"text",
                    success:function (data) {
                        if(data != '')
                        {
                            $('#remove_row').remove();
                            $('#load_data_table').appdend(data);

                        }
                        else
                        {
                            $('#btn_more').html("no data");
                        }

                    }

                })
            });
        });


        //        function loadMoreData(page){
    </script>

@endsection