<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nodes', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->string('name')->nullable();
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
            $table->bigInteger('parent_id')->nullable();
            $table->foreign('parent_id', 'fk_nodes_nodes')->references('id')->on('nodes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nodes');
    }
}
