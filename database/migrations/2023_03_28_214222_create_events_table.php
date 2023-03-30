<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *   
     */

    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            
            $table->string('event');
            $table->string('type');
            $table->string('type_text');
            $table->text('address');
            $table->text('city');
            $table->text('county');
            $table->string('county_key');
            $table->timestamp("intake_complete_at")->nullable();
            $table->timestamp("happened_at")->nullable();

            $table->bigInteger('ingest_id')->unsigned();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
