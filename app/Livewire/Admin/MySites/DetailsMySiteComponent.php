<?php

namespace App\Livewire\Admin\MySites;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DetailsMySiteComponent extends Component
{

    public $certificate_status;

    public function mount()
    {
        $this->certificate_status;
    }

    public function render()
    {
        $mysite = DB::table('monitors')->first();
        return view('livewire.admin.my-sites.details-my-site-component', ['mysite'=>$mysite])->layout('livewire.admin.layouts.base');
    }
}
