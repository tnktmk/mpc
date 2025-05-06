<?php
namespace App\Services;

use App\Models\UserToken;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Services\UserTokenChecker;



class UserTokenService
{
    // /**
    //  * トークンを生成して user_tokens に保存
    //  *
    //  * @param int $userId
    //  * @return UserToken
    //  */
    protected UserTokenChecker $checker;

    public function __construct(UserTokenChecker $checker) {
        $this->checker = $checker;
    }
    public function generate(int $userId)
    {
        $validToken = $this->checker->getValidTokenOrEmpty($userId);

        //有効なトークンがあれば、それを返す
        if($validToken !== '') {
            return $validToken;
        }
       
        //有効なトークンがなければ新規作成
        $token  = UserToken::create([
            'user_id'    => $userId,
            'token'      => Str::uuid()->toString(),
            'expires_at' => Carbon::now()->addHour(),
        ]);
    
        //トークンだけ返す
        return $token->token;
    }
}
