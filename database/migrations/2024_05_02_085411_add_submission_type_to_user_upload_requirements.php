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
        Schema::table('user_upload_requirements', function (Blueprint $table) {
            $table->string('submission_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
