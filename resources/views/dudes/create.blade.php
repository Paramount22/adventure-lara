@extends('layouts.app')

@section('title', 'New dude')

@section('content')

    <section class="add-dude">
        <h2 class="mb-3">New dude</h2>
        <form action="{{ route('dude.store') }}" method="POST" class="" enctype="multipart/form-data">
            @csrf

            <div class="col-md-6 mb-3 offset-md-3">
                <input type="text" name="title" class="form-control" required="" placeholder="Dude">
            </div>

            <div class="col-md-6 offset-md-3">
                <textarea name="text" placeholder="about dude" class="form-control" rows="5"></textarea>
            </div>

            <div class="form-group">
                @foreach($tags as $tag)
                    <label class="checkbox" for="">{{ $tag->tag }}
                    </label>
                    <input type="checkbox" name="tags[]" value="{{$tag->id}}">
                @endforeach
            </div>

            <div class="col-md-6 offset-md-3">
                <button class="btn btn-block mt-3 btn-primary " type="submit">Add dude</button>
            </div>

            <div class="col-md-6 offset-md-3 pt-2">
                <a href="{{ url('/') }}">back</a>
            </div>
        </form>

    </section>


@endsection
