<?php

namespace App\Livewire\Admin\DomainExpiry;

use GuzzleHttp\Client;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class DomainExpiryComponent extends Component
{

    public $domain;
    public $expirationDate;

    public function getExpirationDate()
    {
        $apiKey = 'at_LESoEublmDSqdDO7Er118tNmgytrW'; // Replace with your actual API key
        $url = "https://www.whoisxmlapi.com/whoisserver/WhoisService?apiKey={$apiKey}&domainName={$this->domain}&outputFormat=json";

        $response = Http::get($url);
        $data = $response->json();

        if (isset($data['WhoisRecord']['registryData']['expiresDate'])) {
            $this->expirationDate = $data['WhoisRecord']['registryData']['expiresDate'];
        } else {
            $this->expirationDate = 'Not available';
        }
    }

    public function render()
    {
        return view('livewire.admin.domain-expiry.domain-expiry-component')->layout('livewire.admin.layouts.base');
    }
}
