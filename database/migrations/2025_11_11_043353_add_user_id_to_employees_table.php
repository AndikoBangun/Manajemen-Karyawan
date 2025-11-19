<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            // Pastikan foreign key belum ada sebelumnya
            if (!Schema::hasColumn('employees', 'user_id')) {
                // kalau belum ada, baru buat
                $table->foreignId('user_id')
                    ->unique()
                    ->nullable()
                    ->constrained('users')
                    ->onDelete('cascade');
            } else {
                // kalau sudah ada, cukup tambahkan constraint
                $table->unique('user_id');
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            }
        });
    }

    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropUnique(['user_id']);
        });
    }
};
