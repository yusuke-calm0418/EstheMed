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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id'); // 患者ID (外部キー)
            $table->text('subjective')->nullable(); // 主観的所見
            $table->text('objective')->nullable(); // 客観的所見
            $table->text('assessment')->nullable(); // 評価
            $table->text('plan')->nullable(); // 計画
            $table->string('image_path')->nullable(); // 画像パス
            $table->timestamps();

            // 外部キー制約、
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
