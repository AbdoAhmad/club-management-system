@push('styles')
    <style>
        /* Custom styles for the modal */
        .btn-close:focus {
            outline: none !important;
            box-shadow: none !important;
        }
    </style>
@endpush
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header border-0 pt-6 d-flex align-items-center justify-content-between pe-6">
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="bi bi-search position-absolute ms-3 fs-6"></i>
                        <input type="text" wire:model.live="search" class="form-control ps-10"
                            placeholder="Search Tenant" style="width: 250px; padding-left: 40px;">
                    </div>
                </div>

                <div class="card-toolbar ms-auto">
                    <button type="button" wire:click="openAddTenantModal" class="btn btn-primary"
                        data-bs-toggle="modal">
                        <i class="bi bi-plus me-1 fs-6"></i> Add Tenant
                    </button>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">No.</th>
                            <th>Tenant Name</th>
                            <th>Domain Name</th>
                            <th style="width: 40px">Status</th>
                            <th style="width: 40px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="align-middle">
                            <td>1.</td>
                            <td>Update software</td>
                            <td>
                                <div class="progress progress-xs">
                                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                </div>
                            </td>
                            <td><span class="badge text-bg-danger">55%</span></td>
                            <td style="width: 100px;">
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></button>
                                    <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="addTenantModal" tabindex="-1" data-bs-backdrop="false"
    style="background-color: rgba(0,0,0,0.5); z-index: 1060 !important;" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" style="z-index: 1070 !important;">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title" tabindex="-1">Add New Tenant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form wire:submit.prevent="save">
                <div class="modal-body">
                    <div class="d-flex justify-content-around mb-4 text-center">
                        <div
                            class="flex-fill pb-2 {{ $currentStep == 1 ? 'text-warning fw-bold border-bottom border-warning border-2' : 'text-muted' }}">
                            1. Tenant Credentials
                        </div>
                        <div
                            class="flex-fill pb-2 {{ $currentStep == 2 ? 'text-warning fw-bold border-bottom border-warning border-2' : 'text-muted' }}">
                            2. Tenant Admin Credentials
                        </div>
                    </div>

                    @if ($currentStep == 1)
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tenant Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-building"></i></span>
                                <input type="text" wire:model.live="tenant_name" class="form-control"
                                    placeholder="Name">
                            </div>
                            @error('tenant_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Domain Name</label>

                                <div class="input-group">
                                    <span class="input-group-text">https://</span>
                                    <input type="text" wire:model="tenant_domain" class="form-control"
                                        placeholder= 'domain.com' readonly>

                                </div>
                            </div>
                        </div>
                    @else
                        <div class="mb-3">
                            <label class="form-label fw-bold">Domain Name</label>
                            <div class="input-group">
                                <span class="input-group-text">https://</span>
                                <input type="text" class="form-control" placeholder="domain.com">
                            </div>
                        </div>
                    @endif
                </div>

                <div class="modal-footer d-flex justify-content-between">
                    @if ($currentStep == 1)
                        <div></div>
                        <button type="button" class="btn btn-primary" wire:click="setStep(2)">Next Step</button>
                    @else
                        <button type="button" class="btn btn-light" wire:click="setStep(1)">Back</button>
                        <button type="submit" class="btn btn-success">Save Tenant</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        // عشان لو عملت Submit المودال يقفل لوحده
        window.addEventListener('close-modal', event => {
            var myModal = bootstrap.Modal.getInstance(document.getElementById('addTenantModal'));
            myModal.hide();
        });


        window.addEventListener('open-modal', event => {
            var myModal = new bootstrap.Modal(document.getElementById('addTenantModal'));
            document.querySelector('#addTenantModal input').focus();
            myModal.show();
        });
        // close when click outside modal
        document.getElementById('addTenantModal').addEventListener('click', function(
            event) {
            if (event.target === this) {
                var myModal = bootstrap.Modal.getInstance(document.getElementById('addTenantModal'));
                myModal.hide();
            }
        });
    </script>
@endpush
