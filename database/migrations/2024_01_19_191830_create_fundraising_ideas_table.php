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
        Schema::create('fundraising_ideas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->json('content')
                ->nullable();
            $table->boolean('is_visible')
                ->default(false);
            $table->integer('sort_order')
                ->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fundraising_ideas');
    }
};
