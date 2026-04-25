<?php

namespace App\Livewire;

use App\Models\Tenant;
use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;

class TenantsMangment extends Component
{
    public $currentStep = 1; // متغير لحفظ الخطوة الحالية

    public Tenant $tenant;

    #[Rule('required|min:2|unique:tenants,id|regex:/^[a-zA-Z0-9\s]+$/')]
    public $tenant_name;

    public $tenant_domain;

    #[Rule('required|min:3')]
    public $tenant_manger_name_ar;

    #[Rule('required|min:3')]
    public $tenant_manger_name_en;

    #[Rule('required|email|unique:tenants,manager_email')]
    public $tenant_manger_email;

    #[Rule('required')]
    public $tenant_status;

    #[Rule('required|min:8')]
    public $tenant_manger_password;

    public function toggleTenantStatus(Tenant $tenant)
    {
        $tenant->status = $tenant->status === 'active' ? 'inactive' : 'active';
        $tenant->save();
        session()->flash('success', __('Tenant :tenant status updated to :status successfully!', ['tenant' => $tenant->id, 'status' => $tenant->status]));
    }

    public function save()
    {

        $statusValue = $this->tenant_status ? 'active' : 'inactive';
        $this->validate();

        $tenant = Tenant::updateorCreate([
            'id' => $this->editingTenant->id ?? null,
        ], [
            'manager_email' => $this->tenant_manger_email,
            'status' => $statusValue,
        ]);
        $tenant->domains()->updateOrCreate([
            'domain' => $this->tenant_domain,
        ]);
        tenancy()->initialize($tenant);
        User::updateOrCreate([
            'email' => $this->tenant_manger_email,
        ], [
            'name' => [
                'en' => $this->tenant_manger_name_en,
                'ar' => $this->tenant_manger_name_ar,
            ],
            'email' => $this->tenant_manger_email,
            'password' => bcrypt($this->tenant_manger_password),
        ]);
        tenancy()->end();
        $this->reset(['tenant_name', 'tenant_domain', 'tenant_manger_name_ar', 'tenant_manger_name_en', 'tenant_manger_email', 'tenant_manger_password']);
        $this->reset('currentStep');
        $this->dispatch('close-modal');
        session()->flash('success', __('Tenant created successfully!'));

        // if ($this->editingTenant->exists) {
        //     $this->editingTenant->update([
        //         'manager_email' => $this->tenant_manger_email,
        //         'status' => $this->tenant_status ? 'active' : 'inactive',
        //     ]);
        //     tenancy()->initialize($this->editingTenant);
        //     $user = User::where('email', $this->tenant_manger_email)->first();
        //     if ($user) {
        //         $user->update([
        //             'name' => [
        //                 'en' => $this->tenant_manger_name_en,
        //                 'ar' => $this->tenant_manger_name_ar,
        //             ],
        //             'email' => $this->tenant_manger_email,
        //             'password' => bcrypt($this->tenant_manger_password),
        //         ]);
        //     }

        //     tenancy()->end();

        //     session()->flash('success', __('Tenant updated successfully!'));
        //     $this->reset('editingTenant');
        //     $this->dispatch('close-modal');

        //     return;
        // }

        // $tenant->domains()->create([
        //     'domain' => $this->tenant_domain,
        // ]);

        // $tenant->run(function () {
        //     User::create([
        //         'name' => [
        //             'en' => $this->tenant_manger_name_en,
        //             'ar' => $this->tenant_manger_name_ar,
        //         ],
        //         'email' => $this->tenant_manger_email,
        //         'password' => bcrypt($this->tenant_manger_password),
        //     ]);
        // });
        // tenancy()->initialize($tenant);

        // User::create([
        //     'name' => [
        //         'en' => $this->tenant_manger_name_en,
        //         'ar' => $this->tenant_manger_name_ar,
        //     ],
        //     'email' => $this->tenant_manger_email,
        //     'password' => bcrypt($this->tenant_manger_password),
        // ]);
        // tenancy()->end();

        // $this->reset(['tenant_name', 'tenant_domain', 'tenant_manger_name_ar', 'tenant_manger_name_en', 'tenant_manger_email', 'tenant_manger_password']);
        // $this->reset('currentStep');
        // $this->dispatch('close-modal');
        // session()->flash('success', __('Tenant created successfully!'));

    }

    public function openTenantModal(Tenant $tenant)
    {
        if (! $tenant) {
            $this->reset(['tenant_name', 'tenant_domain', 'tenant_status', 'currentStep', 'tenant_manger_name_ar', 'tenant_manger_name_en', 'tenant_manger_email', 'tenant_manger_password']);
            $this->dispatch('open-modal');

            return;
        }
        $this->isEditMode = true;
        $this->tenant_name = $tenant->id;
        $this->tenant_manger_email = $tenant->manager_email ?? '';

        $this->tenant_domain = $tenant->domains()->first()->domain ?? '';
        $this->tenant_status = $tenant->status === 'active';
        tenancy()->initialize($this->editingTenant);
        $user = User::where('email', $this->tenant_manger_email)->first();
        $this->tenant_manger_name_ar = $user->getTranslations('name', 'ar') ?? '';
        $this->tenant_manger_name_en == $user->getTranslations('name', 'en') ?? '';

        tenancy()->end();

        // $this-> tenant
        $this->dispatch('open-modal');

    }

    public function setStep($step)
    {
        if ($step == 2) {
            $this->validateOnly('tenant_name');
        }

        $this->currentStep = $step;
    }

    public function updatedTenantName()
    {

        $this->reset('tenant_domain');
        if (! $this->tenant_name) {
            return;
        }
        $this->tenant_domain = '.localhost';

        $this->tenant_domain = strtolower(str_replace(' ', '-', $this->tenant_name)).$this->tenant_domain;

    }

    public function render()
    {

        return view('livewire.tenants-mangment.main', [
            'tenants' => Tenant::all(),
        ]);
    }
}
