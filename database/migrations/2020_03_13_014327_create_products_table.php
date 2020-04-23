<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {       
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('code');
            $table->string('title',80);
            $table->mediumText('description');
            $table->integer('stock');
            $table->float('purchase_price',10,2);
            $table->float('sale_price',10,2);
            $table->mediumText('languages');
            $table->mediumText('image');
            $table->mediumText('categories');
            $table->mediumText('trademarks');
            $table->date('release_date');
            $table->boolean('isDlc');
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
}
