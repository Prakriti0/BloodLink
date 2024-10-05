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
        Schema::table('donors', function (Blueprint $table) {
            // $table->unsignedBigInteger('blood_group_id');
            $table->foreignId('blood_group_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('donar', function (Blueprint $table) {
            $table->dropForeign(['blood_group_id']);
            $table->dropColumn('blood_group_id');
        });
    }
};
