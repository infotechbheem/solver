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
        Schema::create('communities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('program_id')->nullable();
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->string('differently_abled')->nullable();
            $table->string('area')->nullable();
            $table->string('project')->nullable();
            $table->string('ngo_shg_cooperative_fpo_other')->nullable();
            $table->string('org_representative_name')->nullable();
            $table->string('org_type')->nullable();
            $table->string('working_period')->nullable();
            $table->string('no_of_members')->nullable();
            $table->string('org_focused_working_area')->nullable();
            $table->string('support')->nullable();
            $table->string('community_support')->nullable();
            $table->string('support_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('community');
    }
};
