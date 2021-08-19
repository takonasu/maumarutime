<!-- トップページ -->

@extends('frame')
@section('ogp')
<meta name="description" content="○○タイム　ロゴメーカー">
<meta property="og:site_name" content="○○タイム　ロゴメーカー">
<meta property="og:type" content="summary_large_image">
<meta property="og:url" content="{{env('APP_URL')}}/make?words={{$words}}">
<meta property="og:title" content="バジリスクタイム　ロゴメーカー">
<meta property="og:image" content="{{env('APP_URL')}}/make?words={{$words}}">
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
    <a href="./twitter?words={{$words}}"><button class="button is-info is-medium is-fullwidth has-text-weight-bold" style="margin-bottom:1rem;">Twitterでシェアする</button></a>
    <a href="http://twitter.com/share?url={{env('APP_URL')}}/result?words={{base64_encode($words)}}&text=バジリスクタイムロゴジェネレーターで遊んだよ！&hashtags=バジリスクタイムロゴジェネレーター" target="_blank"><button class="button is-info is-medium is-fullwidth has-text-weight-bold" style="margin-bottom:1rem;">簡易的にTwitterでシェアする</button></a>
    <a href="/"><button class="button is-info is-medium is-fullwidth has-text-weight-bold" style="margin-bottom:3rem;">トップに戻る</button></a>
    <p class="subtitle">ちょっと技術的なtips</p>
    <p>
    「Twitterでシェアする」ボタンはTwitterAPIによってお使いのアカウントで画像をツイートします。<br>
    みんなに見てもらったりRTしてもらう可能性が高まります。ログインが必要です。ログイン情報は画像のツイートのみに使われ、ツイート後クライアントID,シークレット等は即時破棄されます。<br>
    「簡易的にTwitterでシェアする」ボタンはOGPを利用して簡易的に画像をTwitterのTL上に表示する機能です。<br>
    ログイン認証は必要ありませんが、みんなに作った画像を見てもらえない可能性があります。
    </p>
</article>
@endsection