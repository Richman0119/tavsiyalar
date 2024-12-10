<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Recommendation;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecommendationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the recommendation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recommendation  $recommendation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Recommendation $recommendation)
    {
        // Allow the user to update the recommendation if they are the owner
        return $user->id === $recommendation->user_id;
    }

    // Add other methods like 'delete', 'view', etc., if needed
}
