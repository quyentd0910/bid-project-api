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
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->integer('category_id');
            $table->integer('seller_id');
            $table->decimal('starting_price', 18, 2);
            $table->decimal('reserve_price', 18, 2);
            $table->decimal('bid_step', 18, 2);
            $table->dateTime('end_time')->nullable();
            $table->dateTime('start_time')->nullable();
            $table->boolean('is_active')->default(true);
            $table->enum('status',['draft', 'ongoing', 'ended', 'cancelled'])->default('draft');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auctions');
    }
};
