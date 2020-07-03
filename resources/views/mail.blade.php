@extends('layouts.app')

@section('content')
<div class="container">

    Dear, {{Auth::user()->name}}! Welcome to blog!

</div>



@endsection
