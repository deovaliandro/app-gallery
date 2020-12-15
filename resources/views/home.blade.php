@extends('layouts.app')

@section('navbar')
    @include('inc.hero')
@endsection

@section('content')

<div class="column">
        <h3 class="title is-2 has-text-centered">"Easy To Use & Great Design"</h3>
        <p class="subtitle is-4 has-text-centered">Some nice words about us 😳</p>
    </div>
    <br>
    <div class="columns is-centered is-multiline">
        @foreach ($gallery as $gl)    
        <div class="column is-4">
            <div class="box box-shadow-lift">
                <div class="card-content">	<i class="fal fa-quote-left"></i>
                    <figure class="image is-4by3 margin-middle">
                        @if( ( $gl->photo == NULL ) || ( $gl->photo == "" ) )
                            <img class="" src="{{ asset('img/640x480.png') }}">
                        @else
                            <img class="" src="{!! url('/data_file')."/".$gl->photo !!}">
                        @endif
                    </figure>
                    <div class="media" style="border-top: none">
                        <div class="media-content has-text-centered" style="margin: 0.9rem 0">
                            <p class="title is-4">{{ $gl->title }}</p>
                            <p class="subtitle has-text-grey is-6">{{ $gl->address }}</p>
                        </div>
                    </div>
                    <div class="content">
                        <p class="limit-text">By far the best design and most features I've seen on a landing page. Definitely one of the best profile builders - and with that price tag, it's just awesome. I like the simplicity and the ease-of-use.</p>
                    </div>
                    <hr>
                    <a href="/detail/{{ $gl->id }}" class="button is-fullwidth" target="" rel="">View More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
