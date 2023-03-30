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
        Schema::create('members', function (Blueprint $table) {
            $table->id();

            $table->text('first_name');
            $table->text('last_name');
            $table->string('account_name');

            $table->string('chapter');
            $table->string('status');
            $table->boolean('is_responder');
            
            $table->text('email')->nullable();
            $table->string('email_key')->nullable();
            $table->text('second_email')->nullable();
            $table->string('second_email_key')->nullable();

            $table->text('address');
            $table->text('city');
            $table->text('county');
            $table->string('county_key');
            $table->string('availability');
            $table->boolean('available_now')->default(false);

            $table->integer('member_number');
            $table->integer('account_id');

            $table->string('dr')->nullable();

            $table->bigInteger('ingest_id')->unsigned();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
