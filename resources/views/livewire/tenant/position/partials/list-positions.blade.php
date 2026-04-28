<div>
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">Positions Management</h1>
        <p class="page-subtitle">Manage your team's positions roster and track their status</p>
    </div>

    <!-- Toolbar -->
    <div class="toolbar">
        <div class="toolbar-search">
            <div class="input-with-icon">
                <input type="text" class="input-field" placeholder="Search positions by name " wire:model.live="search">
                <span class="icon">🔍</span>
            </div>
        </div>
        <div class="toolbar-actions">
            <button class="btn btn-primary" wire:click="openModal">
                <span>➕</span> Add Position
            </button>
        </div>
    </div>

    <!-- Table Wrapper -->
    <div class="table-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Row 1 -->
                @foreach ($positions as $position)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $position->name }}</td>
                        <td>#{{ $position->code }}</td>
                        <td>
                            <div class="table-actions">
                                <button class="table-action-btn" wire:click="edit({{ $position->id }})"
                                    data-tooltip="Edit">✏️</button>
                                <button class="table-action-btn"
                                    wire:confirm="Are you sure you want to delete {{ $position->name }} position?"
                                    wire:click="delete({{ $position->id }})" data-tooltip="Delete">🗑️</button>
                            </div>
                        </td>
                    </tr>
                @endforeach

                <!-- Additional rows for pagination -->
                <div class="pagination-container">
                    {{ $positions->links() }}
                </div>
            </tbody>
        </table>
    </div>
</div>
