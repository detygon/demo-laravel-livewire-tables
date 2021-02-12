<?php

namespace App\TableFilters;

use Rappasoft\LaravelLivewireTables\Filters\BooleanFilter;

class RoleFilter extends BooleanFilter
{
    public $id = 'role';

    public $title = 'Rôle';

    public function options()
    {
        return ['admin' => 'Admin', 'moderator' => 'Moderator'];
    }
}
