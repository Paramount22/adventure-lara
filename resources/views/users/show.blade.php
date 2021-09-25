@extends('layouts.app')


@section('content')
    <h3> {{ $user->name }} </h3>

    @include('partials.dude')


@endsection
