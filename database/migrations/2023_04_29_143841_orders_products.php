<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->float('price');
            $table->float('total');
            $table->integer('quantity');
            $table->unsignedBigInteger('id_orders');
            $table->foreign('id_orders')->references('id')->on('orders')->onDelete('cascade');
            $table->unsignedBigInteger('id_products');
            $table->foreign('id_products')->references('id')->on('products')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_products');
    }
};
