<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Meme;
use App\Models\Comment;
use App\Models\CommentVote;

class VoteService
{

    public function vote(Request $request)
    {
        $meme = Meme::where('user_id', Auth::user()->id)->where('id', $request->meme_id)->first();
        if (!$meme) {
            $isExist = Vote::where('user_id', Auth::user()->id)->where('meme_id', $request->meme_id)->first();
            if (!$isExist) {
                Vote::create([
                    'user_id' => Auth::user()->id,
                    'meme_id' => $request->meme_id,
                ]);
                Meme::where('id', $request->meme_id)->update([
                    'vote_count' => DB::raw('vote_count+1')
                ]);
            } else {
                $this->unVote($request);
            }
        }
    }
    public function voteComment(Request $request, $articleID, $commentID)
    {
        $isVoted = CommentVote::where('user_id', Auth::user()->id)->where('comment_id', $commentID)->first();
        if (!$isVoted) {
            CommentVote::create([
                'user_id' => Auth::user()->id,
                'comment_id' => $commentID,
                'meme_id' => $articleID,
                'is' => $request->vote,
            ]);
            if ($request->vote == 'vote_up') {
                Comment::where('id', $commentID)->update([
                    'vote_count' => DB::raw('vote_count+1')
                ]);
            } else if ($request->vote == 'vote_down') {
                Comment::where('id', $commentID)->update([
                    'vote_count' => DB::raw('vote_count-1')
                ]);
            }
        } else if ($isVoted) {
            if ($isVoted->is == $request->vote && $isVoted->is == 'vote_up') {
                CommentVote::where('user_id', Auth::user()->id)->where('comment_id', $commentID)->delete();

                Comment::where('id', $commentID)->update([
                    'vote_count' => DB::raw('vote_count-1')
                ]);
            } else if ($isVoted->is == $request->vote && $isVoted->is == 'vote_down') {
                CommentVote::where('user_id', Auth::user()->id)->where('comment_id', $commentID)->delete();

                Comment::where('id', $commentID)->update([
                    'vote_count' => DB::raw('vote_count+1')
                ]);
            } else if ($isVoted->is == 'vote_down' && $request->vote == 'vote_up') {
                CommentVote::where('user_id', Auth::user()->id)->where('comment_id', $commentID)->update(['is' => $request->vote]);
                Comment::where('id', $commentID)->update([
                    'vote_count' => DB::raw('vote_count+2')
                ]);
            } else if ($isVoted->is == 'vote_up' && $request->vote == 'vote_down') {
                CommentVote::where('user_id', Auth::user()->id)->where('comment_id', $commentID)->update(['is' => $request->vote]);
                Comment::where('id', $commentID)->update([
                    'vote_count' => DB::raw('vote_count-2')
                ]);
            }
        }
    }
    public function unVote(Request $request)
    {
        Vote::where('meme_id', $request->meme_id)->delete();
        Meme::where('id', $request->meme_id)->update([
            'vote_count' => DB::raw('vote_count-1')
        ]);
    }
}
