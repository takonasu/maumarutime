<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;

class MainController extends Controller
{
    //
    public function makeImage(Request $request){
        $ext = $request -> words;

        if($ext==null){
            return redirect('/');
        }

        //$matches配列にバラした文字を一つ一つ格納
        for ($i=0; $i<strlen($ext)/3; $i++) {
            $matches[] = mb_substr($ext, $i, 1, "UTF-8");
        }
        //関数を使ってimage resourceを生成する。
        foreach($matches as $value){
            $imgName[] = public_path('/img/sets/'.$value.".png");
            $img[] = imagecreatefrompng(public_path('/img/sets/'.$value.".png"));
        }
        $img_time = imagecreatefrompng(public_path('/img/sets/'."たいむ.png"));


        // 画像サイズ(画像タイプは自動判別)
        foreach($imgName as $value){
            list($width[], $height[]) = getimagesize($value);
        }

        $Yokohaba = 0;
        foreach($width as $value){
            $Yokohaba += $value;    //上の文字の重ねない時の合計横幅
        }


        $Yokohaba2 = $Yokohaba-5*strlen($ext)+10;   //上の文字の横幅($Yokohaba-10*strlen($ext)/3+10)
        // ベースのimage resourceを生成して、背景を作成
        $baseImg  = imagecreatetruecolor(max($Yokohaba2,420), 350);
        $bgc = imagecolorallocate($baseImg, 255, 255, 255);
        imagefilledrectangle($baseImg, 0, 0, max($Yokohaba2,420) , 350, $bgc);
        imagecolortransparent($baseImg,$bgc);//透明化

        // ベース画像に画像を順に合成
        $new_x = 0;
        //上の画像の始点
        if(strlen($ext) == 3){
            $new_x = 150;//コピー先のX座標
        }else if(strlen($ext) == 6 && $Yokohaba < 420){
            $new_x = 65;//コピー先のX座標
        }else if(strlen($ext) == 9 && $Yokohaba < 420){
            $new_x = 45;//コピー先のX座標
        }else{
            $new_x = 0;
        }

        for($i=0;$i < count($imgName);$i++){
            if($i != 0){
                $new_x += $width[$i - 1] - 15;
            }
            imagecopy($baseImg, $img[$i], $new_x, 0, 0, 0, $width[$i], $height[$i]);

        }
        if($Yokohaba < 420){
            imagecopy($baseImg, $img_time, 0, 150, 0, 0, 420, 210);
        }else{
            imagecopy($baseImg, $img_time, $Yokohaba2/2-210, 150, 0, 0, 420, 210);
        }

        // ゴミ掃除(1)
        for($i=0;$i < count($img);$i++){
        imagedestroy($img[$i]);
        }

        // PNG形式で吐き出す
        header('Content-Type: image/png');
        imagepng($baseImg);

        // ゴミ掃除(2)
        imagedestroy($baseImg);
    }

    public function result(Request $request){
        $ext = $request -> words;
        if($ext==null){
            return redirect('/');
        }
        if(base64_decode($ext)){
            return view('result')->with('words', base64_decode($ext));
        }

        return view('result')->with('words', $ext);
    }

    public function twitter(Request $request){
        if($request -> words==null){
            return redirect('/');
        }

        $twitter = new TwitterOAuth(
            env('TWITTER_CLIENT_ID'),
            env('TWITTER_CLIENT_SECRET')
        );

        $token = $twitter->oauth('oauth/request_token', array(
            'oauth_callback' => env('TWITTER_CALLBACK_URL').'?words='.$request -> words
        ));

        session(array(
            'oauth_token' => $token['oauth_token'],
            'oauth_token_secret' => $token['oauth_token_secret'],
        ));

        $url = $twitter->url('oauth/authenticate', array(
            'oauth_token' => $token['oauth_token']
        ));

        return redirect($url);
    }

    public function callback(Request $request){
        if($request -> words==null){
            return redirect('/');
        }
        # 参考：https://qiita.com/daiki_44/items/fe11d57e53647f4b59f4
        $oauth_token = session('oauth_token');
        $oauth_token_secret = session('oauth_token_secret');

        # request_tokenが不正な値だった場合エラー
        if ($request->has('oauth_token') && $oauth_token !== $request->oauth_token) {
            return Redirect::to('/');
        }

        # request_tokenからaccess_tokenを取得
        $twitter = new TwitterOAuth(
            $oauth_token,
            $oauth_token_secret
        );
        $token = $twitter->oauth('oauth/access_token', array(
            'oauth_verifier' => $request->oauth_verifier,
            'oauth_token' => $request->oauth_token,
        ));

        # access_tokenを用いればユーザー情報へアクセスできるため、それを用いてTwitterOAuthをinstance化
        $twitter_user = new TwitterOAuth(
            env('TWITTER_CLIENT_ID'),
            env('TWITTER_CLIENT_SECRET'),
            $token['oauth_token'],
            $token['oauth_token_secret']
        );
        // 画像をアップロードして、そのメディアIDを変数に格納
        $media1 = $twitter_user->upload('media/upload', ['media' => public_path('/make?words='.$request -> words)]);
        // ツイートするためのパラメータをセット
        $parameters = [
            'status' => '#バジリスクタイムロゴジェネレーター を使ってみたよ！みんなも遊ぼう！！　https://maumarutime.ga/',
            'media_ids' => implode(',', [
                $media1->media_id_string,
            ])
        ];

        // ツイートを実行
        $result = $twitter_user->post('statuses/update', $parameters);

        return "多分ツイートした";
    }
}