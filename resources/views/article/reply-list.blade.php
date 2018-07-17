@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Coments</h1>
        <table class="table table-striped table-bordered">
            <tbody>
            @foreach($reply as $replay)
                <tr>
                    <td>{{$replay->username}}</td>
                    <td>{{$replay->comment}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection