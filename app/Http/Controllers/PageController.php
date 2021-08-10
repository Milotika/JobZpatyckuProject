<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Meme;
use Illuminate\Support\Arr;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;
use App\Http\Helpers\Helper;
use PHPUnit\TextUI\Help;
use App\Services\PageService;

class PageController extends Controller
{
    private $pageService;


    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    public function index() {
        return view('index',[
            'articles' => $this->pageService->indexShow(),
        ]);
    }
    public function categoryShow($categoryName) {
        return view('index',[
            'articles' => $this->pageService->indexCategoryShow($categoryName),
        ]);
    }
    public function new() {
        return view('index',[
            'articles' => $this->pageService->newShow(),
        ]);
    }
    public function random() {
        $article = $this->pageService->randomShow();
        return redirect ('obr/'.$article->id.'/'.$article->title);
    }
    public function top() {
        return view('index',[
            'articles' => $this->pageService->topShow(),
        ]);
    }

}
