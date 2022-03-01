<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('art_id')->references('id')->on('arts');
            $table->tinyInteger('number_people');
            $table->string('note',160)->nullable();
            $table->float('price', 8, 2);
            $table->boolean('delivered')->default(FALSE);
            $table->tinyInteger('deadline');
            $table->string('reference_photo_directory'); // path
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
        Schema::dropIfExists('orders');
    }
}
