<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\SignSystem;
use Illuminate\Auth\Access\HandlesAuthorization;

class SignSystemPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:SignSystem');
    }

    public function view(AuthUser $authUser, SignSystem $signSystem): bool
    {
        return $authUser->can('View:SignSystem');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:SignSystem');
    }

    public function update(AuthUser $authUser, SignSystem $signSystem): bool
    {
        return $authUser->can('Update:SignSystem');
    }

    public function delete(AuthUser $authUser, SignSystem $signSystem): bool
    {
        return $authUser->can('Delete:SignSystem');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:SignSystem');
    }

    public function restore(AuthUser $authUser, SignSystem $signSystem): bool
    {
        return $authUser->can('Restore:SignSystem');
    }

    public function forceDelete(AuthUser $authUser, SignSystem $signSystem): bool
    {
        return $authUser->can('ForceDelete:SignSystem');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:SignSystem');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:SignSystem');
    }

    public function replicate(AuthUser $authUser, SignSystem $signSystem): bool
    {
        return $authUser->can('Replicate:SignSystem');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:SignSystem');
    }

}