

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodsubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_subs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('master_id')->default('0');
            $table->string('food_name', 255)->default('');
            $table->integer('order')->default('0');

            // 設定外來鍵
//            $table->foreign('master_id')
//                ->references('id')
//                ->on('food_mains');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_subs');
    }
}

