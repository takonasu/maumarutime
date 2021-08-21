<!-- トップページ -->

@extends('frame')
@section('ogp')
<meta name="description" content="○○タイム　ロゴメーカー">
<meta property="og:site_name" content="○○タイム　ロゴメーカー">
<meta property="og:type" content="summary_large_image">
<meta property="og:url" content="{{env('APP_URL')}}/make?words=ばじりすく">
<meta property="og:title" content="バジリスクタイム　ロゴメーカー">
<meta property="og:image" content="{{env('APP_URL')}}/make?words=ばじりすく">
<meta property="og:description" content="○○タイム　ロゴメーカー">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@takonasu_piano">
@endsection
@section('content')

<h1 class="title">投稿が完了しました</h1>
<p class="subtitle">稀にツイートできていないことがあるのでツイッターを確認してください。</p>
<a href="/"><button class="button is-info is-medium is-fullwidth has-text-weight-bold">トップに戻る</button></a>

@endsection