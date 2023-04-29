<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiaires', function (Blueprint $table) {
            $table->increments('idbeneficiaire');
            $table->string('code_beneficiaire');
            $table->string('nombeneficiaire');
            $table->unsignedBigInteger('idetablissement');
            $table->foreign('idetablissement')->references('idetablissement')->on('etablissements')->onUpdate('cascade')->onDelete('cascade');
            $table->string('situation');

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
        Schema::dropIfExists('beneficiaires');
    }
}
