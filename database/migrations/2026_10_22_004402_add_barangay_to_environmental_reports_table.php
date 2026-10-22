<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('environmental_reports', function (Blueprint $table) {
            $table->string('barangay', 100)->nullable()->after('location_text')->index();
        });
    }

    public function down(): void
    {
        Schema::table('environmental_reports', function (Blueprint $table) {
            $table->dropColumn('barangay');
        });
    }
};