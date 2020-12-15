<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="{{ asset('js/icon.js') }}"></script>
</head>

<body>
    <div class="hero is-fullheight is-primary">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-8 is-offset-2">
                    <h3 class="title has-text-white">Login</h3>
                    <hr class="login-hr">
                    <p class="subtitle has-text-white">Please login to see our cool stuff!</p>

                    <div class="columns is-centered">
                        <div class="column is-half">
                            <div class="notification is-light">
                                <figure class="image container is-64x64">
                                    <img src="https://upload.wikimedia.org/wikipedia/id/9/95/Logo_UH.png">
                                </figure>
                                <br>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="field">
                                        <label class="label">Email</label>
                                        <p class="control has-icons-left has-icons-right">
                                            <input class="input" type="email" placeholder="Email" name="email"
                                                value="{{ old('email') }}" required
                                                autocomplete="email" autofocus>
                                            <span class="icon is-small is-left">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                        </p>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="field">
                                        <label class="label">Password:</label>
                                        <p class="control has-icons-left">
                                            <input class="input" type="password" placeholder="Password" name="password"
                                                required autocomplete="current-password">
                                            <span class="icon is-small is-left">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                        </p>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit"
                                        class="button is-success">{{ __('Login') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
