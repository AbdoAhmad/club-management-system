<?php

namespace App\Livewire\admin;

use App\Models\Tenant;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $totalTenants = Tenant::count();
        $activeTenants = Tenant::where('status', 'active')->count();
        $archivedTenants = Tenant::onlyTrashed()->count();
        $recentTenants = Tenant::latest()->take(5)->get();

        return view('livewire.home', [
            'totalTenants' => $totalTenants,
            'activeTenants' => $activeTenants,
            'archivedTenants' => $archivedTenants,
            'recentTenants' => $recentTenants,
        ]);
    }
}
