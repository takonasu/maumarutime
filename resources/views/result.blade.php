<!-- トップページ -->

@extends('frame')
@section('ogp')
<meta name="description" content="○○タイム　ロゴメーカー">
<meta property="og:site_name" content="○○タイム　ロゴメーカー">
<meta property="og:type" content="summary_large_image">
<meta property="og:url" content="https://maumarutime.ga/make?words={{$words}}">
<meta property="og:title" content="バジリスクタイム　ロゴメーカー">
<meta property="og:image" content="https://maumarutime.ga/make?words={{$words}}">
<meta property="og:description" content="○○タイム　ロゴメーカー">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@takonasu_piano">
@endsection

@section('content')

<h1 class="title">バジリスクｗｗｗ<br>タイムｗｗ</h1>
<p class="subtitle">バジリスクタイムのロゴが作れるよ！</p>

<article class="jumbotron">
    <h3>生成結果</h3>
    <div class=" has-text-centered">
        <img src="./make?words={{$words}}">
    </div>
    <a href="http://twitter.com/share?url=https://maumarutime.ga/result?words={{base64_encode($words)}}&text=バジリスクタイムロゴジェネレーターで遊んだよ！&hashtags=バジリスクタイムロゴジェネレーター" target="_blank"><button class="button is-info is-medium is-fullwidth has-text-weight-bold" style="margin-bottom:1rem;">Twitterでシェアする</button></a>
    <a href="/"><button class="button is-info is-medium is-fullwidth has-text-weight-bold">トップに戻る</button></a>
</article>
@endsection