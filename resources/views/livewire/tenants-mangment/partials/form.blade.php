<div wire:ignore.self class="modal fade" id="addTenantModal" tabindex="-1" data-bs-backdrop="false"
    style="background-color: rgba(0,0,0,0.5); z-index: 1060 !important;" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" style="z-index: 1070 !important;">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title" tabindex="-1">Add New Tenant</h5>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
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

