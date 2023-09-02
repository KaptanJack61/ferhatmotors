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
        Schema::create('adverts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_type_id')->references('id')->on('vehicle_types')->onDelete('cascade');
            $table->foreignId('vehicle_brand_id')->references('id')->on('vehicle_brands')->onDelete('cascade');
            $table->foreignId('vehicle_model_id')->references('id')->on('vehicle_models')->onDelete('cascade');
            $table->string('package')->nullable();
            $table->string('motor')->nullable();
            $table->integer('km');
            $table->integer('year');
            $table->foreignId('gear_id')->references('id')->on('gears')->onDelete('cascade');
            $table->foreignId('fuel_id')->references('id')->on('fuels')->onDelete('cascade');
            $table->foreignId('color_id')->references('id')->on('colors')->onDelete('cascade');
            $table->foreignId('case_type_id')->references('id')->on('case_types')->onDelete('cascade');
            $table->foreignId('sale_type_id')->references('id')->on('sale_types')->onDelete('cascade');
            $table->foreignId('owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('sahibinden_url')->nullable();
            $table->string('arabam_url')->nullable();
            $table->decimal('damage', 9,2)->nullable();
            $table->decimal('buy_price', 9,2);
            $table->decimal('sell_price', 9,2);
            $table->decimal('sold_price', 9,2)->nullable();
            $table->timestamp('buy_date')->nullable();
            $table->timestamp('sold_date')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('status_id')->references('id')->on('statuses')->onDelete('cascade');

            $table->decimal('profit')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adverts');
    }
};
