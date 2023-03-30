<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
                'added_regional_resources' => ($row['addedregionalresources'] === "Yes") ? true : false,
                'closure_reason'    => $row['reasonforeventclosure']
     */
    public function up(): void
    {
        Schema::create('calls', function (Blueprint $table) {
            $table->id();

            $table->text('noggin_id');
            $table->string('call_id');

            $table->timestamp('date');
            $table->string('caller_type');

            $table->string('address_key');
            $table->text('address');
            $table->text('unit')->nullable();
            $table->text('city');
            $table->text('county');
            $table->string('county_key');

            $table->string('chapter');
            $table->string('status');
            $table->string('nature');

            $table->boolean('is_suspended');
            $table->boolean('is_closed');

            $table->timestamp('suspended_at')->nullable();
            
            $table->string('dro')->nullable();
            $table->text('dispatcher');

            $table->string('structure_type')->nullable();
            $table->integer('units');
            $table->integer('adults');
            $table->integer('children');
            $table->integer('fatalities');
            $table->integer('injuries');

            $table->boolean('activate_dat');
            $table->boolean('automatic_dispatch');

            $table->timestamp('dro_event_at')->nullable();
            $table->timestamp('dro_call_at')->nullable();
            $table->timestamp('alert_at')->nullable();
            $table->timestamp('dispatch_at')->nullable();
            $table->timestamp('acknowledged_at')->nullable();
            $table->timestamp('assigned_at')->nullable();
            $table->timestamp('follow_up_at')->nullable();
            $table->timestamp('close_casework_at')->nullable();
            $table->timestamp('on_scene_at')->nullable();
            $table->timestamp('off_scene_at')->nullable();
            $table->timestamp('closed_at')->nullable();
            $table->timestamp('iir_at')->nullable();

            $table->string('iir')->nullable();
            $table->boolean('has_iir');

            $table->string('type')->nullable();
            $table->string('type_text')->nullable();

            $table->boolean('added_regional_resources');

            $table->string('closure_reason')->nullable();

            $table->bigInteger('ingest_id')->unsigned();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calls');
    }
};
