<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\Image;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Image $image)
    {
        $imageable = $image->imageable;

        if ($imageable instanceof Article) {
            return ($user->hasRole('Admin') || $user->hasRole('Moderator') || $user->id === $imageable->user->id);
        }
        else {
            return $user->hasRole('Admin');
        }
    }
}
