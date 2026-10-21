<?php

namespace App;

enum UserRole: string
{
    case Guest = 'guest';
    case Resident = 'resident';
    case Reviewer = 'reviewer';
    case Administrator = 'administrator';
}
