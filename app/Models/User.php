<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function latest_posts()
    {
        return $this->hasMany(Post::class)
            ->where('created_at', '>=', Carbon::now()->subWeek()->toDateTimeString())
            ->orderByDesc('created_at');
    }
}
