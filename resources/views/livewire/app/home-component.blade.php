<div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 style="text-align: center;" class="page-title-box">List Of Live Sites</h1>
                </div>
                <div style="text-align: center;" class="col-12">
                    <button wire:click='runScheduledTasks' class="btn btn-primary waves-effect waves-light" type="submit"
                        wire:loading.attr="disabled">
                        <span wire:loading wire:target="runScheduledTasks">Please wait scheduled tasks running...</span>
                        <span wire:loading.remove>Refresh</span>
                    </button>
                </div>
                <div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12 mb-2 sort_cont">
                                    <label class="font-weight-normal" style="">Show</label>
                                    <select name="sortuserresults" class="sinput" id=""
                                        wire:model="sortingValue" wire:change='resetPage'>
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                    <label class="font-weight-normal" style="">entries</label>
                                </div>

                                <div style="position: absolute; text-align: center;" wire:loading
                                    wire:target='searchTerm,sortingValue,previousPage,gotoPage,nextPage'>
                                    <span class="bg-light" style="padding: 5px 15px; border-radius: 2px;"><span
                                            class="spinner-border spinner-border-xs align-middle" role="status"
                                            aria-hidden="true"></span> Processing</span>
                                </div>
                                <div style="text-align: right;" class="col-md-6 col-sm-12 mb-2 search_cont">
                                    <label class="font-weight-normal mr-2">Search:</label>
                                    <input type="search" class="sinput" placeholder="Search..." wire:model="searchTerm"
                                        wire:keyup='resetPage' />
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            @include('livewire.app.datatable.datatable-sorting', [
                                                'id' => 'id',
                                                'thDisplayName' => 'ID',
                                            ])
                                            @include('livewire.app.datatable.datatable-sorting', [
                                                'id' => 'url',
                                                'thDisplayName' => 'Site',
                                            ])
                                            @include('livewire.app.datatable.datatable-sorting', [
                                                'id' => 'uptime_status',
                                                'thDisplayName' => 'Uptime',
                                            ])
                                            @include('livewire.app.datatable.datatable-sorting', [
                                                'id' => 'domain_expiry_date',
                                                'thDisplayName' => 'Domain Expire',
                                            ])
                                            @include('livewire.app.datatable.datatable-sorting', [
                                                'id' => 'domain_expiry_date',
                                                'thDisplayName' => 'Remaining Days',
                                            ])
                                            @include('livewire.app.datatable.datatable-sorting', [
                                                'id' => 'certificate_status',
                                                'thDisplayName' => 'Certificate health',
                                            ])
                                            @include('livewire.app.datatable.datatable-sorting', [
                                                'id' => 'certificate_status',
                                                'thDisplayName' => 'Certificate Expire',
                                            ])
                                            @include('livewire.app.datatable.datatable-sorting', [
                                                'id' => 'uptime_last_check_date',
                                                'thDisplayName' => 'Last checked',
                                            ])
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($live_sites->count() > 0)
                                            @foreach ($live_sites as $mysite)
                                                <tr>
                                                    <td>{{ $mysite->id }}</td>
                                                    <td><a href="{{ $mysite->url }}"
                                                            target="_blank">{{ $mysite->url }}</a></td>
                                                    @if ($mysite->uptime_status == 'up')
                                                        <td class="text-center">
                                                            <a href="{{ route('app.mysites.details', ['monitor_id' => $mysite->id]) }}"
                                                                class="btn btn-success waves-effect waves-light btn-sm">{{ $mysite->uptime_status }}<i
                                                                    class="bx bx-up-arrow-alt ms-1"></i></a>
                                                        </td>
                                                    @else
                                                        <td class="text-center">
                                                            <a href="{{ route('app.mysites.details', ['monitor_id' => $mysite->id]) }}"
                                                                class="btn btn-warning waves-effect waves-light btn-sm">{{ $mysite->uptime_status }}<i
                                                                    class="bx bx-down-arrow-alt ms-1"></i></a>
                                                        </td>
                                                    @endif
                                                    <td class="text-center">{{ $mysite->domain_expiry_date }}</td>
                                                    @php
                                                        $dateTime = \Carbon\Carbon::parse($mysite->domain_expiry_date);
                                                        $now = \Carbon\Carbon::now();
                                                        $daysLeft = $now->diffInDays($dateTime);
                                                    @endphp
                                                    <td class="text-center">{{ $daysLeft }}</td>
                                                    <td class="text-center">{{ $mysite->certificate_status }}</td>

                                                    @php
                                                        $dateTime = \Carbon\Carbon::parse($mysite->certificate_expiration_date);
                                                        $now = \Carbon\Carbon::now();
                                                        $daysLeft = $now->diffInDays($dateTime);
                                                    @endphp

                                                    <td class="text-center">{{ $daysLeft }} Days</td>
                                                    <td class="text-center">{{ $mysite->uptime_last_check_date }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" class="text-center pt-5 pb-5">No lost dogs found!
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent">
                            {{ $live_sites->links('livewire.pagination-links') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
