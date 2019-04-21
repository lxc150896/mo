<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCcmTrinhSatDiLensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ccm_trinh_sat_di_lens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('goc');
            $table->decimal('cao', 8, 2);
            $table->decimal('vantoc', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ccm_trinh_sat_di_lens');
    }
}
