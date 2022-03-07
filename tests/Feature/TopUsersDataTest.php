<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Database\Factories\PostFactory;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TopUsersDataTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_top_users_data_should_valid()
    {
        $topUser = UserFactory::new()->create();
        $topUserLatestPosts = PostFactory::times(15)->create([
            'user_id' => $topUser->id,
            'created_at' => Carbon::now()->subDays(3),
        ]);
        $topUserLastPost = PostFactory::new()->create([
            'user_id' => $topUser->id,
        ]);
        $topUserOldPosts = PostFactory::times(5)->create([
            'user_id' => $topUser->id,
            'created_at' => Carbon::now()->subMonths(1),
        ]);

        $NonTopUser = UserFactory::new()->create();
        $NonTopUserOldPosts = PostFactory::times(5)->create([
            'user_id' => $NonTopUser->id,
            'created_at' => Carbon::now()->subMonths(1),
        ]);

        $this->get("/api/top-users-data")
            ->assertJsonFragment(['username' => $topUser->username])
            ->assertJsonFragment(['total_posts_count' => 21])
            ->assertJsonFragment(['last_post_title' => $topUserLastPost->title])
            ->assertDontSee($NonTopUser->username)
            ->assertOk();
    }
}
