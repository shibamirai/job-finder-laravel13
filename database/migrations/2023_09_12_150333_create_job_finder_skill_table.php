<?php

use App\Models\JobFinder;
use App\Models\Skill;
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
        Schema::create('job_finder_skill', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(JobFinder::class)->constrained();
            $table->foreignIdFor(Skill::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_finder_skill');
    }
};
