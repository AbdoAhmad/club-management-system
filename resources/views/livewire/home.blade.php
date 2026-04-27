<div>
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">{{ __('Dashboard') }} - Elite FC Admin</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Dashboard') }}</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!-- Stats Row -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box shadow-lg">
                        <span class="info-box-icon text-bg-primary elevation-1">
                            <i class="bi bi-building-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('Total Clubs') }}</span>
                            <span class="info-box-number">
                                {{ $totalTenants }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box shadow-lg">
                        <span class="info-box-icon text-bg-success elevation-1">
                            <i class="bi bi-check-circle-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('Active Clubs') }}</span>
                            <span class="info-box-number">{{ $activeTenants }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box shadow-lg">
                        <span class="info-box-icon text-bg-warning elevation-1">
                            <i class="bi bi-archive-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('Archived Clubs') }}</span>
                            <span class="info-box-number">{{ $archivedTenants }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box shadow-lg">
                        <span class="info-box-icon text-bg-danger elevation-1">
                            <i class="bi bi-people-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('Total Managers') }}</span>
                            <span class="info-box-number">{{ $totalTenants }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Row -->
            <div class="row mt-4">
                <!-- Recent Tenants -->
                <div class="col-md-8">
                    <div class="card shadow-lg border-0 h-100">
                        <div class="card-header border-0 bg-transparent py-3">
                            <h3 class="card-title fw-bold">
                                <i class="bi bi-list-stars me-2 text-primary"></i> {{ __('Recent Clubs') }}
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                                    <i class="bi bi-dash-lg"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="ps-4">{{ __('Club Name') }}</th>
                                            <th>{{ __('Manager Email') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th class="text-end pe-4">{{ __('Created At') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($recentTenants as $tenant)
                                        <tr>
                                            <td class="ps-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-circle me-3 bg-primary-subtle text-primary fw-bold">
                                                        {{ strtoupper(substr($tenant->id, 0, 1)) }}
                                                    </div>
                                                    <div>
                                                        <div class="fw-bold">{{ $tenant->id }}</div>
                                                        <div class="small text-muted">{{ $tenant->domains->first()->domain ?? '' }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $tenant->manager_email }}</td>
                                            <td>
                                                <span class="badge {{ $tenant->status === 'active' ? 'text-bg-success' : 'text-bg-warning' }}">
                                                    {{ __($tenant->status === 'active' ? 'Active' : 'Inactive') }}
                                                </span>
                                            </td>
                                            <td class="text-end pe-4 small text-muted">
                                                {{ $tenant->created_at->diffForHumans() }}
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center py-4 text-muted">
                                                {{ __('No clubs found') }}
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent text-center border-0 py-3">
                            <a href="{{ route('tenant') }}" class="btn btn-outline-primary btn-sm px-4 rounded-pill">{{ __('Manage All Clubs') }}</a>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions & Stats -->
                <div class="col-md-4">
                    <div class="card shadow-lg border-0 mb-4 bg-primary text-white premium-gradient">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-3">{{ __('System Overview') }}</h4>
                            <p class="opacity-75 mb-4">{{ __('Manage your football club network from one central dashboard.') }}</p>
                            <div class="d-grid">
                                <a href="{{ route('tenant') }}" class="btn btn-light fw-bold py-2 rounded-3 text-primary">{{ __('Add New Club') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-lg border-0">
                        <div class="card-header border-0 bg-transparent py-3">
                            <h3 class="card-title fw-bold">{{ __('Growth Stats') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="fw-bold">{{ __('Active Ratio') }}</span>
                                    <span class="text-primary fw-bold">{{ $totalTenants > 0 ? round(($activeTenants / $totalTenants) * 100) : 0 }}%</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-primary" style="width: {{ $totalTenants > 0 ? ($activeTenants / $totalTenants) * 100 : 0 }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->

    <style>
        .avatar-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }
        .premium-gradient {
            background: linear-gradient(135deg, #C59B27 0%, #A37F1C 100%) !important;
            border: none !important;
        }
        .info-box {
            transition: transform 0.3s ease;
        }
        .info-box:hover {
            transform: translateY(-5px);
        }
    </style>
</div>
