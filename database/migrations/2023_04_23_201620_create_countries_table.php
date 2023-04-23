<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{

    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('country_id');
            $table->char('code', 2)->unique()->comment('Two-letter country code (ISO 3166-1 alpha-2)');
            $table->string('name', 64)->comment('English country name');
            $table->string('full_name', 128)->comment('Full English country name');
            $table->char('iso3', 3)->comment('Three-letter country code (ISO 3166-1 alpha-3)');
            $table->unsignedSmallInteger('number')->zerofill()->comment('Three-digit country number (ISO 3166-1 numeric)');
            $table->char('continent_code', 2);
            $table->integer('display_order')->default(900);
            $table->foreign('continent_code')->references('code')->on('continents')->onUpdate('cascade');
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
