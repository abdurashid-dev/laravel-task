<?php

namespace App\Http\Livewire\Roles;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $column = 'id';
    public $asc = 'desc';
    public $perPage = 10;

    public function render()
    {
        $users = User::search($this->search)->orderBy($this->column, $this->asc)->paginate($this->perPage);
        return view('livewire.roles.index');
    }
}
