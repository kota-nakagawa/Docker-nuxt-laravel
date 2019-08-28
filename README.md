# Docker-nuxt-laravel
[![MIT License](https://img.shields.io/github/license/nyanko-kota/Docker-nuxt-laravel.svg?style=flat)](https://github.com/nyanko-kota/Docker-nuxt-laravel/blob/master/LICENSE.txt)

### 開発環境の準備

開発にはDockerとDocker Composeを用います。
そのためDockerとDocker Composeに関してはインストールが必要です。
Windowsは非対応となっています。

### 開発環境の構築

下記を叩くだけで環境構築をすべて完了します。
順番に実行してください。

```
$ git clone https://github.com/nyanko-kota/Docker-nuxt-laravel
```
```
$ cd Docker-nuxt-laravel
```
```
$ ./setup.sh
```

### アプリの起動

```
$ docker-compose up
```

このコマンドを入力後、

http://localhost:3000  にアクセスすると、ユーザーページ(nuxt.js)が表示されます。

http://localhost:8000  にアクセスすると、apiサーバー(laravel)が表示されます。

http://localhost:8080 にアクセスすると、redis(redis-commander)が表示されます。

http://localhost:8081  にアクセスすると、pgweb(postgresql)が表示されます。

http://localhost:8082  にアクセスすると、mail(mailcatcher)が表示されます。

### 最後に

この環境はテスト用です。
セキュリティの問題により本番には流用できないのでご注意ください。
