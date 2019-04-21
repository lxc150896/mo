<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOxiTrinhSatDiXuongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oxi_trinh_sat_di_xuongs', function (Blueprint $table) {
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
        Schema::dropIfExists('oxi_trinh_sat_di_xuongs');
    }
}
