<?php

use App\Models\Game;
use App\Models\Platform;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class GamePlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $games = Game::all();
        $platforms = Platform::all()->pluck('id');
        $nPlatforms = count($platforms);

        foreach ($games as $game) {
            $gamePlatforms = $faker->randomElements($platforms, rand(0, $nPlatforms));
            foreach ($gamePlatforms as $platformId) {
                $game->platforms()->attach($platformId);
            }
        }
    }
}
