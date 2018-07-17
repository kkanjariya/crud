@extends('layouts.app')
@section('content')
    <div class="container">
        {{--<div class="row ">--}}
        <div class="card">
            <div class="card-header">UserList</div>
            <div class="card-body">
                <h1>User like </h1>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <td>id</td>
                        <td>UserName</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($likes as $like)
                        <tr>
                            <td>{{$like->id}}</td>
                            <td>{{$like->user->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div>
            </div>
        </div>
    </div>

@endsection