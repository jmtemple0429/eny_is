<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *   "data_source" => "Additional Training"
  "course_name" => "IS-00800.d National Response Framework"
  "primary_subject" => "Additional Training"
  "detailed_subject" => "FEMA"
  "account_id" => 2013118
     */
    public function up(): void
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();

            $table->string('data_source')->nullable();

            $table->string('primary_subject')->nullable();
            $table->string('detailed_subject')->nullable();
            $table->string('course_name')->nullable();

            $table->integer('account_id');

            $table->timestamp('date');

            $table->bigInteger('ingest_id')->unsigned();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
