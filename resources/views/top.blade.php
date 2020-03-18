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

<h1 class="title">バジリスクｗｗｗ<br>タイムｗｗ</h1>
<p class="subtitle">バジリスクタイムのロゴが作れるよ！</p>
<form action="./result" method="get" style="margin-bottom:10px;">
    <div class="field">
        <div class="control">
            <input class="input is-medium" name="words" type="text" placeholder="バジリスク">
        </div>
    </div>
    <div class="control">
        <button class="button is-info is-medium is-fullwidth has-text-weight-bold" type="submit">作成</button>
    </div>
</form>

<article class="jumbotron">
    <h3>遊び方</h3>
    <ul>
        <li>ひらがなのみで入力してください。</li>
        <li>自動的に入力した文字の後に「タイム」が付きます。</li>
        <li>正しく入力しないと画像がうまく表示されません。</li>
        <li>背景は透過されてるよ！！　(´๑•﹏•๑)(๑•﹏•๑`)ぷえ〜っ</li>
        <li>作った画像をツイートすると僕が喜びます（）</li>
    </ul>
</article>
<article class="jumbotron">
    <h3>濁点や半濁点について</h3>
    <p>強制的に濁点をつけるとき（「う゛」や「あ゛」など）は、
        濁点（゛）の時は大文字で「１」もしくは「２」、半濁点「゜」の時は大文字で「０」を入力することで、
        単体で作成することができます。
        濁点の種類は2種類あるので、「１」「２」で使い分けて試してみてください。</p>
    <p>（例）「う゛あぁぁ」→「う１あぁぁ」</p>
    <p>「む゛っ」→「む２っ」</p>
    <p>「あ゜っ」→「あ０っ」</p>
</article>
<article class="jumbotron">
    <div class="update">

        <h3>更新履歴</h3>

        <dl>
            <dt>2020/03/17</dt>
            <dd>Laravelで作り直されました。が、画像生成のアルゴリズムは変わっていません。ソースコードが<a
                    href="https://github.com/takonasu/maumarutime">Githubに公開</a>されました。</dd>

            <dt>2020/01/10</dt>
            <dd>ドメインの更新を忘れてドメインが消失しました！よってURLが変更されました！</dd>

            <dt>2019/01/09</dt>
            <dd>URLが変更されました。</dd>

            <dt>2018/11/21</dt>
            <dd>デザインを改善しました。</dd>

            <dt>2018/10/15</dt>
            <dd>濁点と半濁点を単体で出力できるようになりました。</dd>

            <dt>2018/04/01</dt>
            <dd>画像をツイッターで簡単に共有できるようになりました！</dd>

            <dt>2018/03/29</dt>
            <dd>全ての小文字に対応・Webデザイン変更・シェアボタンの設置</dd>

            <dt>2018/03/28</dt>
            <dd>サービスを開始しました。</dd>


        </dl>

    </div>
</article>
@endsection