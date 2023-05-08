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
        Schema::create('analytics_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ab_test_id');
            $table->unsignedBigInteger('template_id');
            $table->integer('page_views');
            $table->integer('conversions');
            $table->decimal('revenue', 8, 2);
            $table->date('date');
            $table->timestamps();

            $table->foreign('ab_test_id')->references('id')->on('ab_tests')->onDelete('cascade');
            $table->foreign('template_id')->references('id')->on('pricing_templates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytics_data');
    }
};
