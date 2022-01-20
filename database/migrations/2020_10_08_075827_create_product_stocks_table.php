<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->date('buy_date');
            $table->date('expire_date');
            $table->float('price');
            $table->float('unit_price');
            $table->float('comission_amount');
            $table->date('stock_in_date');
            $table->string('sku');
            $table->integer('quantity');
            $table->unsignedBigInteger('warehouse_id');
            $table->string('from_sender_warehouse');
            $table->integer('total_amount');
            $table->float('actual_buy_price');
            $table->float('buy_price');
            $table->float('sell_price');
            $table->float('irregular_price');
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
        Schema::dropIfExists('product_stocks');
    }
}
