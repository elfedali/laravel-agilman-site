<?php

namespace App\Policies;

use App\Models\Sprint;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SprintPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User  $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Sprint $sprint): bool
    {
        if ($user->id === $sprint->project->user_id) {
            return Response::allow();
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Sprint $sprint): bool
    {
        if ($user->id === $sprint->project->user_id) {
            return Response::allow();
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Sprint $sprint): bool
    {
        if ($user->id === $sprint->project->user_id) {
            return Response::allow();
        } else return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Sprint $sprint): bool
    {
        if ($user->id === $sprint->project->owner_id) {
            return Response::allow();
        } else return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Sprint $sprint): bool
    {
        if ($user->id === $sprint->project->owner_id) {
            return Response::allow();
        } else return false;
    }
}
