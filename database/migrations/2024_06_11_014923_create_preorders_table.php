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
        Schema::create('preorders', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('pattern');
            $table->string('fillw');
            $table->string('size');
            $table->string('finner');
            $table->string('fouter');
            $table->string('note')->nullable();
            $table->string('datetime');
            $table->boolean('status')->default('1');
            $table->string('customer');
            $table->string('tracknum')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preorders');
    }
};
