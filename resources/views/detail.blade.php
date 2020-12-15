<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <script src="https://kit.fontawesome.com/3daf03b0f7.js" crossorigin="anonymous"></script>

</head>

<body>
    <section class="hero is-dark">
        @include('layouts.navbar')
    </section>
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
</body>

</html>
