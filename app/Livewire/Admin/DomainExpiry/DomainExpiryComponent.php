<?php

namespace App\Livewire\Admin\DomainExpiry;

use GuzzleHttp\Client;
use App\Models\Monitor;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class DomainExpiryComponent extends Component
{

    public $domain, $url, $uptime_status_last_change_date, $uptime_check_method, $domain_expiry_date,
    $certificate_check_enabled;
    public $expirationDate;

    // public function getExpirationDate()
    // {
    //     $apiKey = 'at_LESoEublmDSqdDO7Er118tNmgytrW'; // Replace with your actual API key
    //     $url = "https://www.whoisxmlapi.com/whoisserver/WhoisService?apiKey={$apiKey}&domainName={$this->domain}&outputFormat=json";

    //     $response = Http::get($url);
    //     $data = $response->json();

    //     if (isset($data['WhoisRecord']['registryData']['expiresDate'])) {
    //         $this->expirationDate = $data['WhoisRecord']['registryData']['expiresDate'];
    //     } else {
    //         $this->expirationDate = 'Not available';
    //     }
    // }

    public function getExpirationDate()
    {
        $apiKey = 'at_LESoEublmDSqdDO7Er118tNmgytrW';
        $url = "https://www.whoisxmlapi.com/whoisserver/WhoisService?apiKey={$apiKey}&domainName={$this->domain}&outputFormat=json";
    
        $response = Http::get($url);
        $responseData = $response->json();
    
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
    }

    public function render()
    {
        return view('livewire.admin.domain-expiry.domain-expiry-component')->layout('livewire.admin.layouts.base');
    }
}
