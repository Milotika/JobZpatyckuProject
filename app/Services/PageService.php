<?php

namespace App\Services;

use App\Models\Meme;
use Illuminate\Support\Arr;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;
use App\Http\Helpers\Helper;

class PageService
{

    public function indexShow()
    {
        $query = Meme::orderBy('vote_count', 'desc')->paginate('8', ['*'], 'str');
        return $this->articlesWithIntervalAndVote($query);
    }
    public function indexCategoryShow($categoryName)
    {
        $query = Meme::where('category', $categoryName)->orderBy('created_at', 'desc')->paginate('8', ['*'], 'str');
        return $this->articlesWithIntervalAndVote($query);
    }
    public function newShow()
    {
        $query = Meme::orderBy('created_at', 'desc')->paginate('8', ['*'], 'str');
        return $this->articlesWithIntervalAndVote($query);
    }
    public function randomShow()
    {
        $query = Meme::all()->random();
        return $query;
    }
    public function topShow()
    {
        $query = Meme::where('created_at', '>=', \Carbon\Carbon::now()->subDays(30)->toDateTimeString())->orderBy('vote_count', 'DESC')->paginate('8', ['*'], 'str');
        return $this->articlesWithIntervalAndVote($query);
    }
    public function articlesWithIntervalAndVote($query)
    {
        $articleWithInterval = $this->articlesWithInterval($query);
        $articleWithIntervalAndVote = $this->isVotedArticles($articleWithInterval);
        return $articleWithIntervalAndVote;
    }
    public function articlesWithInterval($articles)
    {
        foreach ($articles as $articleID => $articleValue) {
            $articles[$articleID]['interval'] = Helper::interval($articleValue);
        }
        return $articles;
    }
    public function isVotedArticles($articles)
    {
        $voted[] = null;

        if (Auth::user()) {
            $voted = Vote::select('meme_id')->where('user_id', Auth::user()->id)->get();
            $voted = Arr::flatten($voted->toArray());
        }
        foreach ($articles as $articleID => $articleValue) {
            if (in_array($articleValue->id, $voted)) {
                $articles[$articleID]['vote'] = true;
            } else {
                $articles[$articleID]['vote'] = false;
            }
        }
        return $articles;
    }
}
