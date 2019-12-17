<?php

namespace App\Policies;

use App\Comment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;


    public function update(User $user, Comment $comment)
    {
        return $user->id == $comment->user_id;

    }

    /**
     * Determine whether the user can delete the comment.
     *
     * @param User $user
     * @param Comment $comment_id
     * @return mixed
     */
    public function destroy(User $user, Comment $comment)
    {

        return $user->id == $comment->user_id;

    }

    /**
     * Determine whether the user can restore the comment.
     *
     * @param  \App\User  $user
     * @param  \App\Comment  $comment
     * @return mixed
     */
    public function restore(User $user, Comment $comment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the comment.
     *
     * @param  \App\User  $user
     * @param  \App\Comment  $comment
     * @return mixed
     */
    public function forceDelete(User $user, Comment $comment)
    {
        //
    }
}
