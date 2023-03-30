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
        Schema::create('assigned_positions', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('reports_to');
            $table->integer('account_id');
            $table->string('supervisor')->nullable();
            $table->timestamp('started_at');

            $table->bigInteger('ingest_id')->unsigned();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assigned_positions');
    }
};
