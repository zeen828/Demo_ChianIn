<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Fortune;
use Illuminate\Auth\Access\HandlesAuthorization;

class FortunePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Fortune');
    }

    public function view(AuthUser $authUser, Fortune $fortune): bool
    {
        return $authUser->can('View:Fortune');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Fortune');
    }

    public function update(AuthUser $authUser, Fortune $fortune): bool
    {
        return $authUser->can('Update:Fortune');
    }

    public function delete(AuthUser $authUser, Fortune $fortune): bool
    {
        return $authUser->can('Delete:Fortune');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Fortune');
    }

    public function restore(AuthUser $authUser, Fortune $fortune): bool
    {
        return $authUser->can('Restore:Fortune');
    }

    public function forceDelete(AuthUser $authUser, Fortune $fortune): bool
    {
        return $authUser->can('ForceDelete:Fortune');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Fortune');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Fortune');
    }

    public function replicate(AuthUser $authUser, Fortune $fortune): bool
    {
        return $authUser->can('Replicate:Fortune');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Fortune');
    }

}