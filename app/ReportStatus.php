<?php

namespace App;

enum ReportStatus: string
{
    case Submitted = 'submitted';
    case UnderReview = 'under_review';
    case MoreInfoRequested = 'more_info_requested';
    case Verified = 'verified';
    case Assigned = 'assigned';
    case InProgress = 'in_progress';
    case Resolved = 'resolved';
    case Rejected = 'rejected';

    public function label(): string
    {
        return match ($this) {
            self::Submitted => 'Submitted',
            self::UnderReview => 'Under review',
            self::MoreInfoRequested => 'More information requested',
            self::Verified => 'Verified',
            self::Assigned => 'Assigned',
            self::InProgress => 'In progress',
            self::Resolved => 'Resolved',
            self::Rejected => 'Rejected',
        };
    }

    /** @return ReportStatus[] */
    public function allowedNext(): array
    {
        return match ($this) {
            self::Submitted => [self::UnderReview, self::Rejected],
            self::UnderReview => [self::MoreInfoRequested, self::Verified, self::Rejected],
            self::MoreInfoRequested => [self::UnderReview, self::Rejected],
            self::Verified => [self::Assigned, self::Rejected],
            self::Assigned => [self::InProgress],
            self::InProgress => [self::Resolved],
            self::Resolved, self::Rejected => [],
        };
    }

    public function canTransitionTo(self $next): bool
    {
        return in_array($next, $this->allowedNext(), true);
    }
}