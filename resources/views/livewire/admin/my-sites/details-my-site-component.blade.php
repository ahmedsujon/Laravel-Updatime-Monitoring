<div>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Projects Grid</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                                <li class="breadcrumb-item active">Projects Grid</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

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
                                                ok. We last checked {{ $minutesAgo }} hour ago.</p>
                                            <h5 style="text-align: center;">EXPIRES IN 2 months from now</h5>
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

            {{-- <div class="col-xl-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-4">
                                    <div class="avatar-md">
                                        <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                            <img src="assets/images/companies/img-2.png" alt="" height="30">
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="text-truncate font-size-15"><a href="javascript: void(0);"
                                            class="text-dark">Brand logo design</a></h5>
                                    <p class="text-muted mb-4">To achieve it would be necessary</p>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 border-top">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item me-3">
                                    <span class="badge bg-warning">Pending</span>
                                </li>
                                <li class="list-inline-item me-3">
                                    <i class= "bx bx-calendar me-1"></i> 22 Oct, 19
                                </li>
                                <li class="list-inline-item me-3">
                                    <i class= "bx bx-comment-dots me-1"></i> 183
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-4">
                                    <div class="avatar-md">
                                        <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                            <img src="assets/images/companies/img-3.png" alt=""
                                                height="30">
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="text-truncate font-size-15"><a href="javascript: void(0);"
                                            class="text-dark">New Landing Design</a></h5>
                                    <p class="text-muted mb-4"> For science, music, sport, etc</p>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 border-top">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item me-3">
                                    <span class="badge bg-danger">Delay</span>
                                </li>
                                <li class="list-inline-item me-3">
                                    <i class= "bx bx-calendar me-1"></i> 13 Oct, 19
                                </li>
                                <li class="list-inline-item me-3">
                                    <i class= "bx bx-comment-dots me-1"></i> 175
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-4">
                                    <div class="avatar-md">
                                        <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                            <img src="assets/images/companies/img-4.png" alt=""
                                                height="30">
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="text-truncate font-size-15"><a href="javascript: void(0);"
                                            class="text-dark">Redesign - Landing page</a></h5>
                                    <p class="text-muted mb-4">If several languages coalesce</p>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 border-top">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item me-3">
                                    <span class="badge bg-success">Completed</span>
                                </li>
                                <li class="list-inline-item me-3">
                                    <i class= "bx bx-calendar me-1"></i> 14 Oct, 19
                                </li>
                                <li class="list-inline-item me-3">
                                    <i class= "bx bx-comment-dots me-1"></i> 202
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-4">
                                    <div class="avatar-md">
                                        <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                            <img src="assets/images/companies/img-5.png" alt=""
                                                height="30">
                                        </span>
                                    </div>
                                </div>

                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="text-truncate font-size-15"><a href="javascript: void(0);"
                                            class="text-dark">Skote Dashboard UI</a></h5>
                                    <p class="text-muted mb-4">Separate existence is a myth</p>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 border-top">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item me-3">
                                    <span class="badge bg-success">Completed</span>
                                </li>
                                <li class="list-inline-item me-3">
                                    <i class= "bx bx-calendar me-1"></i> 13 Oct, 19
                                </li>
                                <li class="list-inline-item me-3">
                                    <i class= "bx bx-comment-dots me-1"></i> 194
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-4">
                                    <div class="avatar-md">
                                        <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                            <img src="assets/images/companies/img-6.png" alt=""
                                                height="30">
                                        </span>
                                    </div>
                                </div>

                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="text-truncate font-size-15"><a href="javascript: void(0);"
                                            class="text-dark">Blog Template UI</a></h5>
                                    <p class="text-muted mb-4"> For science, music, sport, etc</p>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 border-top">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item me-3">
                                    <span class="badge bg-warning">Pending</span>
                                </li>
                                <li class="list-inline-item me-3">
                                    <i class= "bx bx-calendar me-1"></i> 24 Oct, 19
                                </li>
                                <li class="list-inline-item me-3">
                                    <i class= "bx bx-comment-dots me-1"></i> 122
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
        </div>
    </div>
</div>
</div>
