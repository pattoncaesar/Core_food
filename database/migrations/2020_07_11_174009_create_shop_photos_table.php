

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopphotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_photos', function (Blueprint $table) {
            $table->integer('shop_table_id');
            $table->integer('photo_num')->default('0');
            $table->integer('order')->default('0');

            // 設定外來鍵
//            $table->foreign('shop_table_id')
//                ->references('id')
//                ->on('area_mains');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_photos');
    }
}

