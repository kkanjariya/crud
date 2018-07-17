@extends('layouts.app')
@section('title')
    Details
@stop
@section('css')
    <link href="{{ asset('css/detail.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>--}}
    {{--<link rel="stylesheet" href="custom.css">--}}
    <link href="{{ asset('css/custome.css') }}" rel="stylesheet">

@stop
@section('content')

    <div class="container">
        {{--<div class="row ">--}}
        <div class="card offset-1" style="width: 80%;">
           <div class="card-header">Details</div>
            <div class="card-body">
               <div class="card">
                    <div class="card-header">Articles Details</div>
                    <div class="card-body">
                        <input type="hidden" value="{{$article->id}}" name="article_id">
                          <div class="row">
                              <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3 offset-1">User Name :</div>
                                    <div class="col-md-6">{{$article->name}}</div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-3 offset-1">Article Title :</div>
                                    <div class="col-md-6">{{$article->title}}</div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-3 offset-1">Description :</div>
                                    <div class="col-md-6">{{$article->description}}</div>
                                </div>
                              </div>
                              <div class="col-md-3">
                                  <a class="btn btn-info" href="{{route('like' , $article->id)}}"><i onclick="myFunction(this)" class="fa fa-thumbs-up"  style="font-size: 18px;"></i></a>
                                  <a href="{{route('user:like' ,$article->id)}}"><div style="display: inline" id="like{{$article->id}}-bs3">{{ $article->likes()->get()->count() }}</div></a>
                              </div>
                          </div>
                   </div>
               </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-header">Comments</div>
                <div class= "card-body">
                    <div class="row">
                        <div class="col-lg-9 offset-lg-2  comment-main rounded">
                            <ul class="p-0">
                                <li>
                                    <div class="card">
                                        @foreach($comments as $comment)
                                        <div class="row comment-box p-1 pt-3 pr-4">
                                            <div class="col-lg-2 col-3 user-img text-center">
                                                <img src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="main-cmt-img">{{$comment->username }}
                                            </div>
                                            <div class="col-lg-10 col-9 user-comment bg-light rounded pb-1">
                                                <div class="row">
                                                    <div class="col-lg-8 col-6 border-bottom pr-0">
                                                        <p class="w-100 p-2 m-0">{{$comment->comment}}</p>
                                                    </div>
                                                    <div class="col-lg-4 col-6 border-bottom">
                                                        <p class="w-100 p-2 m-0"><span class="float-right"><i class="fa fa-clock-o mr-1" aria-hidden="true"></i>{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</span></p>
                                                    </div>
                                                </div>
                                                <div class="user-comment-desc p-1 pl-2">
                                                   @include('article.replay')
                                                </div>
                                            </div>
                                        </div>
                                       @foreach($comment->reply as $reply)
                                        <div class="row">
                                            <div class="col-lg-11 offset-lg-1">
                                                <ul class="p-0">
                                                    <li>
                                                        <div class="row comment-box p-1 pt-2 pr-4">
                                                            <div class="col-lg-3 col-3 user-img">
                                                                <img src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="p-2 float-right sub-cmt-img">
                                                            </div>
                                                            <div class="col-lg-9 col-9 user-comment bg-light rounded pb-1 mt-2">
                                                                <div class="row">
                                                                    <div class="col-lg-7 col-6 border-bottom pr-0">
                                                                        <p class="w-100 p-2 m-0">{{$reply->comment}}</p>
                                                                    </div>
                                                                    <div class="col-lg-5 col-6 border-bottom">
                                                                        <p class="w-100 p-2 m-0"><span class="float-right"><i class="fa fa-clock-o mr-1" aria-hidden="true"></i>{{\Carbon\Carbon::parse($reply->created_at)->diffForHumans()}}</span></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endforeach<br>
                                            <div class="load-ajax offset-1">
                                                <a id="btn_more" href="#">Show more</a>
                                            </div>
                                         <hr>

                                         <div class="row">
                                            @include('article.comment')
                                         </div>
                                            <br>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
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
                            if (data.html == " ") {
                                $('.ajax-load').html("No more records found");
                                return;
                            }
                            $("#post-data").append(data.html);
                        })
                        .fail(function (jqXHR, ajaxOptions, thrownError) {
                            alert('server not responding...');
                        });
            }
        });
    </script>

@stop