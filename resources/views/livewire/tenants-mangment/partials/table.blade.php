<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header border-0 pt-6 d-flex align-items-center justify-content-between pe-6">
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="bi bi-search position-absolute ms-3 fs-6"></i>
                        <input type="text" wire:model.live="search" class="form-control ps-10"
                            placeholder="{{ __('Search') }}" style="width: 250px; padding-inline-start: 40px;">
                    </div>
                </div>

                <div class="card-toolbar ms-auto">
                    <button type="button" wire:click="openAddTenantModal" class="btn btn-primary"
                        data-bs-toggle="modal">
                        <i class="bi bi-plus me-1 fs-6"></i> {{ __('Add Tenant') }}
                    </button>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>{{ __('Tenant Name') }}</th>
                            <th>{{ __('Domain Name') }}</th>
                            <th style="width: 40px">{{ __('Status') }}</th>
                            <th style="width: 40px">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tenants as $tenant)
                            <tr class="align-middle">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tenant->id }}</td>
                                <td>{{ $tenant->domains()->first()->domain }}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="toggleStatus-{{ $tenant->id }}"
                                            wire:click="toggleTenantStatus('{{ $tenant->id }}')"
                                            {{ $tenant->status === 'active' ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td style="width: 100px;">
                                    <div class="d-flex justify-content-center gap-2">
                                        <button class="btn btn-outline-primary btn-sm"><i
                                                class="bi bi-pencil"></i></button>
                                        <button class="btn btn-outline-danger btn-sm"><i
                                                class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
