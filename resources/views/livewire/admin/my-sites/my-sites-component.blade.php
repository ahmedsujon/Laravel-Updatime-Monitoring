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
                    <div class="card">
                        <div class="card-header bg-white" style="border-bottom: 1px solid #e2e2e7;">
                            <h4 class="card-title" style="float: left;">My Site List</h4>
                            <button class="btn btn-sm btn-dark waves-effect waves-light" data-bs-toggle="modal"
                                data-bs-target="#addDataModal" style="float: right;"><i class="bx bx-plus"></i> Add
                                Admin</button>
                            <button type="button" wire:click="$refresh"
                                class="btn btn-sm btn-dark waves-effect waves-light"
                                style="float: right; margin-right: 5px;"><i class="bx bx-plus"></i>Refresh</button>

                            <button type="button" wire:click="downTimeNotification"
                                class="btn btn-sm btn-dark waves-effect waves-light"
                                style="float: right; margin-right: 5px;"><i class="bx bx-plus"></i>Run Work</button>
                        </div>
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

                                <div class="col-md-6 col-sm-12 mb-2 search_cont">
                                    <label class="font-weight-normal mr-2">Search:</label>
                                    <input type="search" class="sinput" placeholder="Search..." wire:model="searchTerm"
                                        wire:keyup='resetPage' />
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            @include('livewire.admin.datatable.datatable-sorting', [
                                                'id' => 'id',
                                                'thDisplayName' => 'ID',
                                            ])
                                            @include('livewire.admin.datatable.datatable-sorting', [
                                                'id' => 'url',
                                                'thDisplayName' => 'Site',
                                            ])
                                            @include('livewire.admin.datatable.datatable-sorting', [
                                                'id' => 'uptime_status',
                                                'thDisplayName' => 'Uptime',
                                            ])
                                            @include('livewire.admin.datatable.datatable-sorting', [
                                                'id' => 'domain_expiry_date',
                                                'thDisplayName' => 'Domain Expire',
                                            ])
                                            @include('livewire.admin.datatable.datatable-sorting', [
                                                'id' => 'domain_expiry_date',
                                                'thDisplayName' => 'Remaining Days',
                                            ])
                                            @include('livewire.admin.datatable.datatable-sorting', [
                                                'id' => 'certificate_status',
                                                'thDisplayName' => 'Certificate health',
                                            ])
                                            @include('livewire.admin.datatable.datatable-sorting', [
                                                'id' => 'certificate_status',
                                                'thDisplayName' => 'Certificate Expire',
                                            ])
                                            @include('livewire.admin.datatable.datatable-sorting', [
                                                'id' => 'uptime_last_check_date',
                                                'thDisplayName' => 'Last checked',
                                            ])
                                            <th class="align-middle text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($mysites->count() > 0)
                                            @foreach ($mysites as $mysite)
                                                <tr>
                                                    <td>{{ $mysite->id }}</td>
                                                    <td><a href="{{ $mysite->url }}"
                                                            target="_blank">{{ $mysite->url }}</a></td>
                                                    @if ($mysite->uptime_status == 'up')
                                                        <td class="text-center">
                                                            <a href="{{ route('admin.mysites.details', ['monitor_id' => $mysite->id]) }}"
                                                                class="btn btn-success waves-effect waves-light btn-sm">{{ $mysite->uptime_status }}<i
                                                                    class="bx bx-up-arrow-alt ms-1"></i></a>
                                                        </td>
                                                    @else
                                                        <td class="text-center">
                                                            <a href="{{ route('admin.mysites.details', ['monitor_id' => $mysite->id]) }}"
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
                                                    <td class="text-center">{{ $daysLeft }} Days Left</td>
                                                    <td class="text-center">{{ $mysite->certificate_status }}</td>

                                                    @php
                                                        $dateTime = \Carbon\Carbon::parse($mysite->certificate_expiration_date);
                                                        $now = \Carbon\Carbon::now();
                                                        $daysLeft = $now->diffInDays($dateTime);
                                                    @endphp

                                                    <td class="text-center">{{ $daysLeft }} Days</td>
                                                    <td class="text-center">{{ $mysite->uptime_last_check_date }}</td>
                                                    <td class="text-center">
                                                        <button
                                                            class="btn btn-sm btn-soft-primary waves-effect waves-light action-btn edit_btn"
                                                            wire:click.prevent='editData({{ $mysite->id }})'
                                                            wire:loading.attr='disabled'>
                                                            <i
                                                                class="mdi mdi-square-edit-outline font-size-13 align-middle"></i>
                                                        </button>
                                                        <button
                                                            class="btn btn-sm btn-soft-danger waves-effect waves-light action-btn delete_btn"
                                                            wire:click.prevent='deleteConfirmation({{ $mysite->id }})'
                                                            wire:loading.attr='disabled'>
                                                            <i class="bx bx-trash font-size-13 align-middle"></i>
                                                        </button>
                                                    </td>
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
                            {{ $mysites->links('livewire.pagination-links') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Add Data Modal -->
    <div wire:ignore.self class="modal fade" id="addDataModal" tabindex="-1" role="dialog" data-bs-backdrop="static"
        data-bs-keyboard="false" aria-labelledby="modelTitleId">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: white;">
                    <h5 class="modal-title m-0" id="mySmallModalLabel">Add New Site</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-11">
                            <form wire:submit.prevent='storeData' enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="example-number-input" class="col-form-label">URL</label>
                                        <input class="form-control mb-2" type="text" wire:model="domain"
                                            placeholder="https://intrigueit.com/">
                                        @error('domain')
                                            <p class="text-danger" style="font-size: 11.5px;">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row mt-4">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light w-50">
                                            {!! loadingStateWithText('storeData', 'Start Monitoring') !!}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Data Modal -->
    <div wire:ignore.self class="modal fade" id="editDataModal" tabindex="-1" role="dialog"
        data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="modelTitleId">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: white;">
                    <h5 class="modal-title m-0" id="mySmallModalLabel">Edit Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click.prevent='close'></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-11">
                            <form wire:submit.prevent='updateData'>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="example-number-input" class="col-form-label">URL</label>
                                        <input class="form-control mb-2" type="text" wire:model="domain"
                                            placeholder="https://intrigueit.com/">
                                        @error('domain')
                                            <p class="text-danger" style="font-size: 11.5px;">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row mt-4">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light w-50">
                                            {!! loadingStateWithText('updateData', 'Update Monitoring') !!}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Edit Data Modal -->

    <!-- Delete Modal -->
    <div wire:ignore.self class="modal fade" id="deleteDataModal" tabindex="-1" role="dialog"
        aria-labelledby="modelTitleId">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-md" role="document">
            <div class="modal-content p-5 bg-transparent border-0">
                <div class="modal-body pt-4 pb-4 bg-white" style="border-radius: 10px;">
                    <div class="row justify-content-center mb-2">
                        <div class="col-md-11 text-center">
                            <div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
                                <div class="swal2-icon-content">!</div>
                            </div>
                            <h2>Are you sure?</h2>
                            <p class="mb-4">You won't be able to revert this!</p>

                            <button type="button" class="btn btn-sm btn-success waves-effect waves-light"
                                wire:click.prevent='deleteData' wire:loading.attr='disabled'>
                                {!! loadingStateWithText('deleteData', 'Yes, Delete.') !!}
                            </button>
                            <button type="button" class="btn btn-sm btn-danger waves-effect waves-light"
                                data-bs-dismiss="modal">No, Cancel.</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Modal -->
</div>

@push('scripts')
    <script>
        window.addEventListener('showEditModal', event => {
            $('#editDataModal').modal('show');
        });
        window.addEventListener('closeModal', event => {
            $('#addDataModal').modal('hide');
            $('#editDataModal').modal('hide');
        });

        window.addEventListener('monitor_deleted', event => {
            $('#deleteDataModal').modal('hide');
            Swal.fire(
                "Deleted!",
                "The admin has been deleted.",
                "success"
            );
        });
    </script>
@endpush
