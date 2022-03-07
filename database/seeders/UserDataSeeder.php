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

            for ($j=0; $j < random_int(11, 15); $j++) { 
                PostFactory::new()->create([
                    'user_id' => $user->id,
                    'created_at' => Carbon::now()->subDays(5)->addHour(random_int(1,10))->addMinutes(random_int(1, 30)),
                    'updated_at' => Carbon::now()->subDays(5)->addHour(random_int(1,10))->addMinutes(random_int(1, 30)),
                ]);
            }

            for ($j=0; $j < 10; $j++) { 
                PostFactory::new()->create([
                    'user_id' => $user->id,
                    'created_at' => Carbon::now()->subMonth(5)->addHour(random_int(1,10))->addMinutes(random_int(1, 30)),
                    'updated_at' => Carbon::now()->subMonth(5)->addHour(random_int(1,10))->addMinutes(random_int(1, 30)),
                ]);
            }
        }

        // 2 users with more than 10 posts in last 7 days
        for ($i=0; $i < 2; $i++) { 
            $user = UserFactory::new()->create();
            for ($j=0; $j < random_int(11, 15); $j++) { 
                PostFactory::new()->create([
                    'user_id' => $user->id,
                    'created_at' => Carbon::now()->subDays(5)->addHour(random_int(1,10))->addMinutes(random_int(1, 30)),
                    'updated_at' => Carbon::now()->subDays(5)->addHour(random_int(1,10))->addMinutes(random_int(1, 30)),
                ]);
            }
        }

        // 4 users with less than 10 posts in last 7 days
        for ($i=0; $i < 4; $i++) { 
            $user = UserFactory::new()->create();
            for ($j=0; $j < random_int(1, 10); $j++) { 
                PostFactory::new()->create([
                    'user_id' => $user->id,
                    'created_at' => Carbon::now()->subDays(5)->addHour(random_int(1,10))->addMinutes(random_int(1, 30)),
                    'updated_at' => Carbon::now()->subDays(5)->addHour(random_int(1,10))->addMinutes(random_int(1, 30)),
                ]);
            }
        }

        // 6 users with more than 10 posts in last month
        for ($i=0; $i < 6; $i++) { 
            $user = UserFactory::new()->create();
            for ($j=0; $j < random_int(11, 15); $j++) { 
                PostFactory::new()->create([
                    'user_id' => $user->id,
                    'created_at' => Carbon::now()->subMonth()->addHour(random_int(1,10))->addMinutes(random_int(1, 30)),
                    'updated_at' => Carbon::now()->subMonth()->addHour(random_int(1,10))->addMinutes(random_int(1, 30)),
                ]);
            }
        }

        // 8 users with less than 10 posts in last month
        for ($i=0; $i < 8; $i++) { 
            $user = UserFactory::new()->create();
            for ($j=0; $j < random_int(1, 10); $j++) { 
                PostFactory::new()->create([
                    'user_id' => $user->id,
                    'created_at' => Carbon::now()->subMonth()->addHour(random_int(1,10))->addMinutes(random_int(1, 30)),
                    'updated_at' => Carbon::now()->subMonth()->addHour(random_int(1,10))->addMinutes(random_int(1, 30)),
                ]);
            }
        }

    }
}
