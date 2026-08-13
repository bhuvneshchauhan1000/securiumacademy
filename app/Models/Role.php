<?php

namespace App\Models;

use App\Support\HasHashIdRouteBinding;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasHashIdRouteBinding;
}
