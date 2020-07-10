<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('summary')->nullable();
            $table->string('image')->nullable();
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->unsignedBigInteger('added_by')->nullable();
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('SET NUll')->onUpdate('CASCADE');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('CASCADE');
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
        Schema::dropIfExists('categories');
    }
}
