<section class="offset-lg-1">

    <div class="row">
        @foreach($dudes as $dude)
            <div id="item-{{ $dude->id }}" class="dude col-lg-3 " style="margin-left: 1em">
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

            </div>
        @endforeach

    </div>


</section>
