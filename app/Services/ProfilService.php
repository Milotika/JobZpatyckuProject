<?php

namespace App\Services;

use App\Models\Meme;
use App\Models\Comment;
use Illuminate\Support\Arr;
use App\Models\Vote;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Helpers\Helper;
use App\Services\VoteService;
use App\Services\PageService;
use App\Services\MemeService;
use Illuminate\Support\Facades\Storage;

class ProfilService
{
    private $memeService;


    public function __construct(MemeService $memeService)
    {
        $this->memeService = $memeService;
    }
    public function userShow($user)
    {
        if ($user) {
            $articles = Meme::where('user_id', $user->id)->orderBy('vote_count', 'DESC')->paginate('8', ['*'], 'str');
            if ($articles) {
                return $articles;
            }
        }
    }
    public function categoryShow($user, $categoryName)
    {
        if ($user) {
            $articles = Meme::where('user_id', $user->id)->where('category', $categoryName)->orderBy('vote_count', 'DESC')->paginate('8', ['*'], 'str');
            if ($articles) {
                return $articles;
            }
        }
    }
    public function commentsShow($user)
    {
        if ($user) {
            $checkAnyExist = Comment::where('user_id', $user->id)->first();
            if ($checkAnyExist) {
                $articles = Comment::where('user_id', $user->id)->orderBy('vote_count', 'DESC')->paginate('8', ['*'], 'str');
                if ($articles) {
                    return $this->memeService->commentsWithIntervalAndVote($articles);
                }
            }
        }
    }
    public function updateInfo($request)
    {
        User::where('login', Auth::user()->login)->update($request->validated());
    }

    public function updateAvatar($request)
    {
        $url = Storage::disk('avatar')->put("", $request->file('file'));
        $user = User::where('login', Auth::user()->login)->first();
        $user->update(['avatar' => $url]);
    }
}
