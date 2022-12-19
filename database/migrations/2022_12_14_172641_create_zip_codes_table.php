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
            $table->string('locality')->nullable();
            $table->integer('fe_key')->nullable();
            $table->string('fe_name')->nullable();
            $table->string('fe_code')->nullable();
            $table->integer('settlement_key')->nullable();
            $table->string('settlement_name')->nullable();
            $table->string('settlement_zone_type')->nullable();
            $table->string('settlement_type_name')->nullable();
            $table->integer('municipality_key')->nullable();
            $table->string('municipality_name')->nullable();
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
