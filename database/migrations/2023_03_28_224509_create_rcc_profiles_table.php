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
        Schema::create('rcc_profiles', function (Blueprint $table) {
            $table->id();

            $table->string('account_name');
            $table->string('job');
            $table->boolean('is_active');

            $table->bigInteger('ingest_id')->unsigned();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rcc_profiles');
    }
};
