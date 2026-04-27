<?php

namespace App\Livewire\admin;

use App\Models\Tenant;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class TenantsMangment extends Component
{
    use WithPagination;

    public $paginationTheme = 'bootstrap';

    public function mount()
    {
        if (request()->query('action') === 'create') {
            $this->openTenantModal();
        }
    }

    public $currentStep = 1; // متغير لحفظ الخطوة الحالية

    public $trashed = false;

    public $search = '';

    public $statusFilter = '';

    public $editingTenantId;

    public $tenant_name;

    public $tenant_domain;

    public $tenant_manger_name_ar;

    public $tenant_manger_name_en;

    public $tenant_manger_email;

    public $tenant_status = false;

    public $tenant_manger_password;

    protected function rules()
    {
        return [
            'tenant_name' => 'required|min:2|regex:/^[a-zA-Z0-9\s]+$/|unique:tenants,id,'.($this->editingTenantId ?? 'NULL'),
            'tenant_manger_name_ar' => 'required|min:3',
            'tenant_manger_name_en' => 'required|min:3',
            'tenant_manger_email' => 'required|email|unique:tenants,manager_email,'.($this->editingTenantId ?? 'NULL'),
            'tenant_status' => 'required',
            'tenant_manger_password' => $this->editingTenantId ? 'nullable|min:6' : 'required|min:6',
        ];
    }

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
            'id' => $this->tenant_name ?? null,
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
        if (! $this->editingTenantId) {
            session()->flash('success', __('Tenant updated successfully!'));
            $this->reset('editingTenantId');

            return;
        }
        session()->flash('success', __('Tenant created successfully!'));

    }

    public function resetTenantForm()
    {
        $this->reset(['tenant_name', 'tenant_domain', 'tenant_status', 'currentStep', 'tenant_manger_name_ar', 'tenant_manger_name_en', 'tenant_manger_email', 'tenant_manger_password', 'editingTenantId']);
    }

    public function openTenantModal(?Tenant $tenant = null)
    {
        if (! $tenant || ! $tenant->exists) {
            $this->resetTenantForm();
            $this->dispatch('open-modal');

            return;
        }
        $this->editingTenantId = $tenant->id;
        $this->tenant_name = $tenant->id;
        $this->tenant_manger_email = $tenant->manager_email ?? '';

        $this->currentStep = 2;

        $this->tenant_domain = $tenant->domains()->first()->domain ?? '';
        $this->tenant_status = $tenant->status === 'active';
        tenancy()->initialize($tenant);
        $user = User::where('email', $this->tenant_manger_email)->first();
        $this->tenant_manger_name_ar = $user->getTranslation('name', 'ar') ?? '';
        $this->tenant_manger_name_en = $user->getTranslation('name', 'en') ?? '';

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

    public function restoreTenant($id)
    {
        $tenant = Tenant::withTrashed()->findOrFail($id);
        $tenant->restore();
        $this->resetPage();
        session()->flash('success', __('Tenant restored successfully!'));
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

    public function archiveTenant($id)
    {
        $tenant = Tenant::findOrFail($id);
        $tenant->delete();
        session()->flash('success', __('Tenant archived successfully!'));
    }

    public function deleteTenant($id)
    {
        $tenant = Tenant::withTrashed()->findOrFail($id);
        $tenant->forceDelete();
        session()->flash('success', __('Tenant deleted successfully!'));
    }

    public function forceDeleteTenant($id)
    {
        $tenant = Tenant::withTrashed()->findOrFail($id);
        $tenant->forceDelete();
        session()->flash('success', __('Tenant permanently deleted successfully!'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function updatingTrashed()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Tenant::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('id', 'like', '%'.$this->search.'%')
                    ->orWhere('manager_email', 'like', '%'.$this->search.'%');
            });
        }

        if ($this->statusFilter) {
            $query->where('status', $this->statusFilter);
        }

        if ($this->trashed) {
            $query->onlyTrashed();
        }

        return view('livewire.admin.tenants-mangment.main', [
            'tenants' => $query->paginate(3),
        ]);
    }
}
