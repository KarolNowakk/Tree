<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNodesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('nodes', function (Blueprint $table) {
            $table->id();
            $table->integer('value');
            $table->string('description');
            $table->integer('order')->default(1);
            $table->unsignedBigInteger('parent_node')->nullable();
            $table->timestamps();

            $table->foreign('parent_node')
                ->references('id')
                ->on('nodes')
                ->onDelete('cascade')
                ->nullable()
            ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('nodes');
    }
}
