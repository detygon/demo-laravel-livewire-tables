<?php

namespace App\TableFilters;

use Rappasoft\LaravelLivewireTables\Filters\SelectFilter;

class DepartmentFilter extends SelectFilter
{
    public $id = 'department';

    public $title = 'Department';

    public function options()
    {
        return ['agency' => 'Agency', 'startup' => 'Startup'];
    }
}
