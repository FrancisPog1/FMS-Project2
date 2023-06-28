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
        Schema::create('user_assigned_to_reqiuirement_bin', function (Blueprint $table) {

            $table->uuid('id')->primary();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignUuid('updated_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('assigned_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('reviewed_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('requirement_bin_id')->nullable()->constrained('requirement_bins')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('assigned_to')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('is_unassigned')->default(false);

            // Fillables
            $table->string('compliance_status')->default('Pending');
            $table->string('review_status')->default('Pending');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_assigned_to_reqiuirement_bin', function (Blueprint $table) {
            //
        });
    }
};
