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
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('slug')->unique();
            $table->string('vin')->nullable();
            $table->string('updated')->nullable();
            $table->string('published')->nullable();
            $table->string('expires')->nullable();
            $table->string('edited')->nullable();
            $table->string('adId')->index();
            $table->text('links')->nullable();
            $table->text('categories')->nullable();
            $table->text('location')->nullable();
            $table->text('mediaContent')->nullable();
            $table->text('images')->nullable();
            $table->string('video')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('adata')->nullable();
            $table->string('type')->index();
            $table->integer('active')->default(1);
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
