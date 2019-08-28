<?php

namespace App\Policies;

use App\Tweet;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TweetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can delete the post.
     *
     * @param User $user
     * @param Tweet $tweet
     * @return mixed
     */
    public function delete(User $user, Tweet $tweet)
    {
        return $tweet->user_id===$user->id;
    }
}
