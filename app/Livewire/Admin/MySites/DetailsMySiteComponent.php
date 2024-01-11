<?php

namespace App\Livewire\Admin\MySites;

use App\Models\Monitor;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DetailsMySiteComponent extends Component
{
    public $monitor_id, $url, $certificate_status, $uptime_check_enabled, $look_for_string, $uptime_check_interval_in_minutes, $uptime_status,
    $uptime_check_failure_reason, $uptime_check_times_failed_in_a_row, $uptime_status_last_change_date, $uptime_last_check_date,
    $uptime_check_failed_event_fired_on_date, $uptime_check_method, $uptime_check_payload, $uptime_check_additional_headers, $uptime_check_response_checker,
    $certificate_check_enabled, $certificate_expiration_date, $certificate_issuer, $certificate_check_failure_reason;

    public function mount($monitor_id)
    {
        $mysite = Monitor::where('id', $monitor_id)->first();
        $this->url = $mysite->url;
        $this->certificate_status = $mysite->certificate_status;
        $this->uptime_check_enabled = $mysite->uptime_check_enabled;
        $this->look_for_string = $mysite->look_for_string;
        $this->uptime_check_interval_in_minutes = $mysite->uptime_check_interval_in_minutes;
        $this->uptime_status = $mysite->uptime_status;
        $this->uptime_check_failure_reason = $mysite->uptime_check_failure_reason;
        $this->uptime_check_times_failed_in_a_row = $mysite->uptime_check_times_failed_in_a_row;
        $this->uptime_status_last_change_date = $mysite->uptime_status_last_change_date;
        $this->uptime_last_check_date = $mysite->uptime_last_check_date;
        $this->uptime_check_failed_event_fired_on_date = $mysite->uptime_check_failed_event_fired_on_date;
        $this->uptime_check_method = $mysite->uptime_check_method;
        $this->uptime_check_payload = $mysite->uptime_check_payload;
        $this->uptime_check_additional_headers = $mysite->uptime_check_additional_headers;
        $this->uptime_check_response_checker = $mysite->uptime_check_response_checker;
        $this->certificate_check_enabled = $mysite->certificate_check_enabled;
        $this->certificate_expiration_date = $mysite->certificate_expiration_date;
        $this->certificate_issuer = $mysite->certificate_issuer;
        $this->certificate_check_failure_reason = $mysite->certificate_check_failure_reason;
    }


    public function render()
    {
        $mysite = Monitor::where('id', $this->monitor_id)->first();
        return view('livewire.admin.my-sites.details-my-site-component', ['mysite' => $mysite])->layout('livewire.admin.layouts.base');
    }
}
