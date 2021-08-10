<?php

namespace App\Services;

use App\Models\Meme;
use Illuminate\Support\Arr;
use App\Models\Vote;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Helpers\Helper;

class CommentService
{
    public function create($request,$articleID) {
        Comment::create([
            'text' => $request->comment,
            'user_id' =>Auth::user()->id,
            'meme_id' => $articleID,
        ]);
    }
}