<div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">My Sites</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">My Sites</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <input wire:model="domain" type="text" placeholder="Enter domain">
                    <button wire:click="getExpirationDate">Get Expiration Date</button>

                    <div>
                        @if ($expirationDate)
                            <p>Expiration Date: {{ $expirationDate }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
