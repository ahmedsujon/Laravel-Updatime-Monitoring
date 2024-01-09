<?php

namespace App\Livewire\Admin\MySites;

use App\Models\Monitor;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class MySitesComponent extends Component
{
    use WithPagination;
    public $sortingValue = 50, $searchTerm;
    public $edit_id, $delete_id;
    public $url, $uptime_status, $uptime_last_check_date, $certificate_status, $certificate_expiration_date,
        $certificate_issuer, $certificate_check_failure_reason, $uptime_status_last_change_date, $uptime_check_method;

    public function storeData()
    {
        $this->validate([
            'url' => 'required|url|unique:monitors,url',
        ]);

        $data = new Monitor();
        $data->url = $this->url;
        $data->uptime_status_last_change_date = date('Y-m-d H:i:s');
        $data->uptime_check_method = 'head';
        $data->certificate_check_enabled = 1;

        $data->save();
        $this->dispatch('closeModal');
        $this->dispatch('success', ['message' => 'New url added successfully']);
        $this->resetInputs();
    }

    public function editData($id)
    {
        $data = Monitor::find($id);
        $this->url = $data->url;
        $this->edit_id = $data->id;
        $this->dispatch('showEditModal');
    }

    public function updateData()
    {
        $this->validate([
            'url' => 'required',
        ]);

        $user = Monitor::find($this->edit_id);
        $user->url = $this->url;
        $user->save();

        $this->dispatch('closeModal');
        $this->dispatch('success', ['message' => 'URL updated successfully']);
        $this->resetInputs();
    }

    public function close()
    {
        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->url = null;
        $this->edit_id = null;
    }

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatch('show_delete_confirmation');
    }

    public function deleteData()
    {
        $admin = Monitor::find($this->delete_id);
        $admin->delete();
        $this->dispatch('monitor_deleted');
        $this->delete_id = '';
    }

    public function render()
    {
        $mysites = DB::table('monitors')->where('url', 'like', '%' . $this->searchTerm . '%')->orderBy('id', 'DESC')->paginate($this->sortingValue);
        return view('livewire.admin.my-sites.my-sites-component', ['mysites' => $mysites])->layout('livewire.admin.layouts.base');
    }
}
