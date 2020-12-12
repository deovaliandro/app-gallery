<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <section class="hero is-fullheight is-dark" style="background-image: url(/storage/download.jpg)">
        <!-- Hero head: will stick at the top -->
        <div class="hero-head">
            <header class="navbar">
                <div class="container">
                    <div class="navbar-brand">

                        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                            <span aria-hidden="true"></span>
                            <span aria-hidden="true"></span>
                            <span aria-hidden="true"></span>
                        </a>
                    </div>

                    <div id="navbarBasicExample" class="navbar-menu">
                        <div class="navbar-end">
                            @guest
                                <div class="navbar-item">
                                    <div class="buttons">
                                        <a class="button is-white is-outlined" href="{{ route('login') }}">
                                            Log in
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="navbar-item has-dropdown is-hoverable">
                                    <a class="navbar-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="navbar-dropdown">
                                        <a class="navbar-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </header>
        </div>

        <!-- Hero content: will be in the middle -->
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">
                    Judul Gambar
                </h1>
                <h2 class="subtitle">
                    Lokasi Penelitian
                </h2>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container is-fluid">
            <div class="columns">
                <div class="column is-1"></div>
                <div class="column">
                    Maximas vero virtutes iacere omnis necesse est voluptate dominante. Negat esse eam, inquit, propter se expetendam. Eam stabilem appellas. Equidem etiam Epicurum, in physicis quidem, Democriteum puto. Plane idem, inquit, et maxima quidem, qua fieri nulla maior potest. Equidem, sed audistine modo de Carneade? Teneo, inquit, finem illi videri nihil dolere. Quid ergo attinet gloriose loqui, nisi constanter loquare?
                    <br>
                    Quia voluptatem hanc esse sentiunt omnes, quam sensus accipiens movetur et iucunditate quadam perfunditur.
                    Sit hoc ultimum bonorum, quod nunc a me defenditur;
                    Est autem situm in nobis ut et adversa quasi perpetua oblivione obruamus et secunda iucunde ac suaviter meminerimus.
                    Nam, ut sint illa vendibiliora, haec uberiora certe sunt.
                    Ita enim vivunt quidam, ut eorum vita refellatur oratio.
                    Mihi quidem Antiochum, quem audis, satis belle videris attendere.</div>
                <div class="column is-1"></div>
            </div>
        </div>
    </section>
</body>
<footer class="footer">
    <div class="content has-text-centered">
        <p>
            <strong>Bulma</strong> by <a href="https://jgthms.com">Jeremy Thomas</a>. The source code is licensed
            <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
            is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
        </p>
    </div>
</footer>
</html>
