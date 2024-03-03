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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name');
            $table->string('slug');
            $table->string('feature_image');
            $table->string('first_image')->nullable();
            $table->string('second_image')->nullable();
            $table->integer('category_id');
            $table->integer('brand_id')->nullable();
            $table->integer('size_id');
            $table->text('description')->nullable();
            $table->integer('stock')->default(0);
            $table->double('price');
            $table->integer('is_discounted')->default(0);
            $table->float('discount')->default(0);
            $table->double('discounted_price');
            $table->string('product_condition')->nullable();
            $table->string('listing_location')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('published')->default(0);
            $table->string('link')->nullable();
            $table->string('type')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
