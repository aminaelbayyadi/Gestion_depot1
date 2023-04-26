<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSortiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sorties', function (Blueprint $table) {
            $table->increments('idsortie');
            $table->integer('num_sortie');
            $table->date('datesortie');
            $table->integer('nbr_article_sortie');
            $table->unsignedBigInteger('beneficiaire_id');
            $table->foreign('beneficiaire_id')->references('idbeneficiaire')->on('beneficiaires')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('sorties');
    }
}
