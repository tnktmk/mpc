<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\UserTokenService;


class QrShowController extends Controller
{
    public function show(UserTokenService $UserTokenService) {
        $user_id = Auth::id();
        $token = $UserTokenService->generate($user_id);
        $data = $token;

        return view('qr_show',compact('data'));
    }
}
