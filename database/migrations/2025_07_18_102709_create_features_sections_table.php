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

        Schema::create('features_tabs', function (Blueprint $table) {
            $table->id();
           // $table->foreignId('features_section_id')->constrained()->onDelete('cascade');
            $table->string('tab_title');              // E.g. Modisit, Praesenti
            $table->string('heading');                // Tab heading
            $table->text('description')->nullable();  // Optional italic paragraph
            $table->string('feature_list_first')->nullable(); // List of bullet points
            $table->string('feature_list_second')->nullable(); // List of bullet points
            $table->string('feature_list_third')->nullable(); // List of bullet points
            $table->string('feature_list_fourth')->nullable(); // List of bullet points
            $table->string('image')->nullable();      // Path to image
            $table->timestamps();
        
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('features_sections');
    }
};
