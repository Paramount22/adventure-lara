@extends('layouts.app')

@section('title', 'Delete dude')

@section('content')


    <section class="add-dude">
        <form action="{{ route('dude.destroy', $dude->slug) }}" method="POST" id="delete-form" class="col-md-6 offset-md-3">
            @csrf
            @method('DELETE')

                <h4 class="mb-3">
                    {{ $dude->title }}
                </h4>
                <p>
                    {!! $dude->save_text !!}
                </p>


            <div class="">
                <button class="btn btn-block mt-3 btn-primary " type="submit">Delete</button>
            </div>

            <div class="col-md-6 offset-md-3 pt-2">
                <a href="{{ url('dudes/' . $dude->slug  ) }}">back</a>
            </div>
        </form>
    </section>




@endsection
