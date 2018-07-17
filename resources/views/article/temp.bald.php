@extends('layouts.app')
@section('title')
Details
@stop
@section('css')
<link href="{{ asset('css/detail.css') }}" rel="stylesheet">

@stop
@section('content')
<div class="container">
    {{--<div class="row ">--}}
        <div class="card">
            <div class="card-header">Articles Details</div>
            <div class="card-body">
                <h4>hey</h4>
                <table class="table table-striped table-bordered">
                    <thead>
                    <input type="hidden" value="{{$article->id}}" name="article_id">
                    <tr>
                        <td>Name</td>
                        <td>{{$article->name}}</td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>{{$article->title}}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{$article->description}}</td>
                    </tr>
                    </thead>
                </table>
                <hr>
                <div class="row">
                    <div class="col-md-1">
                        <a class="btn btn-info" href="{{route('like' , $article->id)}}"><i onclick="myFunction(this)" class="fa fa-thumbs-up"  style="font-size: 18px;"></i></a>
                        <a href="{{route('user:like' ,$article->id)}}"><div style="display: inline" id="like{{$article->id}}-bs3">{{ $article->likes()->get()->count() }}</div></a>
                    </div>
                    <div class="col-md-9">
                        @include('article.comment')</td>
                    </div>
                </div>
                <hr>


                <tr>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <h4>Comments</h4>
                        <tr>
                            <td></td>
                            <td>Comments</td>
                            {{--<td>Like and Replay</td>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                        <tr>

                            <td>{{$comment->username}}</td>
                            <td>
                                {{$comment->comment}}
                                @include('article.replay')


                            </td>
                            <td>
                            </td>
                            <td>

                            </td>

                        </tr>
                        @endforeach
                        </tbody>

                    </table>
                </tr>
                </thead>
                </table>

            </div>
        </div>
    </div>

    @endsection
