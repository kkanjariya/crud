@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Article</div>

                    <div class="card-body">
                        <form method="post" action="{{route('update:article' , $article->id)}}">
                            @csrf
{{--                            <input type="hidden" value="{{$article->id}}">--}}
                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label text-md-right">Title</label>
                                <div class="col-md-6">
                                    <input type="title" name="title" class="form-control" value="{{$article->title}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-4 col-form-label text-md-right">Description</label>
                                <div class="col-md-6">
                                    <input type="title" name="description" class="form-control" value="{{$article->description}}">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <a class="btn btn-small btn-info" href="{{route('articles')}}">Back</a>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection