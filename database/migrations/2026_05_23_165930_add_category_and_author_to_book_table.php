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
        if (!Schema::hasColumn('books', 'category_id')) {
            Schema::table('books', function (Blueprint $table) {
                $table->foreignId('category_id')->constrained()->onDelete('cascade');
            });
        }
        if (!Schema::hasColumn('books', 'author_id')) {
            Schema::table('books', function (Blueprint $table) {
                $table->foreignId('author_id')->constrained()->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['author_id']);
            $table->dropColumn(['category_id', 'author_id']);
        });
    }
};
