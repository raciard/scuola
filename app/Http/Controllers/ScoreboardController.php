<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ScoreboardController extends Controller
{
    public function view(Request $request)
    {
        $podium = User::query()
            ->orderBy('score', 'DESC')
            ->limit(10)->get();

        return view('scoreboard')
            ->with('podium', $podium)
            ->with('user', $request->user());
    }
}
