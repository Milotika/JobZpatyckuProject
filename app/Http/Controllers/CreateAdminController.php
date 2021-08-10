<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Meme;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
class CreateAdminController extends Controller
{
    public function create()
    {
        $joinDate = date('Y-m-d');
        User::create([
            'login' => 'admin',
            'email' => 'admin@admin.pl',
            'join_date' => $joinDate,
            'password' => Hash::make('admin'),
        ]);
        Meme::create([
            'title' => 'test',
            'user_id' => 1,
            'category' => 'muzyka',
            'file_patch' => 'dsad',
        ]);
        Vote::create([
            'user_id' => 1,
            'meme_id' => 1,
        ]);
        return redirect(RouteServiceProvider::HOME);
    }
}
