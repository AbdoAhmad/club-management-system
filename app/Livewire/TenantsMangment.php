<?php

namespace App\Livewire;

use App\Models\Tenant;
use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;

class TenantsMangment extends Component
{
    public $currentStep = 1; // متغير لحفظ الخطوة الحالية

    #[Rule('required|min:2|unique:tenants,id|regex:/^[a-zA-Z0-9\s]+$/')]
    public $tenant_name;

    public $tenant_domain;

    #[Rule('required|min:3')]
    public $tenant_manger_name_ar;

    #[Rule('required|min:3')]
    public $tenant_manger_name_en;

    #[Rule('required|email|unique:tenants,manager_email')]
    public $tenant_manger_email;

    #[Rule('required|in:active,inactive')]
    public $tenant_status;

    #[Rule('required|min:8')]
    public $tenant_manger_password;

    public function save()
    {

        $statusValue = $this->tenant_status ? 'active' : 'inactive';
        $this->validate();

        $tenant = Tenant::create([
            'id' => $this->tenant_name,
            'manager_email' => $this->tenant_manger_email,
            'status' => $statusValue,
        ]);

        $tenant->domains()->create([
            'domain' => $this->tenant_domain,
        ]);

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
        tenancy()->initialize($tenant);

        User::create([
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

    }

    public function openAddTenantModal()
    {
        $this->reset(['tenant_name', 'tenant_domain', 'tenant_status', 'currentStep']);
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
