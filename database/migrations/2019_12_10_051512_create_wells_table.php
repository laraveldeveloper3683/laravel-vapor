<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wells', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('run_id');
            $table->string('well_uuid');
            $table->string('well_name');
            $table->string('run_uuid');
            $table->string('position')->nullable();
            $table->string('extraction_instrument')->nullable();
            $table->string('extraction_instrument_uuid')->nullable();
            $table->string('extraction_machine_uuid')->nullable();
            $table->string('extraction_well_name')->nullable();
            $table->string('extraction_well_uuid')->nullable();
            $table->string('lims_status_enum')->nullable();
            $table->string('mix_uuid')->nullable();
            $table->string('patient_id')->nullable();
            $table->string('specimen_tag')->nullable();
            $table->string('specimen_type')->nullable();
            $table->longText('rules')->nullable();
            $table->boolean('re_extract')->nullable();
            $table->integer('quantity_multiplier')->nullable();
            $table->boolean('marked_for_reextraction')->nullable();
            $table->boolean('is_crossover')->nullable();
            $table->boolean('is_flagged')->nullable();
            $table->boolean('exclude')->nullable();
            $table->string('export_date')->nullable();
            $table->string('extraction_date')->nullable();
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
        Schema::dropIfExists('wells');
    }
}
