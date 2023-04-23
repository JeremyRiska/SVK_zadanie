<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContinentsTable extends Migration
{
    public function up()
    {
        Schema::create('continents', function (Blueprint $table) {
            $table->char('code', 2)->primary()->comment('Continent code');
            $table->string('name', 255)->nullable();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    public function down()
    {
        Schema::dropIfExists('continents');
    }
}
