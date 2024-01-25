<div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 style="text-align: center;" class="page-title-box">
                    <a href="{{ route('app.home') }}">Back To List</a>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12" style="border: 1px solid #e9e9e9; padding: 35px 15px;">
                                    @if ($mysite->uptime_status == 'up')
                                        <h3 style="text-align: center;" class="mb-4"><i style="color: green;"
                                                class="bx bxs-up-arrow-circle"></i><a style="color: black;"
                                                href="{{ $mysite->url }}" target="_blank">{{ $mysite->url }}</a></h3>
                                    @else
                                        <h3 style="text-align: center;" class="mb-4"><i style="color: #f0ad4e;"
                                                class="bx bxs-down-arrow-circle"></i><a style="color: black;"
                                                href="{{ $mysite->url }}" target="_blank">{{ $mysite->url }}</a></h3>
                                    @endif
                                    <div class="row">
                                        @php
                                            $dateTime = \Carbon\Carbon::parse($mysite->uptime_last_check_date);
                                            $minutesAgo = $dateTime->diffInMinutes(\Carbon\Carbon::now());
                                        @endphp
                                        <div class="col-sm-12">
                                            <p style="text-align: center;" class="text-muted">Your site is
                                                {{ $mysite->uptime_status }}. We last
                                                checked less than {{ $minutesAgo }} minute ago.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" style="border: 1px solid #e9e9e9; padding: 35px 15px;">
                                    @if ($mysite->uptime_status == 'up')
                                        <h3 style="text-align: center;" class="mb-4"><i style="color: green;"
                                                class="bx bxs-up-arrow-circle"></i>{{ $mysite->uptime_status }}</h3>
                                    @else
                                        <h3 style="text-align: center;" class="mb-4"><i style="color: #f0ad4e;"
                                                class="bx bxs-down-arrow-circle"></i>{{ $mysite->uptime_status }}</h3>
                                    @endif
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p style="text-align: center;" class="text-muted">Your site is
                                                {{ $mysite->uptime_status }}. We last
                                                checked less than {{ $minutesAgo }} minute ago.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" style="border: 1px solid #e9e9e9; padding: 35px 15px;">
                                    <h3 style="text-align: center;" class="mb-4"><i style="color: green;"
                                            class="bx bxs-up-arrow-circle"></i>Performance</h3>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p style="text-align: center;" class="text-muted">We're monitoring the
                                                performance of your site. Your site is fast. We last checked
                                                {{ $minutesAgo }} minutes
                                                ago.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" style="border: 1px solid #e9e9e9; padding: 35px 15px;">
                                    <h3 style="text-align: center;" class="mb-4"><i style="color: green;"
                                            class="bx bxs-up-arrow-circle"></i>Certificate health</h3>
                                    <div class="row">

                                        @php
                                            $dateTime = \Carbon\Carbon::parse($mysite->certificate_expiration_date);
                                            $now = \Carbon\Carbon::now();
                                            $daysLeft = $now->diffInDays($dateTime);
                                        @endphp

                                        <div class="col-sm-12">
                                            <p style="text-align: center;" class="text-muted">Your site is up. We last
                                                checked less than {{ $minutesAgo }} minute ago.</p>
                                            <h5 style="text-align: center;">EXPIRES IN {{ $daysLeft }} days left
                                                from now</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" style="border: 1px solid #e9e9e9; padding: 35px 15px;">
                                    <h3 style="text-align: center;" class="mb-4"><i style="color: green;"
                                            class="bx bxs-up-arrow-circle"></i>Domain</h3>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p style="text-align: center;" class="text-muted">Your domain seems to be
                                                ok. We last checked {{ $minutesAgo }} min ago.</p>
                                            @php
                                                $dateTime = \Carbon\Carbon::parse($mysite->domain_expiry_date);
                                                $now = \Carbon\Carbon::now();
                                                $daysLeft = $now->diffInDays($dateTime);
                                            @endphp
                                            <h5 style="text-align: center;">EXPIRES IN {{ $daysLeft }} days from now</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" style="border: 1px solid #e9e9e9; padding: 35px 15px;">
                                    <h3 style="text-align: center;" class="mb-4"><i style="color: green;"
                                            class="bx bxs-up-arrow-circle"></i>Certificate Issuer</h3>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p style="text-align: center;" class="text-muted">Your site is up. We last
                                                checked less than {{ $minutesAgo }} minute ago.</p>
                                            <h5 style="text-align: center;">CERTIFICATE ISSUER:
                                                {{ $mysite->certificate_issuer }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" style="border: 1px solid #e9e9e9; padding: 35px 15px;">
                                    <h3 style="text-align: center;" class="mb-4"><i style="color: green;"
                                            class="bx bxs-up-arrow-circle"></i>Last Check Time</h3>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p style="text-align: center;" class="text-muted">Your site is up. We last
                                                checked less than {{ $minutesAgo }} minute ago.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
