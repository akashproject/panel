<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("type",20)->nullable();
            $table->string("filename")->nullable();
            $table->string("alternative")->nullable();
            $table->string("caption")->nullable();
            $table->text("description")->nullable();
            $table->string("extension",50)->nullable();
            $table->string("size",50)->nullable();
            $table->string("dimension",50)->nullable();
            $table->text("path")->nullable();
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
        Schema::dropIfExists('media');
    }
};
