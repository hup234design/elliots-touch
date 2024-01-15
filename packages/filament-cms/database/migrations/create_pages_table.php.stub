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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->json('content')
                ->nullable();
            $table->json('blocks')
                ->nullable();
            $table->boolean('is_home')
                ->default(false);
            $table->boolean('is_visible')
                ->default(true);
            $table->integer('sort_order')
                ->default(1);
            $table->timestamps();
        });

        if( Schema::hasTable('pages')) {
            \Hup234design\FilamentCms\Models\Page::updateOrCreate(
                [
                    'is_home' => true,
                ],
                [
                    'title' => 'Home',
                    'slug' => 'home',
                    'is_visible' => true,
                ]
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
