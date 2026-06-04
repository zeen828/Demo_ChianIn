<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\FortuneTranslation;
use Illuminate\Auth\Access\HandlesAuthorization;

class FortuneTranslationPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:FortuneTranslation');
    }

    public function view(AuthUser $authUser, FortuneTranslation $fortuneTranslation): bool
    {
        return $authUser->can('View:FortuneTranslation');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:FortuneTranslation');
    }

    public function update(AuthUser $authUser, FortuneTranslation $fortuneTranslation): bool
    {
        return $authUser->can('Update:FortuneTranslation');
    }

    public function delete(AuthUser $authUser, FortuneTranslation $fortuneTranslation): bool
    {
        return $authUser->can('Delete:FortuneTranslation');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:FortuneTranslation');
    }

    public function restore(AuthUser $authUser, FortuneTranslation $fortuneTranslation): bool
    {
        return $authUser->can('Restore:FortuneTranslation');
    }

    public function forceDelete(AuthUser $authUser, FortuneTranslation $fortuneTranslation): bool
    {
        return $authUser->can('ForceDelete:FortuneTranslation');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:FortuneTranslation');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:FortuneTranslation');
    }

    public function replicate(AuthUser $authUser, FortuneTranslation $fortuneTranslation): bool
    {
        return $authUser->can('Replicate:FortuneTranslation');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:FortuneTranslation');
    }

}