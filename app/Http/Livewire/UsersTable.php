<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\TableFilters\DepartmentFilter;
use App\TableFilters\RoleFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Rappasoft\LaravelLivewireTables\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UsersTable extends TableComponent
{
    protected $queryString = ['filters'];

    public function query(): Builder
    {
        $query = User::query();
        $filters = $this->normalizedFilters();

        $query->when(isset($filters['role']), function ($builder) use ($filters) {
            $builder->whereIn('role', $filters['role']);
        });

        $query->when(isset($filters['department']), function ($builder) use ($filters) {
            $builder->where('department', $filters['department']);
        });

        $query->when(isset($filters['created_at']), function ($builder) use ($filters) {
            $builder->whereMonth('created_at', Carbon::parse($filters['created_at']));
        });

        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make('id'),
            Column::make('Name'),
            Column::make('Role'),
            Column::make('Department')
        ];
    }

    public function filtersViews(): array
    {
        return [
            new RoleFilter(),
            new DepartmentFilter(),
            (new DateFilter('created_at', 'Created At'))
        ];
    }
}
