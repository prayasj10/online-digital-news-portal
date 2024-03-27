<?php

namespace App\Policies;

use App\Author;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AuthorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Author  $author
     * @return mixed
     */
    public function view(User $user, Author $author)
    {
        //
        return $user->hasPermission('author-view');

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user->hasPermission('author-create');

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Author  $author
     * @return mixed
     */
    public function update(User $user, Author $author)
    {
        //
        return $user->hasPermission('author-update');

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Author  $author
     * @return mixed
     */
    public function delete(User $user, Author $author)
    {
        //
        return $user->hasPermission('author-delete');

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Author  $author
     * @return mixed
     */
    public function restore(User $user, Author $author)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Author  $author
     * @return mixed
     */
    public function forceDelete(User $user, Author $author)
    {
        //
    }
}
