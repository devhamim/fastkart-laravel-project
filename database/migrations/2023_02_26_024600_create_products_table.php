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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_type');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('brand_id');
            $table->string('unit');
            $table->string('exchange')->nullable();
            $table->string('refund')->nullable();
            $table->longText('long_desp');
            $table->string('product_img')->nullable();
            $table->string('sku');
            $table->string('quantity')->nullable();
            $table->integer('buy_price');
            $table->integer('discount')->nullable();
            $table->integer('total_price');
            $table->string('slug');
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
        Schema::dropIfExists('products');
    }
};
