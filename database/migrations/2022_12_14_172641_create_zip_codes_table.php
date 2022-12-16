<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Migration to create zip_codes Table
     * @return void
     */
    public function up()
    {
        Schema::create('zip_codes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('zip_code');
            $table->string('locality');
            $table->integer('fe_key');
            $table->string('fe_name');
            $table->string('fe_code');
            $table->integer('settlement_key');
            $table->string('settlement_name');
            $table->string('settlement_zone_type');
            $table->string('settlement_type_name');
            $table->integer('municipality_key');
            $table->string('municipality_name');
            $table->timestamps();
            $table->index('zip_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zip_codes');
    }
};
