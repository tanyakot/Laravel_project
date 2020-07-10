@extends('layouts.app')

@section('content')
<div class="container">
    Post ID: {{$post->id}}

   <form action="/posts/{{$post->id}}" class="form-group" method="POST">
       <input type="hidden" name="_method" value="PUT">
       @csrf
       <input type="text" name="title" value="{{$post->title}}" class="form-control" />
       <textarea name="description" class="form-control">{{$post->description}}></textarea>
       <input type="submit"  class="btn btn-outline-dark" value="Update">
   </form>






    <form action="/posts/{{$post->id}}" class="form-group" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        @csrf

        <input type="submit"  class="btn btn-dark" value="DELETE">
    </form>




    </div>
@endsection

