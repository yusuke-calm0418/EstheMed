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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // 氏名
            $table->string('gender_image')->nullable(); // 性別イメージ画像のパスを保存
            $table->enum('gender', ['male', 'female']); // 性別
            $table->date('birthdate')->nullable()->change(); // 生年月日
            $table->date('last_treatment_date')->nullable(); // 前回施術日は入力されない場合もあるのでnullable
            $table->text('memo')->nullable(); // その他メモ
            $table->text('allergy_info')->nullable(); // アレルギー情報
            $table->text('medical_history')->nullable(); // 医療歴
            $table->text('medication_info')->nullable(); // 薬剤情報
            $table->text('skin_concerns_goals')->nullable(); // 肌の悩みと目標
            $table->text('lifestyle')->nullable(); // ライフスタイル
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
