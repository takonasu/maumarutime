<!-- トップページ -->

@extends('frame')

@section('content')

<h1 class="title">バジリスクｗｗｗ<br>タイムｗｗ</h1>
<p class="subtitle">〜あなただけの時間(タイム)〜</p>
<form action="./artist" method="get" style="margin-bottom:10px;">
    <div class="field">
        <div class="control">
            <input class="input" name="name" type="text" placeholder="バジリスク">
        </div>
    </div>
    <div class="control">
        <button class="button is-info" type="submit">作成</button>
    </div>
</form>

@endsection
