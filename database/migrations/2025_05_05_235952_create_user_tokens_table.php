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
        Schema::create('user_tokens', function (Blueprint $table) {
            $table->id(); // id
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // user_id (users テーブルと外部キー連携)
            $table->string('token')->unique(); // token（ユニークな文字列）
            $table->timestamp('expires_at')->nullable(); // 有効期限
            $table->timestamp('used_at')->nullable();    // 使用日時
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_tokens');
    }
};
