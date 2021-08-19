## バジリスクタイムロゴジェネレーター

○○タイムというロゴをバジリスクタイム風に作成します。  
Dockerで環境構築をすることができます．  

## 使い方
### 初回の操作
`/src/maumarutime/` 直下に存在する `.env.example` を参考に `.env` ファイルを作成して配置してください．  
`docker-compose build` コマンドを実行後  
`docker-compose up -d`   
Twitter共有を利用する場合は以下の操作が必要です  
`docker-compose exec php /bin/bash -c "cd /src/maumarutime && composer install"`    
`docker-compose exec php mkdir /src/maumarutime/public/tmp`  
  
権限で怒られた場合は以下を実行してみてください．  
`docker-compose exec php chmod 777 -R /src/maumarutime`

### 初回後の操作
起動  
`docker-compose up -d`   
終了  
`docker-compose down` 

## 素材

[こちら](https://twitter.com/tolt_santyoku/status/871973251295068160?s=20)の素材を使用しています。


## フレームワークについて

Laravelが用いられています。
