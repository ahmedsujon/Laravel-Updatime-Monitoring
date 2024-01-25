<?php

namespace App\Livewire\App;

use App\Models\Monitor;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

class HomeComponent extends Component
{
    use WithPagination;
    public $sortingValue = 50, $searchTerm, $sortBy = 'created_at', $sortDirection = 'DESC';
    public $edit_id, $delete_id;
    
    public function setSortBy($sortByField)
    {
        if ($this->sortBy === $sortByField) {
            $this->sortDirection = ($this->sortDirection ==  "ASC") ? 'DESC' : "ASC";
            return;
        }
        $this->sortBy = $sortByField;
        $this->sortDirection = 'DESC';
    }

    public function updateSearch()
    {
        $this->resetPage();
    }

    #[Title('Found Dogs')]
    
    public function render()
    {
        $live_sites = Monitor::where('url', 'like', '%' . $this->searchTerm . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.app.home-component', ['live_sites'=>$live_sites])->layout('livewire.app.layouts.base');
    }
}
