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
        Schema::create('disaster_cases', function (Blueprint $table) {
            $table->id();

            $table->string('case_number');

            $table->string('address_key');
            $table->text('address');
            $table->text('city');
            $table->text('county');
            $table->string('county_key');
            $table->string('household');

            $table->string('status');
            $table->string('responder1')->nullable();
            $table->string('responder2')->nullable();

            $table->integer('amount_disbursed');
            $table->timestamp('date');
            $table->string('event');

            $table->boolean('is_virtual')->default(false);

            $table->bigInteger('ingest_id')->unsigned();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disaster_cases');
    }
};
