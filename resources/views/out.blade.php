@extends('layouts.app')
        
@section('content')
    @foreach ($user_images as $user_image)
        <img src="{{ asset('storage/' . $user_image['file_name']) }}">
    @endforeach
@endsection