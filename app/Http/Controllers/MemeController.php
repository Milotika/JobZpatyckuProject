<?php

namespace App\Http\Controllers;

header("Content-type: image/png");

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Meme;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\MemeRequest;
use App\Services\MemeService;

class MemeController extends Controller
{
    private $memeService;


    public function __construct(MemeService $memeService)
    {
        $this->memeService = $memeService;
    }

    public function store(MemeRequest $request)
    {
        $this->memeService->uploadFile($request);
        return redirect(RouteServiceProvider::HOME);
    }
    public function show($memeID)
    {
        $article = $this->memeService->showOnce($memeID);
        $comments = $this->memeService->showComments($article);
        return view('single', [
            'article' => $article,
            'comments' => $comments,
        ]);
    }
}
