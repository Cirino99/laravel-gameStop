<?php

use App\Models\Game;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;


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
        for ($i = 0; $i < 50; $i++) {
            $game = new Game;
            $game->title = $faker->words(rand(2, 4), true);
            $game->user_id = $faker->randomElement($users_ids);
            //immagine storage
            $number = rand(0, 3);
            $contents = new File(__DIR__ . '/../../storage/app/imgGame/img(' . $number . ').jpg');
            $game->image = Storage::put('uploads', $contents);

            $game->price = $faker->numberBetween(0, 100);
            $game->save();
        }
    }
}
