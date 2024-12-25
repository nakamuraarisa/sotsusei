<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EventDate; // モデルを使用するため追加

class EventDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EventDate::create([
            'event_id' => 1,
            'date' => '2025-01-26',
        ]);

        EventDate::create([
            'event_id' => 1,
            'date' => '2025-01-27',
        ]);

        EventDate::create([
            'event_id' => 1,
            'date' => '2025-01-28',
        ]);

        EventDate::create([
            'event_id' => 1,
            'date' => '2025-01-29',
        ]);

        EventDate::create([
            'event_id' => 1,
            'date' => '2025-01-30',
        ]);

        EventDate::create([
            'event_id' => 1,
            'date' => '2025-01-31',
        ]);

        EventDate::create([
            'event_id' => 2,
            'date' => '2025-01-26',
        ]);

        EventDate::create([
            'event_id' => 3,
            'date' => '2025-01-26',
        ]);

        EventDate::create([
            'event_id' => 3,
            'date' => '2025-01-27',
        ]);

        EventDate::create([
            'event_id' => 3,
            'date' => '2025-01-28',
        ]);

        EventDate::create([
            'event_id' => 3,
            'date' => '2025-01-29',
        ]);

        EventDate::create([
            'event_id' => 3,
            'date' => '2025-01-30',
        ]);

        EventDate::create([
            'event_id' => 3,
            'date' => '2025-01-31',
        ]);
    }
}
