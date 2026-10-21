<?php

namespace App\Policies;

use App\Models\EnvironmentalReport;
use App\Models\User;
use App\UserRole;

class ReportPolicy
{
    public function viewAny(User $user): bool
    {
        return in_array(UserRole::tryFrom($user->role), [UserRole::Reviewer, UserRole::Administrator], true);
    }

    public function view(User $user, EnvironmentalReport $report): bool
    {
        return $user->id === $report->user_id
            || $this->viewAny($user);
    }

    public function create(User $user): bool
    {
        return in_array(UserRole::tryFrom($user->role), [UserRole::Resident, UserRole::Administrator], true);
    }

    public function review(User $user, EnvironmentalReport $report): bool
    {
        return $this->viewAny($user);
    }
}
