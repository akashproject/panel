<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('refer_earns', function (Blueprint $table) {
            $table->id();
            $table->integer('refer_by');
            $table->integer('refer_to');
            $table->integer('order_id');
            $table->string('code',20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refer_earns');
    }
};
