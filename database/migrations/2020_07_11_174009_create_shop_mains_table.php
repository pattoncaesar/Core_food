

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopmainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_mains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shop_name', 255)->default('');
            $table->integer('main_area');
            $table->integer('sub_area')->default('0');
            $table->integer('main_food');
            $table->text('main_title');
            $table->text('shop_text');
            $table->string('lat_long', 255)->default('');
            $table->string('tel', 255)->default('');
            $table->string('address', 255)->default('');
            $table->text('station');
            $table->text('holiday');
            $table->text('open_time');
            $table->text('shop_info');
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
        Schema::dropIfExists('shop_mains');
    }
}

