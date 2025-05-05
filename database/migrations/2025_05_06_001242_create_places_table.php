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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address'); // ← adress → address に修正済み
            $table->string('tel');
            $table->unsignedTinyInteger('class')->default(0);
            $table->date('terminate')->nullable(); // 契約終了日
            $table->softDeletes();
            $table->unsignedBigInteger('group_id')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
