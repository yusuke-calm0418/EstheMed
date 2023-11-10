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
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // IDは自動でインクリメントされる整数型です。
            $table->string('name'); // 氏名
            $table->string('gender_image')->nullable(); // 性別イメージ画像のパスを保存
            $table->enum('gender', ['male', 'female']); // 性別
            $table->date('birthdate'); // 生年月日
            $table->date('last_treatment_date')->nullable(); // 前回施術日は入力されない場合もあるのでnullable
            $table->text('memo')->nullable(); // その他メモ
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
