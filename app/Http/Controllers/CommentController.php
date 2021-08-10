<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Services\CommentService;
class CommentController extends Controller
{
    private $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }   
    
    public function store (CommentRequest $request,$articleID) {
        $this->commentService->create($request,$articleID);
        return redirect()->back();
    }
}
