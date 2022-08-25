<?php

use App\Models\Platform;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $platforms = ['PlayStation', 'Xbox', 'Switch', 'PC'];

        foreach ($platforms as $platform) {
            Platform::create([
                'name'  => $platform,
            ]);
        }
    }
}
