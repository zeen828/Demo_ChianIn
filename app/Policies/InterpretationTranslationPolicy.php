<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\InterpretationTranslation;
use Illuminate\Auth\Access\HandlesAuthorization;

class InterpretationTranslationPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:InterpretationTranslation');
    }

    public function view(AuthUser $authUser, InterpretationTranslation $interpretationTranslation): bool
    {
        return $authUser->can('View:InterpretationTranslation');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:InterpretationTranslation');
    }

    public function update(AuthUser $authUser, InterpretationTranslation $interpretationTranslation): bool
    {
        return $authUser->can('Update:InterpretationTranslation');
    }

    public function delete(AuthUser $authUser, InterpretationTranslation $interpretationTranslation): bool
    {
        return $authUser->can('Delete:InterpretationTranslation');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:InterpretationTranslation');
    }

    public function restore(AuthUser $authUser, InterpretationTranslation $interpretationTranslation): bool
    {
        return $authUser->can('Restore:InterpretationTranslation');
    }

    public function forceDelete(AuthUser $authUser, InterpretationTranslation $interpretationTranslation): bool
    {
        return $authUser->can('ForceDelete:InterpretationTranslation');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:InterpretationTranslation');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:InterpretationTranslation');
    }

    public function replicate(AuthUser $authUser, InterpretationTranslation $interpretationTranslation): bool
    {
        return $authUser->can('Replicate:InterpretationTranslation');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:InterpretationTranslation');
    }

}