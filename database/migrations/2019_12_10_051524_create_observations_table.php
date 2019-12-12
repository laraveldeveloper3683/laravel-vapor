<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('observation_uuid');
            $table->string('well_uuid');
            $table->string('target')->nullable();
            $table->longText('readings');
            $table->string('azure_classification')->nullable();
            $table->string('azure_ct')->nullable();
            $table->string('classification')->nullable();
            $table->string('ct')->nullable();
            $table->string('exposed_analysis_results')->nullable();
            $table->string('machine_classification')->nullable();
            $table->string('machine_ct')->nullable();
            $table->string('mix_channel_uuid')->nullable();
              $table->string('obs_uuid')->nullable();
            $table->string('rfu')->nullable();
            $table->string('rules')->nullable();
            $table->string('rules_classification')->nullable();
            $table->string('rules_ct')->nullable();
            $table->string('settings')->nullable();
            $table->string('template_channel_tags')->nullable();
            $table->integer('calculated_quantity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('observations');
    }
}
