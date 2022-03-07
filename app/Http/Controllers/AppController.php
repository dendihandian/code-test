<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class AppController extends Controller
{
    public function topUsersData()
    {
        $topUsersData = Cache::get('topUsersData');

        if (!$topUsersData) {
            $topUsersData = User::query()
                ->with([
                    'latest_post' => function($query) {
                        $query->select('user_id', 'created_at', 'title');
                    },
                ])
                ->withCount(['posts', 'latest_posts'])
                ->get()
                ->filter(function($user){
                    return $user->latest_posts_count > 10;
                })
                ->transform(function($user){
                    return [
                        'username' => $user->username,
                        'total_posts_count' => $user->posts_count,
                        'last_post_title' => $user->latest_posts->first()->title,
                    ];
                })->values();

            Cache::put('topUsersData', $topUsersData, now()->addMinutes(30));
        }

        return response()->json($topUsersData, Response::HTTP_OK);
    }
}
