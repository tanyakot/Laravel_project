@extends('layouts.app')

@section('content')
<div class="container">

    <table class="table table-bordered table-dark">
        <thead>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>User</th>
        <th>Create_at</th>
        </thead>
        <tbody>
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->created_at}}</td>
            </tr>
        </tbody>
    </table>


    </div>
@endsection
