<?php

namespace App\Livewire;
use Livewire\Attributes\Rule;
use Livewire\Component;

class TenantsMangment extends Component
{
    public $currentStep = 1; // متغير لحفظ الخطوة الحالية
    #[Rule('required|min:2|unique:tenants,id|regex:/^[a-zA-Z0-9\s]+$/')]
    public $tenant_name ;
    public $tenant_domain ;
    public function openAddTenantModal()
    {
        $this->reset(['tenant_name', 'tenant_domain', 'currentStep']);
        $this->dispatch('open-modal');

    }
    public function setStep($step)
    {
        if ($step == 2) {
            $this->validateOnly('tenant_name');
        }

        $this->currentStep = $step;
    }

    public function save()
    {
        // كود الحفظ هنا
        $this->reset('currentStep'); // تصغير الخطوات بعد الحفظ
        // إغلاق المودال
        $this->dispatch('close-modal');
    }

    public function updatedTenantName()
    {

        $this->reset('tenant_domain');
        if (!$this->tenant_name) {
            return;
        }
        $this->tenant_domain ='.com';

        $this->tenant_domain = strtolower(str_replace(' ', '-', $this->tenant_name)) . $this->tenant_domain;

    }

    public function render()
    {

        return view('livewire.tenants-mangment.main');
    }
}
