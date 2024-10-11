<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Здесь мы изменяем тип данных колонки `description`.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Изменяем колонку `description`, например, делаем её `string` вместо `text`.
            $table->string('description', 500)->nullable()->change();
            // Здесь мы устанавливаем максимальную длину строки в 500 символов.
        });
    }

    /**
     * Reverse the migrations.
     * Возвращаем колонку к первоначальному типу данных.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Возвращаем тип данных к `text`.
            $table->text('description')->nullable()->change();
        });
    }
};
