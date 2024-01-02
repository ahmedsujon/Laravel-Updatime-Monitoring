<?php

namespace App\Livewire\Admin\MySites;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class MySitesComponent extends Component
{
    use WithPagination;
    public $sortingValue = 10, $searchTerm;
    public $edit_id, $delete_id;
    public $url, $uptime_status, $uptime_last_check_date, $certificate_status, $certificate_expiration_date, $certificate_issuer, $certificate_check_failure_reason;

    public function render()
    {
        $mysites = DB::table('monitors')->where('url', 'like', '%' . $this->searchTerm . '%')->orderBy('id', 'DESC')->paginate($this->sortingValue);
        return view('livewire.admin.my-sites.my-sites-component', ['mysites'=>$mysites])->layout('livewire.admin.layouts.base');
    }
}
