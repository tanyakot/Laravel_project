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
        <td> Likes</td>
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

               <td>
                   <span id="likes_count_{{$post->id}}0"></span>
                   <img id="ico_{{$post['id']}}" width="20" src="@if($post['liked_by_me'])hr.png @else hw.png @endif" style="cursor:pointer;" onclick="setLike({{$post['id']}})">
               </td>
           </tr>
        @endforeach
        </tbody>
    </table>

</div>
<script>
    function setLike(postId) {
        let src = $("#ico_" + postId).attr('src').trim();
        let likesCount = parseInt($("#likes_count_" + postId).text());
        if (src === "hr.png") {
            //disliked
            $("#ico_" + postId).attr('src', 'hw.png');
            likesCount--;
        } else {
            //liked
            $("#ico_" + postId).attr('src', 'hr.png');
            likesCount++;
        }
        $("#likes_count_" + postId).text(likesCount);
        $.post("/posts/" + postId + '/like', function (res) {
            console.log(res);
        })
    }
</script>
<div class="pagination">
    {{$posts ?? ''->links()}}
</div>



@endsection
