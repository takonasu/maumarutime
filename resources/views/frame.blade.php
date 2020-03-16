<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('ogp')
    <title>バジリスクタイムロゴジェネレーター</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129574113-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-129574113-1');
    </script>
</head>

<body>
    <nav class="navbar" role="navigation" aria-label="main navigation">

        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                <p class="title is-5">○○タイムロゴメーカー</p>
            </a>
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
                data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="/">
                    トップページ
                </a>
            </div>
        </div>
    </nav>
    <main>
        <div class="container">
            <section class="section">
                <div class="content">

                    @yield('content')

                </div>
            </section>
        </div>
    </main>
    <footer>
        <a href="https://twitter.com/share" class="twitter-share-button" data-size="large"
            data-url="https://maumarutime.ga/" data-text="バジリスクタイムロゴジェネレーターで遊んだよ！"
            data-hashtags="バジリスクタイムロゴジェネレーター">Tweet</a>
        <script>
        ! function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0],
                p = /^http:/.test(d.location) ? 'http' : 'https';
            if (!d.getElementById(id)) {
                js = d.createElement(s);
                js.id = id;
                js.src = p + '://platform.twitter.com/widgets.js';
                fjs.parentNode.insertBefore(js, fjs);
            }
        }(document, 'script', 'twitter-wjs');
        </script>
        <div class="line-it-button" data-lang="ja" data-type="share-d" data-url="https://maumarutime.ga/"
            style="display: none;"></div>
        <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async"
            defer="defer"></script>
        <script type="text/javascript">
        LineIt.loadButton();
        </script>
        <p>お問い合わせ：<a href="https://twitter.com/takonasu_piano">@takonasu_piano</a></p>
        <div class="content has-text-centered">
        </div>
    </footer>
</body>


<script>
document.addEventListener('DOMContentLoaded', () => {

    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {

        // Add a click event on each of them
        $navbarBurgers.forEach(el => {
            el.addEventListener('click', () => {

                // Get the target from the "data-target" attribute
                const target = el.dataset.target;
                const $target = document.getElementById(target);

                // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                el.classList.toggle('is-active');
                $target.classList.toggle('is-active');

            });
        });
    }

});
</script>

</html>