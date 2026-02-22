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
        Schema::table('tweets', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id'); // user_idカラムを追加
            // usersテーブルのidカラムにuser_idカラムを関連づける
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tweets', function (Blueprint $table) {
            $table->dropForeign(['tweets_user_id_foreign']); // 外部キー制約を削除
            $table->dropColumn('user_id');
        });
    }
};
