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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('summary')
                ->nullable();
            $table->json('content')
                ->nullable();
            $table->json('blocks')
                ->nullable();
            $table->foreignId('post_category_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->datetime('publish_at');
            $table->boolean('is_visible')
                ->default(false);
            $table->timestamps();
        });

        if( Schema::hasTable('index_pages')) {
            \Hup234design\FilamentCms\Models\IndexPage::updateOrCreate(
                [
                    'for' => 'posts',
                ],
                [
                    'title' => 'Posts',
                    'slug' => 'posts',
                ]
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
