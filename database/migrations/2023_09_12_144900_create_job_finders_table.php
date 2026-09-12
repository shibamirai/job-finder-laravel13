<?php

use App\Models\EmploymentPattern;
use App\Models\Gender;
use App\Models\Occupation;
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
        Schema::create('job_finders', function (Blueprint $table) {
            $table->id();
            $table->string('avatar');
            $table->string('name');
            $table->foreignIdFor(Gender::class)->constrained();
            $table->integer('age');
            $table->boolean('has_certificate')->default(false);
            $table->date('use_from');
            $table->foreignIdFor(Occupation::class)->constrained();
            $table->string('description')->nullable();
            $table->date('hired_at');
            $table->foreignIdFor(EmploymentPattern::class)->constrained();
            $table->boolean('is_handicaps_opened');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_finders');
    }
};
