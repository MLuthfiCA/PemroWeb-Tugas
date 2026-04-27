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
        Schema::table('buku', function (Blueprint $table) {
            if (!Schema::hasColumn('buku', 'genre')) {
                $table->string('genre')->nullable()->after('penulis');
            }
            if (!Schema::hasColumn('buku', 'status')) {
                $table->string('status')->default('Tersedia')->after('genre');
            }
            if (!Schema::hasColumn('buku', 'cover')) {
                $table->string('cover')->nullable()->after('status');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('buku', function (Blueprint $table) {
            $table->dropColumn(['genre', 'status', 'cover']);
        });
    }
};
