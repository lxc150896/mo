<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOxiBiNanDiLensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oxi_bi_nan_di_lens', function (Blueprint $table) {
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
        Schema::dropIfExists('oxi_bi_nan_di_lens');
    }
}
