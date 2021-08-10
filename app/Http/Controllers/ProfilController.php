<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Meme;
use App\Providers\RouteServiceProvider;
use App\Services\ProfilService;
use App\Http\Requests\UserRequest;
class ProfilController extends Controller
{
    private $profilService;

    public function __construct(ProfilService $profilService)
    {
        $this->profilService = $profilService;
    }

    public function show($userName)
    {
        $user = User::where('login', $userName)->first();
        return view('user.index',[
            'articles' => $this->profilService->userShow($user),
            'user' => $user,
        ]);
    }
    public function category($userName,$categoryName) {
        $user = User::where('login', $userName)->first();
        return view('user.index',[
            'articles' => $this->profilService->categoryShow($user,$categoryName),
            'user' => $user,
        ]);
    }
    public function comments($userName) {
        $user = User::where('login', $userName)->first();
        return view('user.comment',[
            'comments' => $this->profilService->commentsShow($user),
            'user' => $user,
        ]);
    }
    public function setting() {
        $user = User::where('login',Auth::user()->login)->first();
        return view('user.setting')->with('user',$user);
    }
    public function userInfoUpdate(UserRequest $request) {
        $this->profilService->updateInfo($request);
        return redirect()->back();
    }
    public function avatarUpdate(Request $request) {
        $this->profilService->updateAvatar($request);
        return redirect()->back();
    }
}
