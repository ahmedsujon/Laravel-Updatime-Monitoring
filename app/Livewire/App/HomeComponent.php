<?php

namespace App\Livewire\App;

use App\Models\Monitor;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Artisan;

class HomeComponent extends Component
{
    public $loading;
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

    public function runScheduledTasks()
    {
        $this->loading = true;
        sleep(10);
        Artisan::call('monitor:check-uptime');
        $this->loading = false;
        session()->flash('message', 'Scheduled tasks executed successfully!');
    }

    #[Title('IntrigueIT Uptime Monitoring')]
    public function render()
    {
        $live_sites = Monitor::where('url', 'like', '%' . $this->searchTerm . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.app.home-component', ['live_sites' => $live_sites])->layout('livewire.app.layouts.base');
    }
}
