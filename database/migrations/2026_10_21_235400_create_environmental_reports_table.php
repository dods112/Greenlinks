<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('environmental_reports', function (Blueprint $table) {
            $table->id();
            $table->string('reference_code', 20)->unique();
            $table->foreignIdFor(User::class)->constrained()->restrictOnDelete();
            $table->string('title');
            $table->string('category', 50)->index();
            $table->text('short_description');
            $table->text('detailed_description');
            $table->string('location_text')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->date('date_observed');
            $table->string('status', 30)->default('submitted')->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('environmental_reports');
    }
};