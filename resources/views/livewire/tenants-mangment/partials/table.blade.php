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

                <div class="card-toolbar ms-auto d-flex align-items-center gap-3">
                    {{-- filter by status --}}
                    <div class="position-relative">
                        <select wire:model.live="statusFilter" class="form-select">
                            <option value="">{{ __('All Status') }}</option>
                            <option value="active">{{ __('Active') }}</option>
                            <option value="inactive">{{ __('Inactive') }}</option>
                        </select>
                    </div>
                    <div class="position-relative">
                        <label for="toggleTrashed"
                            class="btn {{ $trashed ? 'btn-light-danger' : 'btn-light-secondary' }} d-flex align-items-center gap-2 cursor-pointer transition-all">
                            <input type="checkbox" id="toggleTrashed" wire:model.live="trashed" class="d-none">

                            @if ($trashed)
                                <i class="bi bi-collection-fill fs-6"></i>
                                <span>{{ __('Show All') }}</span>
                            @else
                                <i class="bi bi-archive fs-6"></i>
                                <span>{{ __('Archived') }}</span>
                            @endif
                        </label>
                    </div>

                    <button type="button" wire:click="openTenantModal"
                        class="btn btn-primary d-flex align-items-center shadow-sm">
                        <i class="bi bi-plus-lg me-2 fs-6"></i>
                        <span>{{ __('Add Tenant') }}</span>
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
                                </td>
                                <td>
                                    @if ($tenant->deleted_at)
                                        <span class="badge bg-danger">{{ __('Archived') }}</span>
                                    @else
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox"
                                            id="toggleStatus-{{ $tenant->id }}"
                                            wire:click="toggleTenantStatus('{{ $tenant->id }}')"
                                            {{ $tenant->status === 'active' ? 'checked' : '' }}>
                                    </div>
                                    @endif
                                </td>
                                <td style="width: 100px;">
                                    @if ($tenant->deleted_at)
                                        <div class="d-flex justify-content-center gap-2">
                                            <button class="btn btn-outline-success btn-sm"
                                                wire:confirm="{{ __('Are you sure you want to restore this tenant?') }}"
                                                wire:click="restoreTenant('{{ $tenant->id }}')"><i
                                                    class="bi bi-arrow-clockwise"></i></button>

                                            <button class="btn btn-outline-danger btn-sm"
                                                wire:confirm="{{ __('Are you sure you want to permanently delete this tenant?') }}"
                                                wire:click="forceDeleteTenant('{{ $tenant->id }}')"><i
                                                    class="bi bi-x-lg"></i></button>
                                        </div>
                                    @else
                                    <div class="d-flex justify-content-center gap-2">
                                        <button type ="button" class="btn btn-outline-primary btn-sm"
                                            wire:click="openTenantModal('{{ $tenant->id }}')">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="btn btn-outline-warning btn-sm"
                                            wire:confirm="{{ __('Are you sure you want to archive this tenant?') }}"
                                            wire:click="archiveTenant('{{ $tenant->id }}')"><i
                                                class="bi bi-archive"></i></button>

                                        <button class="btn btn-outline-danger btn-sm"
                                            wire:confirm="{{ __('Are you sure you want to delete this tenant?') }}"
                                            wire:click="deleteTenant('{{ $tenant->id }}')"><i
                                                class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                    @endif
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="mt-4 pt-3 border-top">
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="text-muted small">
                            {{ $tenants->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
