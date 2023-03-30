
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
        Schema::create('g_a_p_s', function (Blueprint $table) {
            $table->id();

            $table->string('group');
            $table->string('activity')->nullable();
            $table->string('position')->nullable();
            $table->integer('type');

            $table->integer('account_id');

            $table->bigInteger('ingest_id')->unsigned();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('g_a_p_s');
    }
};
