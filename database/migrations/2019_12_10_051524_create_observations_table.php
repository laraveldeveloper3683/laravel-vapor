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
            $table->longText('observation_uuid');
            $table->longText('well_uuid');
            $table->longText('target')->nullable();
            $table->longText('readings');
            $table->longText('azure_classification')->nullable();
            $table->longText('azure_ct')->nullable();
            $table->longText('classification')->nullable();
            $table->longText('ct')->nullable();
            $table->longText('exposed_analysis_results')->nullable();
            $table->longText('machine_classification')->nullable();
            $table->longText('machine_ct')->nullable();
            $table->longText('mix_channel_uuid')->nullable();
            $table->longText('obs_uuid')->nullable();
            $table->longText('rfu')->nullable();
            $table->longText('rules')->nullable();
            $table->longText('rules_classification')->nullable();
            $table->longText('rules_ct')->nullable();
            $table->longText('settings')->nullable();
            $table->longText('template_channel_tags')->nullable();
            $table->bigInteger('calculated_quantity')->nullable();
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
