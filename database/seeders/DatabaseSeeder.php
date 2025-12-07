<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\Course;
use App\Models\State;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Course::factory(10)->create();

        $countries = Country::factory(5)->create();
        $states = State::factory(10)->create([
            'country_id' => fn() => $countries->random()->id
        ]);

        $states->each(function ($state) {
            City::factory(10)->create([
                'state_id' => $state->id,
                'country_id' => $state->country_id
            ]);
        });

        DB::table('seasons')->insert([
            [
                'season_start' => 2020,
                'season_end' => 2021,
                'active' => false
            ],
            [
                'season_start' => 2021,
                'season_end' => 2022,
                'active' => true

            ],
            [
                'season_start' => 2022,
                'season_end' => 2023,
                'active' => false

            ],
            [
                'season_start' => 2023,
                'season_end' => 2024,
                'active' => false

            ],
            [
                'season_start' => 2024,
                'season_end' => 2025,
                'active' => false

            ]
        ]);


    }
}
