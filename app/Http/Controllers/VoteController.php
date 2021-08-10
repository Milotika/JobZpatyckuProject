<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\Meme;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;
use App\Services\VoteService;

class VoteController extends Controller
{
    private $voteService;


    public function __construct(VoteService $voteService)
    {
        $this->voteService = $voteService;
    }
    public function vote(Request $request)
    {
        $this->voteService->vote($request);
        return redirect()->back();
    }
    public function commentVote(Request $request,$articleID,$commentID)
    {
        $this->voteService->voteComment($request,$articleID,$commentID);
        return redirect()->back();
    }
    public function unVote(Request $request)
    {
        $this->voteService->unVote($request);
        return redirect()->back();
    }
}
