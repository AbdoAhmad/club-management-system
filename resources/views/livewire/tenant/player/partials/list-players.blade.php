<div>
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">Players Management</h1>
        <p class="page-subtitle">Manage your team's player roster and track their status</p>
    </div>

    <!-- Toolbar -->
    <div class="toolbar">
        <div class="toolbar-search">
            <div class="input-with-icon">
                <input type="text" class="input-field" placeholder="Search players by name, position, or number..."
                    data-table-search>
                <span class="icon">🔍</span>
            </div>
        </div>
        <div class="toolbar-filters">
            <select class="input-field" style="width: 150px;" data-table-filter="status">
                <option value="">All Status</option>
                <option value="Active">Active</option>
                <option value="Injured">Injured</option>
                <option value="Banned">Banned</option>
            </select>
            <select class="input-field" style="width: 150px;" data-table-filter="position">
                <option value="">All Positions</option>
                <option value="Goalkeeper">Goalkeeper</option>
                <option value="Defender">Defender</option>
                <option value="Midfielder">Midfielder</option>
                <option value="Forward">Forward</option>
            </select>
        </div>
        <div class="toolbar-actions">
            <button class="btn btn-primary">
                <span>➕</span> Add Player
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
                    <th>Image</th>
                    <th>Age</th>
                    <th>Jersey</th>
                    <th>Status</th>
                    <th>Positions</th>
                    <th>Skills</th>
                    <th>Height</th>
                    <th>Weight</th>
                    <th>Joined</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Row 1 -->
                @forelse($players as $player)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $player->name }}</td>

                        <td>
                            @if ($player->getFirstMedia('player_image'))
                                <img src="{{ $player->getFirstMediaUrl('player_image') }}" alt="Player Image"
                                    style="width: 45px; height: 45px; border-radius: 10px; object-fit: cover; border: 1px solid rgba(255,255,255,0.1); box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                            @else
                                <div
                                    class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center text-gray-600">
                                    👤
                                </div>
                            @endif
                        </td>


                        <td>{{ $player->age }}</td>

                        <td>{{ $player->jersey_number }}</td>

                        <td>
                            <span
                                class="badge bg-{{ $player->status === 'active' ? 'success' : ($player->status === 'banned' ? 'danger' : 'warning') }} text-white">
                                {{ ucfirst($player->status) }}
                            </span>
                        </td>

                        <td>
                            @foreach ($player->positions as $position)
                                {{-- Badges types success, warning, danger, info  --}}
                                <span
                                    class="badge bg-{{ $position->pivot->position_level === 'primary' ? 'success' : 'info' }} text-white">
                                    {{ $position->name }}
                                </span>
                            @endforeach

                        </td>
                        <td>
                            @foreach ($player->skills as $skill)
                                {{-- Badges types success, warning, danger, info  --}}
                                <span
                                    class="badge bg-{{ $skill->pivot->skill_level_type === 'percentage' ? 'success' : 'info' }} text-white">
                                    {{ $skill->name }}
                                </span>
                            @endforeach
                        </td>
                        <td>{{ $player->weight }}</td>
                        <td>{{ $player->height }}</td>
                        <td>{{ $player->created_at->format('M d, Y') }}</td>

                        <td>
                            <div class="table-actions">
                                <button class="table-action-btn" data-tooltip="View">👁️</button>
                                <button class="table-action-btn" data-tooltip="Edit">✏️</button>
                                <button class="table-action-btn" data-tooltip="Delete">🗑️</button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No players found</td>
                    </tr>
                @endforelse

            </tbody>
        </table>

        <!-- Pagination -->

    </div>
</div>
