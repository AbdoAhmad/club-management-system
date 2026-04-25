<div wire:ignore.self class="modal fade" id="addTenantModal" tabindex="-1" data-bs-backdrop="false"
    style="background-color: rgba(0,0,0,0.5); z-index: 1060 !important;" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" style="z-index: 1070 !important;">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title" tabindex="-1">{{ __('Add New Tenant') }}</h5>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>

            <form wire:submit.prevent="save">
                <div class="modal-body">
                    <div class="d-flex justify-content-around mb-4 text-center">
                        @if($editingTenantId)
                            <div class="flex-fill pb-2 text-warning fw-bold border-bottom border-warning border-2">
                                {{ __('Edit Tenant Admin Credentials') }}
                            </div>
                        @else
                        <div
                            class="flex-fill pb-2 {{ $currentStep == 1 ? 'text-warning fw-bold border-bottom border-warning border-2' : 'text-muted' }}">
                            1. {{ __('Tenant Credentials') }}
                        </div>
                        <div
                            class="flex-fill pb-2 {{ $currentStep == 2 ? 'text-warning fw-bold border-bottom border-warning border-2' : 'text-muted' }}">
                            2. {{ __('Tenant Admin Credentials') }}
                        </div>
                        @endif
                    </div>
                
                    @if ($currentStep == 1)
                        <div class="mb-3">
                            <label class="form-label fw-bold">{{ __('Tenant Name') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-building"></i></span>
                                <input type="text" wire:model.live="tenant_name" class="form-control"
                                    placeholder="{{ __('Name') }}">
                            </div>
                            @error('tenant_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <div class="mb-3">
                                <label class="form-label fw-bold">{{ __('Domain Name') }}</label>

                                <div class="input-group">
                                    <span class="input-group-text">https://</span>
                                    <input type="text" wire:model="tenant_domain" class="form-control"
                                        placeholder= 'domain.com' readonly>
                                </div>
                            </div>
                            <br>
                            {{-- Status toggle checkbox --}}
                            <div class="form-check form-switch">
                                {{-- MAKE WITH SAME STYLE OF THE PAGE --}}

                                <input class="form-check-input" type="checkbox" id="tenantStatusSwitch"
                                    wire:model.live="tenant_status" value="active">
                                <label class="form-check-label fw-bold"
                                    for="tenantStatusSwitch">{{ $tenant_status ? __('Active') : __('Inactive') }}</label>
                            </div>
                            @error('tenant_status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">{{ __('Admin Name ar') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input wire:model="tenant_manger_name_ar" type="text" class="form-control"
                                        placeholder="{{ __('Admin Name ar') }}">
                                    @error('tenant_manger_name_ar')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">{{ __('Admin Name en') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input wire:model="tenant_manger_name_en" type="text" class="form-control"
                                        placeholder="{{ __('Admin Name en') }}">
                                    @error('tenant_manger_name_en')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">{{ __('Admin Email') }}</label>
                            <div class="input-group">
                                <span class="input-group-text">@</span>
                                <input wire:model="tenant_manger_email" type="email" class="form-control"
                                    placeholder="tenant@exmple.com">
                            </div>
                            @error('tenant_manger_email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">{{ __('Admin Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input wire:model="tenant_manger_password" type="password" class="form-control"
                                    placeholder="********">
                            </div>
                            @error('tenant_manger_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif
                </div>

                <div class="modal-footer d-flex justify-content-between">
                    @if ($currentStep == 1)
                        <div></div>
                        <button type="button" class="btn btn-primary"
                            wire:click="setStep(2)">{{ __('Next Step') }}</button>
                    @else
                        <button type="button" class="btn btn-light"
                            wire:click="setStep(1)">{{ __('Back') }}</button>
                        <button type="submit" class="btn btn-success"
                            wire:click="save">{{ __('Save Tenant') }}</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
