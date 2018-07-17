@extends('layouts.app')

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

        <h1>All Coments</h1>
        <table class="table table-striped table-bordered">
            <tbody>
            @foreach($comments as $comment)
                <tr>
                   <td>{{$comment->comment}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection