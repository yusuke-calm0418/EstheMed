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
        Schema::table('customers', function (Blueprint $table) {
            // 既存のカラムはそのままに、新しいカラムを追加
            $table->text('allergy_info')->nullable(); // アレルギー情報
            $table->text('medical_history')->nullable(); // 医療歴
            $table->text('medication_info')->nullable(); // 薬剤情報
            $table->text('skin_concerns_goals')->nullable(); // 肌の悩みと目標
            $table->text('lifestyle')->nullable(); // ライフスタイル
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            //
        });
    }
};
