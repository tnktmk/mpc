<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('place_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('place_id')->constrained()->onDelete('cascade'); // placesテーブルの外部キー
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // usersテーブルの外部キー
            $table->unsignedInteger('point')->default(0);  // ポイント（初期値0）
            $table->softDeletes();                         // お気に入り解除時など
            $table->timestamps();
            
            // ユニーク制約（同じ user/place の重複登録防止）
            $table->unique(['place_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('place_user');
    }
};
