<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Здесь мы удаляем колонку `description`.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Удаляем колонку `description`, если она есть.
            $table->dropColumn('description');
        });
    }

    /**
     * Reverse the migrations.
     * Откатывает удаление: добавляем колонку обратно.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Восстанавливаем колонку `description`, если миграцию откатывают.
            $table->text('description')->nullable()->after('content');
        });
    }
};
