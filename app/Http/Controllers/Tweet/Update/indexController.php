<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Services\TweetService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class indexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        // ルートパラメータからつぶやきIDを取得
        $tweetId = (int) $request->route('tweetId');

        // 自分のつぶやきであるかをチェックし、他人のつぶやきの場合例外をスロー
        if(!$tweetService->checkOwnTweet($request->user()->id, $tweetId)) {
            throw new AccessDeniedHttpException('他人のつぶやきは編集できません。');
        }

        // つぶやきIDに対応するつぶやきを取得し、見つからない場合は例外をスロー
        $tweet = Tweet::where('id', $tweetId)->firstOrFail();

        // つぶやきをビューに渡す
        return view('tweet.update')->with('tweet', $tweet);
    }
}
