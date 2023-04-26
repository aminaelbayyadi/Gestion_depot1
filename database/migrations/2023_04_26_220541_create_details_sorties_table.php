<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsSortiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_sorties', function (Blueprint $table) {
            $table->increments('iddetails');
            $table->integer('details_quantiter');
            $table->unsignedBigInteger('stock_id');
            $table->foreign('stock_id')->references('idstock')->on('stock')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('sortie_id');
            $table->foreign('sortie_id')->references('idsortie')->on('sorties')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('details_sorties');
    }
}
