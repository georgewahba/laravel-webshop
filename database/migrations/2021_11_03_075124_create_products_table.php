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
            $table->bigInteger('cate_id');
            $table->string('name');
            $table->mediumText('small_description')->default('null');
            $table->longText('description')->default('null');
            $table->string('original_price')->default('null');
            $table->string('selling_price');
            $table->string('image')->default('null');
            $table->string('qty')->default('0');
            $table->string('tax')->default('null');
            $table->tinyInteger('status')->default('null');
            $table->tinyInteger('trending')->default('null');
            $table->mediumText('meta_title')->default('null');
            $table->mediumText('meta_descrip')->default('null');
            $table->mediumText('meta_keywords')->default('null');
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
