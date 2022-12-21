<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class LoginContoller extends Controller
{
    public function loginVk()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function loginGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function responseVK(UserRepository $userRepository)
    {
        $user = Socialite::driver('vkontakte')->user();
        $userInSystem = $userRepository->getUserBySocId($user, 'vk');
        Auth::login($userInSystem);
        return redirect()->route('home');
    }

    public function responseGithub(UserRepository $userRepository)
    {
        $user = Socialite::driver('github')->user();
        $userInSystem = $userRepository->getUserBySocId($user, 'github');
        Auth::login($userInSystem);
        return redirect()->route('home');
    }
}
