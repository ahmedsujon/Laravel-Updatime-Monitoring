<?php

namespace App\Livewire\Admin\MySites;

use Carbon\Carbon;
use App\Models\Monitor;
use Livewire\Component;
use Livewire\WithPagination;
use App\Mail\DowntimeNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class MySitesComponent extends Component
{
    public $loading;
    use WithPagination;
    public $sortingValue = 50, $searchTerm, $sortBy = 'created_at', $sortDirection = 'DESC';
    public $edit_id, $delete_id;
    public $domain, $url, $uptime_status, $uptime_last_check_date, $certificate_status, $certificate_expiration_date,
        $certificate_issuer, $certificate_check_failure_reason, $uptime_status_last_change_date, $uptime_check_method, $expirationDate;
    protected $signature = 'check:uptimenotify';

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

    public function storeData()
    {
        $apiKey = 'at_LESoEublmDSqdDO7Er118tNmgytrW';
        $url = "https://www.whoisxmlapi.com/whoisserver/WhoisService?apiKey={$apiKey}&domainName={$this->domain}&outputFormat=json";

        $response = Http::get($url);
        $responseData = $response->json();

        $this->validate([
            'domain' => 'required|url|unique:monitors,url',
        ]);

        $monitor = new Monitor();
        $monitor->url = $this->domain;
        $monitor->uptime_status_last_change_date = date('Y-m-d H:i:s');
        $monitor->uptime_check_method = 'head';
        $monitor->certificate_check_enabled = 1;

        if (isset($responseData['WhoisRecord']['registryData']['expiresDate'])) {
            $this->expirationDate = $responseData['WhoisRecord']['registryData']['expiresDate'];
        } else {
            $this->expirationDate = 'Not available';
        }
        $monitor->domain_expiry_date = $this->expirationDate;

        $monitor->save();
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
        $apiKey = 'at_LESoEublmDSqdDO7Er118tNmgytrW';
        $url = "https://www.whoisxmlapi.com/whoisserver/WhoisService?apiKey={$apiKey}&domainName={$this->domain}&outputFormat=json";

        $response = Http::get($url);
        $responseData = $response->json();

        $this->validate([
            'domain' => 'required',
        ]);

        $monitor = Monitor::find($this->edit_id);
        $monitor->url = $this->domain;
        if (isset($responseData['WhoisRecord']['registryData']['expiresDate'])) {
            $this->expirationDate = $responseData['WhoisRecord']['registryData']['expiresDate'];
        } else {
            $this->expirationDate = 'Not available';
        }
        $monitor->domain_expiry_date = $this->expirationDate;
        $monitor->save();

        $this->dispatch('closeModal');
        $this->dispatch('success', ['message' => 'URL updated successfully']);
        $this->resetInputs();
    }

    // public function updateData()
    // {
    //     $this->validate([
    //         'url' => 'required',
    //     ]);

    //     $user = Monitor::find($this->edit_id);
    //     $user->url = $this->url;
    //     $user->save();

    //     $this->dispatch('closeModal');
    //     $this->dispatch('success', ['message' => 'URL updated successfully']);
    //     $this->resetInputs();
    // }

    public function close()
    {
        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->domain = null;
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

    public function downTimeNotification()
    {
        $downDomains = Monitor::where('uptime_status', 'down')->get();
        dispatch(function () use ($downDomains) {
            foreach ($downDomains as $domain) {
                Mail::to('gearinsane@gmail.com')->send(new DowntimeNotification($domain->url));
            }
        })->delay(Carbon::now()->everyMinute());
    }

    public function expireDomainNotification()
    {
        $expiredomains = DB::table('monitors')->pluck('domain_expiry_date');
        foreach ($expiredomains as $date) {
            $dateTime = Carbon::parse($date);
            $now = Carbon::now();
            $daysLeft = $now->diffInDays($dateTime);

            if ($daysLeft < 90) {
                Mail::send('emails.downtimenotify', $daysLeft, function ($message) use ($daysLeft, $date) {
                    $message->to('gearinsane@gmail.com')
                        ->subject('Downtime Notification!');
                });
            }
        }
    }

    public function render()
    {
        $mysites = Monitor::where('url', 'like', '%' . $this->searchTerm . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');

        // $mysites = DB::table('monitors')->where('url', 'like', '%' . $this->searchTerm . '%')->orderBy('id', 'DESC')->paginate($this->sortingValue);
        return view('livewire.admin.my-sites.my-sites-component', ['mysites' => $mysites])->layout('livewire.admin.layouts.base');
    }
}
