<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Эта функция выполняется, когда миграция применяется. Мы добавляем колонку `description`.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Добавляем новую колонку `description`, тип данных `text`.
            $table->text('description')->nullable()->after('content');
            // ->nullable() делает колонку необязательной для заполнения.
            // ->after('content') указывает, что колонка будет добавлена после колонки `content`.
        });
    }

    /**
     * Reverse the migrations.
     * Эта функция откатывает изменения, если миграция будет отменена.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Удаляем колонку `description`, если она существует.
            $table->dropColumn('description');
        });
    }
};
