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
        Schema::table('posts', function (Blueprint $table) {
            // Add author_name column if it doesn't exist
            if (!Schema::hasColumn('posts', 'author_name')) {
                $table->string('author_name')->nullable()->after('content');
            }
            
            // Add is_anonymous column if it doesn't exist
            if (!Schema::hasColumn('posts', 'is_anonymous')) {
                $table->boolean('is_anonymous')->default(false)->after('author_name');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['author_name', 'is_anonymous']);
        });
    }
};