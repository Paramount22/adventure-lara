@extends('layouts.app')

@section('title', isset( $tag->tag ) ? $tag->tag : 'Adventure' )

@section('content')

        <h3>{{ $tag->tag }}</h3>

        @include('partials.dude')

@endsection
