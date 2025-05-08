<?php
namespace App\Services;

use App\Models\UserToken;

class UserTokenValidator
{
    public function isValid(string $token): bool
    {
        $userToken = UserToken::where('token', $token)->first();

        return $userToken &&
               is_null($userToken->used_at) &&
               (is_null($userToken->expires_at) || $userToken->expires_at->isFuture());
    }
}
