<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCcmBiNanDiXuongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ccm_bi_nan_di_xuongs', function (Blueprint $table) {
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
        Schema::dropIfExists('ccm_bi_nan_di_xuongs');
    }
}
