<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Filters\BooleanFilter;
use Rappasoft\LaravelLivewireTables\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UsersTable extends TableComponent
{
    protected $queryString = ['filters'];

    public function query(): Builder
    {
        return User::filter($this->normalizedFilters());
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
            (new SelectFilter('role', 'Role'))->withOptions(['admin' => 'Admin', 'moderator' => 'Moderator']),
            (new BooleanFilter('department', 'Department'))->withOptions(['agency' => 'Agency', 'startup' => 'Startup']),
            (new DateFilter('created_at', 'Created At'))
        ];
    }
}
