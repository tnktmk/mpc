<?php
use App\Models\UserToken;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('test.{token}', function ($user,$token) {
   
    //qrを処理したtokenを付与したプライベートチャンネルなら認可する
    return true;

});
