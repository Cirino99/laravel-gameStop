<?php

use App\Models\Game;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users_ids = User::all()->pluck('id');
        for ($i = 0; $i < 10; $i++) {
            $game = new Game;
            $game->title = $faker->words(rand(2, 4), true);
            $game->user_id = $faker->randomElement($users_ids);
            $game->image = 'https://picsum.photos/id/' . rand(1, 300) . '/500/300';
            $game->price = $faker->numberBetween(0, 100);
            $game->save();
        }
    }
}
