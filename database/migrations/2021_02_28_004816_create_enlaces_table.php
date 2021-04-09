<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enlaces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 30);
        });
        DB::table('enlaces')->insert(array('id'=>'1','nombre'=>'Inalambrico'));
        DB::table('enlaces')->insert(array('id'=>'2','nombre'=>'Fibra Optica'));
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enlaces');
    }
}
