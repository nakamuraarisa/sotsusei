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
        Schema::rename('activities', 'events');
            //テーブル名変更
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('events', 'activities');
            //変更を元に戻す
    }
};
