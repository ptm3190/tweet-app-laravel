<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Tweet\CreateRequest;
use App\Models\Tweet;

// 投稿リクエストを受け取りテーブルに登録するクラス
class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request)
    {
        // Tweetモデルをインスタンス化
        $tweet = new Tweet;

        // リクエストクラスのtweet()を呼び出し、Tweetモデルのcontentに格納
        $tweet->content = $request->tweet();

        // Tweetモデルのsaveメソッドを呼び出し
        $tweet->save();

        // tweet.indexにリダイレクト
        return redirect()->route('tweet.index');

    }
}
