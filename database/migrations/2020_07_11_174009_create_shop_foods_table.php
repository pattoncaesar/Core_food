

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopfoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_foods', function (Blueprint $table) {
            $table->integer('shop_table_id');
            $table->integer('food_id')->default('0');
            $table->integer('order')->default('0');

            // 設定外來鍵
//            $table->foreign('shop_table_id')
//                ->references('id')
//                ->on('shop_mains');
//
//            $table->foreign('food_id')
//                ->references('id')
//                ->on('food_subs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_foods');
    }
}

