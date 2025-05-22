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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            // userid, id, license_plate, make, model, price, mileage, seats, doors, production_year, weight, color, image, sold at, views, update_at, createdat
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('license_plate')->unique();
            $table->string('make');
            $table->string('model');
            $table->decimal('price', 10, 2);
            $table->integer('mileage');
            $table->integer('seats');
            $table->integer('doors');
            $table->integer('production_year');
            $table->integer('weight');
            $table->string('color');
            $table->string('image')->nullable();
            $table->dateTime('sold_at')->nullable();
            $table->integer('views')->default(0);
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
