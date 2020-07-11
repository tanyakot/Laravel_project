@extends('layouts.app')

@section('content')
<div class="container">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <form action="/posts" method="POST" class="form-group">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="text" name="title" class="form-control" placeholder="Title">
        <textarea name="description" class="form-control" placeholder="Your text"></textarea>
        <button class="btn btn-success">Create</button>
    </form>

    <table class="table table-bordered table-dark">
        <thead>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>User</th>
        <th>Create_at</th>
        <th>Edit</th>
        </thead>
        <tbody>
        @foreach($posts as $post)
           <tr>
               <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>
               <td>{{$post->user->name}}</td>
               <td>{{$post->created_at}}</td>
                   <td> <a href="posts/{{$post->id}}" class="btn btn-primary">Edit</a> </td>

           </tr>
        @endforeach
        </tbody>
    </table>

</div>


<div class="pagination">
    {{$posts ?? ''->links()}}
</div>









@endsection
