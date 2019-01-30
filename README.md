### Docker環境の準備

開発には全面的にDockerとDocker Composeを用います。
そのためDockerとDocker Composeに関してはインストールが必要です。
WindowsOSは非対応となっています。

#### Run setup script

下記を叩くだけで環境構築をすべて完了します。
順番に実行してください。

```
$ git clone https://github.com/nyanko-kota/Docker-nuxt-laravel
```

```
$ ./setup.sh
```

#### アプリの起動

```
$ docker-compose up
```

このコマンドを入力後、

http://localhost:1080  にアクセスすると、mail(mailcatcher)が表示されます。

http://localhost:3000  にアクセスすると、ユーザーページ(nuxt.js)が表示されます。

http://localhost:8000  にアクセスすると、apiサーバー(laravel)が表示されます。

http://localhost:8080 にアクセスすると、redis(redis-commander)が表示されます。

http://localhost:8081  にアクセスすると、pgweb(postgresql)が表示されます。

#### 最後に

この環境はテスト用です。
セキュリティの問題により本番には流用できないのでご注意ください。
