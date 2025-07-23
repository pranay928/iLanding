<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('call_to_actions', function (Blueprint $table) {
        $table->id();
        $table->string('heading');
        $table->text('subtext');
        $table->string('button_text');
        $table->string('button_link');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('call_to_action_sections');
    }
};
