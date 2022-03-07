<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Database\Factories\PostFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1 users with more than 10 posts in last 7 days and some posts in last month
        for ($i=0; $i < 1; $i++) { 
            $user = UserFactory::new()->create();
            PostFactory::times(random_int(11, 15))->create([
                'user_id' => $user->id,
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(5),
            ]);
            PostFactory::times(10)->create([
                'user_id' => $user->id,
                'created_at' => Carbon::now()->subMonth(),
                'updated_at' => Carbon::now()->subMonth(),
            ]);
        }

        // 2 users with more than 10 posts in last 7 days
        for ($i=0; $i < 2; $i++) { 
            $user = UserFactory::new()->create();
            PostFactory::times(random_int(11, 15))->create([
                'user_id' => $user->id,
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(5),
            ]);
        }

        // 4 users with less than 10 posts in last 7 days
        for ($i=0; $i < 4; $i++) { 
            $user = UserFactory::new()->create();
            PostFactory::times(random_int(1, 10))->create([
                'user_id' => $user->id,
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(5),
            ]);
        }

        // 6 users with more than 10 posts in last month
        for ($i=0; $i < 6; $i++) { 
            $user = UserFactory::new()->create();
            PostFactory::times(random_int(11, 15))->create([
                'user_id' => $user->id,
                'created_at' => Carbon::now()->subMonth(),
                'updated_at' => Carbon::now()->subMonth(),
            ]);
        }

        // 8 users with less than 10 posts in last month
        for ($i=0; $i < 8; $i++) { 
            $user = UserFactory::new()->create();
            PostFactory::times(random_int(1, 10))->create([
                'user_id' => $user->id,
                'created_at' => Carbon::now()->subMonth(),
                'updated_at' => Carbon::now()->subMonth(),
            ]);
        }

    }
}
