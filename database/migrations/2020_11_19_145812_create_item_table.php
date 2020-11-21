<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'items',
            function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->integer('quantity');
                $table->float('price');
                $table->unsignedBigInteger('category_id')->index();
                $table->text('description')->nullable();
                $table->timestamps();
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            'items',
            function (Blueprint $table) {
                $table->dropForeign('items_category_id_foreign');
            }
        );
        Schema::dropIfExists('items');
    }
}
