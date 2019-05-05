<?php

namespace App\Http\Controllers\Auth;

use App\UserSocialId;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(Request $request, $provider)
    {
        $user = Socialite::driver($provider)->user();

        $socialId = UserSocialId::where('provider', $provider)
            ->where('token', $user->getId())->first();

        if (Auth::guest() && $socialId) {
            Auth::login($socialId->user);
        } else if (!$socialId && !Auth::guest()) {
            UserSocialId::create([
                'user_id' => $request->user()->id,
                'provider' => $provider,
                'token' => $user->getId(),
            ]);
        } else if (!$socialId && Auth::guest()) {
            $request->session()->put("provider_token", $user->getId());
            $request->session()->put("provider_name", $provider);

            return redirect()->route('register')
                ->withInput([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                ]);
        } else return redirect()->back()->
            withErrors(['Oops, this social account has already been linked to another user!']);

        return redirect()->back();
    }
}
