@extends('inc.headeradmin')
@section('content')
<section class="section">
    <div class="container">
        <div class="card">
            <div class="card-image">
                <figure class="image is-4by3">
                    @if( ( $gallery->photo == NULL ) || ( $gallery->photo == "" ) )
                        <img class="" src="{{ asset('img/640x480.png') }}">
                    @else
                        <img class="" src="{!! url('/data_file')."/".$gallery->photo !!}">
                    @endif
                </figure>
            </div>

            <div class="card-content">
                <div class="media">
                    <div class="media-content">
                        <p class="title is-4">{{ $gallery->name }}</p>
                        <p class="subtitle is-6">{{ $gallery->address }}</p>
                    </div>
                </div>

                <div class="content">
                    {{ $gallery->information }};
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
