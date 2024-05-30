<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('featured_image')->nullable();
            $table->text('description')->nullable();
            $table->text('excerpt')->nullable();
            $table->char('max_price', 50)->nullable();
            $table->char('number_of_rating', 50)->nullable();
            $table->char('meta_description', 50)->nullable();
            $table->char('schema', 50)->nullable();
            $table->char('robots', 50)->nullable();
            $table->char('utm_campaign', 50)->nullable();
            $table->char('utm_source', 50)->nullable();
            $table->boolean('status',100)->default('1');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
