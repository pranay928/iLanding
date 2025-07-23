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
Schema::create('about_sections', function (Blueprint $table) {
    $table->id();
    $table->string('meta');
    $table->string('title');
    $table->text('description');
    $table->json('feature_list_1')->nullable(); // Left column list
    $table->json('feature_list_2')->nullable(); // Right column list
    $table->string('profile_name')->nullable();
    $table->string('profile_position')->nullable();
    $table->string('profile_image')->nullable();
    $table->string('contact_label')->nullable();
    $table->string('contact_number')->nullable();
    $table->string('main_image')->nullable();
    $table->string('small_image')->nullable();
    $table->string('experience_years')->nullable();
    $table->string('experience_text')->nullable();
    $table->timestamps();

});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_sections');
    }
};
