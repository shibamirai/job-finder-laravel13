<?php

use App\Models\Handicap;
use App\Models\JobFinder;
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
        Schema::create('handicap_job_finder', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Handicap::class)->constrained();
            $table->foreignIdFor(JobFinder::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('handicap_job_finder');
    }
};
