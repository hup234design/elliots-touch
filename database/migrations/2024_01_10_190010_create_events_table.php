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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('summary')
                ->nullable();
            $table->json('content')
                ->nullable();
            $table->json('blocks')
                ->nullable();
            $table->foreignId('event_category_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->date('date');
            $table->string('start_time')
                ->nullable();
            $table->string('end_time')
                ->nullable();
            $table->boolean('is_visible')
                ->default(false);
            $table->timestamps();
        });

        if( Schema::hasTable('index_pages')) {
            \Hup234design\FilamentCms\Models\IndexPage::updateOrCreate(
                [
                    'for' => 'events',
                ],
                [
                    'title' => 'Events',
                    'slug' => 'events',
                ]
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
