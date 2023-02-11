<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            {
                Schema::dropIfExists('products');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            Schema::create('products', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('company_id');
                $table->string('product_name');
                $table->string('price');
                $table->string('stock');
                $table->text('comment');
                $table->string('img_path');
                $table->timestamps();
            });
        });
    }
}
