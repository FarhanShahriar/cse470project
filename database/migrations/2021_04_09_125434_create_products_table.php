<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->String('name')->nullable();
            $table->String('SKU')->nullable();
            $table->text('description')->nullable();
            $table->String('image')->nullable();
            $table->integer('price')->nullable();
            $table->integer('quantity')->nullable();
            $table->String('slug')->nullable();
            $table->String('gender')->nullable();
            $table->String('height')->nullable();
            $table->String('width')->nullable();
            $table->float('weight')->nullable();
            $table->float('gold_weight')->nullable();
            $table->String('gold_purity')->nullable();
            $table->float('diamond_weight')->nullable();
            $table->String('diamond_purity')->nullable();
            $table->integer('caret')->nullable();
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
