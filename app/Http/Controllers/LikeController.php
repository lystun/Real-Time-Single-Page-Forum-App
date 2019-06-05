<?php

namespace App\Http\Controllers;

use App\Like;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    public function likeIt(Reply $reply){

         $reply->likes()->create([
//             'user_id' => Auth::id(),
             'user_id' => '1',

         ]);
    }

    public function unLikeIt(Reply $reply){

        $reply->likes()->where(
           'user_id', 1
        )->first()->delete();

    }
}
