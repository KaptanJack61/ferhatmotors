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
            $table->integer('vehicle_type_id');
            $table->integer('vehicle_brand_id');
            $table->integer('vehicle_model_id');
            $table->string('package')->nullable();
            $table->string('motor')->nullable();
            $table->integer('km');
            $table->integer('year');
            $table->integer('gear_id')->nullable();
            $table->integer('fuel_id')->nullable();
            $table->integer('color_id')->nullable();
            $table->integer('case_type_id')->nullable();
            $table->integer('sale_type_id');
            $table->integer('owner_id');
            $table->string('sahibinden_url')->nullable();
            $table->string('arabam_url')->nullable();
            $table->decimal('damage', 9,2)->nullable();
            $table->decimal('buy_price', 9,2);
            $table->decimal('sell_price', 9,2);
            $table->decimal('sold_price', 9,2)->nullable();
            $table->timestamp('buy_date')->nullable();
            $table->timestamp('sold_date')->nullable();
            $table->integer('status_id');
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
