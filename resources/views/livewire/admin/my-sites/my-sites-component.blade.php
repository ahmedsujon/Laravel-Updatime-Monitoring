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
                                            <th class="align-middle">ID</th>
                                            <th class="align-middle">Site</th>
                                            <th class="align-middle">SSL Issuer</th>
                                            <th class="align-middle text-center">Uptime</th>
                                            <th class="align-middle text-center">Certificate health</th>
                                            <th class="align-middle text-center">Last checked</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        @if ($mysites->count() > 0)
                                            @foreach ($mysites as $mysite)
                                                <tr>
                                                    <td>{{ $mysite->id }}</td>
                                                    <td>{{ $mysite->url }}</td>
                                                    <td>{{ $mysite->certificate_issuer }}</td>
                                                    <td class="text-center">
                                                        @if ($mysite->uptime_status == 'up')
                                                            <a href="{{ route('admin.mysites.details', ['id' => $mysite->id]) }}"
                                                                class="btn btn-success waves-effect waves-light btn-sm">{{ $mysite->uptime_status }}<i
                                                                    class="bx bx-up-arrow-alt ms-1"></i></a>
                                                    </td>
                                                @else
                                                    <a href="#"
                                                        class="btn btn-warning waves-effect waves-light btn-sm">{{ $mysite->uptime_status }}<i
                                                            class="bx bx-down-arrow-alt ms-1"></i></a></td>
                                            @endif
                                            <td class="text-center">{{ $mysite->certificate_status }}</td>
                                            <td class="text-center">{{ $mysite->uptime_last_check_date }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-center pt-5 pb-5">No my sites found!</td>
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

        window.addEventListener('admin_deleted', event => {
            $('#deleteDataModal').modal('hide');
            Swal.fire(
                "Deleted!",
                "The admin has been deleted.",
                "success"
            );
        });
    </script>
@endpush
