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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location')->nullable();
            $table->string('company')->nullable();
            $table->string('job_title')->nullable();
            $table->text('content')->nullable();
            $table->date('received_on');
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });

        if( Schema::hasTable('index_pages')) {
            \Hup234design\FilamentCms\Models\IndexPage::updateOrCreate(
                [
                    'for' => 'testimonials',
                ],
                [
                    'title' => 'Testimonials',
                    'slug' => 'testimonials',
                ]
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
