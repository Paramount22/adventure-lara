@extends('layouts.app')

@section('content')

    <section>
        <div class="row">
            @forelse( $dudes as $dude )
                <article id="item-{{ $dude->id }}">
                    <h4>
                        <a href="{{ url('dudes/' . $dude->slug) }}">{{ $dude->title }}</a>
                    </h4>
                    <p>
                        {{ $dude->text }}
                    </p>

                    <p>
                        <small style="font-style: italic">
                            by <a href="{{ route('show.user', $dude->user->id) }}">{{ $dude->user->name }}</a>
                        </small>

                    </p>

                    <div class="comment">
                        <small>
                            @if( $dude->comments->count() < 1  )
                                <div class="no-comments">
                                    <a href="{{ url('dudes/' . $dude->slug) .'#comments' }}">no comments</a></div>
                            @else
                                <a href="{{ url('dudes/' . $dude->slug) .'#comments' }}" class="" >
                                    {{  $dude->comments->count() }}
                                    {{ Str::plural('comment', $dude->comments->count()) }}

                                </a>
                            @endif
                        </small>
                    </div>
                </article>

            @empty
                <p> No dudes yet :-( </p>

            @endforelse
        </div>

    </section>

    <section class="info col-lg-5 offset-lg-3 mb-4">
        <p> Number of dudes:
             <strong>{{ $dudes->count() }}</strong>
        </p>
        <p>
            Number of comments:
            @if( isset($comments) )
                <strong>{{ $comments }}</strong>
            @endif
        </p>

    </section>


@endsection




