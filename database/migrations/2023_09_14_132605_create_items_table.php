<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('price');
            $table->string('detail');
            $table->integer('inventory');
            $table->string('image');
            $table->enum('status', ['active', 'inactive']);
            $table->unsignedBigInteger('category_id');
            
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
