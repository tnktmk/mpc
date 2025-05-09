<?php
namespace App\Http\Controllers;

use App\Models\UserToken;
use App\Models\PlaceUser;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class QrScanController extends Controller
{
    public function handle(Request $request)
    {
        $placeId = $request->input('place_id'); // 店舗ログイン中またはURLパラメータなどで取得
        $token = $request->input('token');

        // トークンの検証と user_id 抽出
        $userToken = UserToken::where('token', $token)
            ->whereNull('used_at')
            ->where(function ($query) {
                $query->whereNull('expires_at')->orWhere('expires_at', '>', now());
            })
            ->first();

        if (!$userToken) {
            return response()->json(['error' => '無効なトークン'], 403);
        }

        $userId = $userToken->user_id;

        // place_user テーブルに既存の組み合わせがあるか確認
        $placeUser = PlaceUser::withTrashed() // softDelete を含めて確認
            ->where('place_id', $placeId)
            ->where('user_id', $userId)
            ->first();

        if (!$placeUser) {
            // レコードがない場合 → 新規作成（ポイント0）
            PlaceUser::create([
                'place_id' => $placeId,
                'user_id'  => $userId,
                'point'    => 0,
            ]);
        }

        // トークンは使用済みに更新
        $userToken->used_at = now();
        $userToken->save();

        return response()->json(['status' => '登録完了']);
    }
}
