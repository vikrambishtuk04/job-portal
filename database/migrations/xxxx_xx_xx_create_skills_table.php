<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('job_skill', function (Blueprint $table) {
            $table->foreignId('job_id')->constrained()->onDelete('cascade');
            $table->foreignId('skill_id')->constrained()->onDelete('cascade');
            $table->primary(['job_id', 'skill_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_skill');
        Schema::dropIfExists('skills');
    }
}; 