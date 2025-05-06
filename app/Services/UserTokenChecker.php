<?php
namespace App\Services;

use App\Models\UserToken;
use Illuminate\Support\Carbon;

class UserTokenChecker
{
    /**
     * user_id に有効なトークンがあればその文字列を返す
     * なければ空文字を返す
     *
     * @param int $userId
     * @return string
     */
    public function getValidTokenOrEmpty(int $userId): string
    {
        $token = UserToken::where('user_id', $userId)
            ->whereNull('used_at')
            ->where(function ($query) {
                $query->whereNull('expires_at')
                      ->orWhere('expires_at', '>', now());
            })
            ->value('token'); // token カラムのみ取得

        return $token ?? '';
    }
}
