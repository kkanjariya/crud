@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Article</div>

                    <div class="card-body">
                        <form method="post" action="{{route('store:article')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label text-md-right">Title</label>
                                <div class="col-md-6">
                                    <input type="text" name="title" class="form-control">
                                    {!! $errors->first('title','<span class="text text-danger">:message</span>')!!}

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-4 col-form-label text-md-right">Description</label>
                                <div class="col-md-6">
                                    <input type="text" name="description" class="form-control">
                                    {!! $errors->first('description','<span class="text text-danger">:message</span>')!!}

                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button class="btn btn-primary" type="submit">Submit</button>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection