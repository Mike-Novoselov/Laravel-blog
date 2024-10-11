@extends('layouts.main')
@section('content')
    <br>
    <div>шаблон пост</div>
    <br>
    @foreach($posts as $post)
        <div>{{ $post -> title }}</div>
        <div>{{ $post -> content }}</div>
        <div>{{ $post -> likes }}</div>
        <br>
    @endforeach
@endsection
