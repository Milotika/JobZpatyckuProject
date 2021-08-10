<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Meme;
use App\Http\Helpers\Helper;
use App\Models\Vote;
use App\Models\Comment;
use App\Models\CommentVote;
use Illuminate\Support\Arr;
use App\Services\PageService;

class MemeService
{
    private $pageService;


    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    public function createPatch()
    {
        $year = now()->year;
        $month = now()->month;
        $path = 'content/' . $year . '/' . $month;
        return $path;
    }
    public function showOnce($memeID)
    {
        return $this->articleWithIntervalAndVote($article = Meme::where('id', $memeID)->first());
    }
    public function uploadFile($request)
    {
        $url = Storage::disk('public_uploads')->put($this->createPatch(), $request->file('file'));
        $user = User::where('login', Auth::user()->login)->first();
        $user->memes()->create($request->validated() + ['file_patch' => $url]);
    }
    public function articleWithInterval($article)
    {
        $article['interval'] = Helper::interval($article);
        return $article;
    }
    public function articleWithIntervalAndVote($article)
    {
        $articleWithInterval = $this->articleWithInterval($article);
        $articleWithIntervalAndVote = $this->isVotedArticle($articleWithInterval);
        return $articleWithIntervalAndVote;
    }
    public function isVotedArticle($article)
    {
        if (Auth::user()) {
            $vote = Vote::where('user_id', Auth::user()->id)->where('meme_id', $article->id)->first();
            if ($vote) {
                $article['vote'] = true;
                return $article;
            } else {
                $article['vote'] = false;
                return $article;
            }
        }
        $article['vote'] = false;
        return $article;
    }
    public function showComments($article)
    {
        $checkAnyExist = Comment::where('meme_id', $article->id)->first();
        if ($checkAnyExist) {
            $query = Comment::where('meme_id', $article->id)->orderBy('vote_count', 'DESC')->paginate('8', ['*'], 'str');
            return $this->commentsWithIntervalAndVote($query);
        }
    }
    public function commentsWithIntervalAndVote($comments)
    {
        $commentsWithInterval = $this->pageService->articlesWithInterval($comments);
        if (Auth::user()) {
            return $this->isVotedComments($commentsWithInterval);
        } else {
            return $commentsWithInterval;
        }
    }
    public function isVotedComments($comments)
    {   
        $voted = CommentVote::where('user_id', Auth::user()->id)->where('meme_id', $comments[0]->meme_id)->get();
        foreach ($comments as $commentID => $commentValue) {
            foreach ($voted as $vote) {
                if ($vote->comment_id == $commentValue->id) {
                    $comments[$commentID]['vote'] = $vote->is;
                }
            }
        }
        return $comments;
    }
}
