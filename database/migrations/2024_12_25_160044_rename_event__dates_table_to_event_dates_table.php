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
        Schema::rename('event__dates', 'event_dates');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('event_dates', 'event__dates');
    }
};
