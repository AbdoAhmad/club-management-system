<div>
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">Skills Management</h1>
        <p class="page-subtitle">Manage your team's skill roster and track their status</p>
    </div>

    <!-- Toolbar -->
    <div class="toolbar">
        <div class="toolbar-search">
            <div class="input-with-icon">
                <input type="text" class="input-field" placeholder="Search skills by name, level, or category..."
                    data-table-search>
                <span class="icon">🔍</span>
            </div>
        </div>
        <div class="toolbar-actions">
            <button class="btn btn-primary">
                <span>➕</span> Add Skill
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
                    <th>Icon</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Row 1 -->
                @foreach ($skills as $skill)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $skill->name }}</td>
                        <td>
                            @if($skill->hasMedia('skills'))
                                <img src="{{ $skill->getFirstMediaUrl('skills') }}" 
                                     alt="{{ $skill->name }}" 
                                     style="width: 45px; height: 45px; border-radius: 10px; object-fit: cover; border: 1px solid rgba(255,255,255,0.1); box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                            @else
                                <div style="width: 45px; height: 45px; border-radius: 10px; background: rgba(255,255,255,0.05); display: flex; align-items: center; justify-content: center;">
                                    <span style="font-size: 10px; color: rgba(255,255,255,0.3);">No Icon</span>
                                </div>
                            @endif
                        </td>
                        <td>
                            <div class="table-actions">
                                <button class="table-action-btn" data-tooltip="Edit">✏️</button>
                                <button class="table-action-btn" data-tooltip="Delete">🗑️</button>
                            </div>
                        </td>
                    </tr>
                @endforeach

                <!-- Additional rows for pagination -->

            </tbody>
        </table>

        {{-- <!-- Pagination -->
        <div class="pagination-wrapper">
            <div class="pagination-info" data-pagination="info">Showing 1 to 10 of 15</div>
            <div class="pagination-controls">
                <button class="pagination-btn" data-pagination="prev">← Previous</button>
                <button class="pagination-btn" data-pagination="next">Next →</button>
            </div>
        </div> --}}
    </div>
</div>
