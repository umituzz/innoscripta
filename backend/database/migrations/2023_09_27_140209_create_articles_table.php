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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('source_id')->constrained();
            $table->foreignId('author_id')->nullable()->constrained();
            $table->foreignId('category_id')->nullable()->constrained();
            $table->string("title");
            $table->mediumText('description')->nullable();
            $table->string("url");
            $table->mediumText("image");
            $table->string("published_at");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
