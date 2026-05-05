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
            <button class="btn btn-primary">
                <i class="bi bi-file-earmark-excel me-2"></i> Excel
            </button>
            <button class="btn btn-primary" id="open-filters">
                <i class="bi bi-funnel me-2"></i> Filter
            </button>
        </div>
        <div class="toolbar-actions">
            <button wire:click="switchScreen('form')" class="btn btn-primary">
                <span>➕</span> Add Player
            </button>
        </div>
    </div>

    <!-- Top Scrollbar for the Table -->
    <div class="top-scrollbar-container" id="top-scrollbar">
        <div id="top-scroll-content"></div>
    </div>

    <!-- Table Container -->
    <div class="table-wrapper" id="main-table-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th class="sticky-left" style="min-width: 220px; text-align: left;">Player</th>
                    <th style="text-align: left;">Description</th>
                    <th style="text-align: left;">Age</th>
                    <th style="text-align: left;">Status</th>
                    <th style="text-align: left;">Positions</th>
                    <th style="text-align: left;">Skills</th>
                    <th style="text-align: left;">Height</th>
                    <th style="text-align: left;">Weight</th>
                    <th style="text-align: left;">Joined</th>
                    <th class="sticky-right" style="text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($players as $player)
                    <tr>
                        <td class="sticky-left">
                            <div class="player-info-block">
                                <span
                                    style="color: #94a3b8; font-weight: 700; font-size: 12px; min-width: 24px;">#{{ $loop->iteration }}</span>
                                <div class="player-avatar-wrap">
                                    @if ($player->getFirstMedia('player_image'))
                                        <img src="{{ $player->getFirstMediaUrl('player_image') }}" alt="Player"
                                            class="player-avatar">
                                    @else
                                        <div class="player-avatar-placeholder">👤</div>
                                    @endif
                                </div>
                                <div style="display: flex; flex-direction: column; gap: 2px;">
                                    <span
                                        style="font-weight: 700; color: #0f172a; font-size: 14px;">{{ $player->name }}</span>
                                    <span style="font-size: 12px; color: #64748b; font-weight: 600;">Jersey:
                                        {{ $player->jersey_number }}</span>
                                </div>
                            </div>
                        </td>
                        <td style="max-width: 250px; overflow: hidden; text-overflow: ellipsis;">
                            <div
                                style="font-size: 13.5px; color: #334155; line-height: 1.5; max-height: 42px; overflow: hidden; font-weight: 500;">
                                {!! strip_tags($player->description) !!}
                            </div>
                        </td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 6px;">
                                <span
                                    style="font-weight: 700; color: #0f172a; font-size: 14.5px;">{{ $this->calculateAge($player->date_of_birth) ?? '-' }}</span>
                                <span class="badge-unit badge-unit-yrs">Yrs</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge-premium badge-status-{{ strtolower($player->status) }}">
                                <span style="margin-right: 6px; font-size: 8px;">●</span> {{ ucfirst($player->status) }}
                            </span>
                        </td>
                        <td style="max-width: 220px; white-space: normal;">
                            <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                                @foreach ($player->positions as $position)
                                    @if ($position->pivot && $position->pivot->is_primary)
                                        <span class="badge-premium badge-pos-primary" title="Primary Position">
                                            ⭐ {{ $position->name }}
                                        </span>
                                    @else
                                        <span class="badge-premium badge-pos-secondary">
                                            {{ $position->name }}
                                        </span>
                                    @endif
                                @endforeach
                            </div>
                        </td>
                        <td style="max-width: 220px; white-space: normal;">
                            <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                                @foreach ($player->skills as $skill)
                                    <span class="badge-premium badge-skill">
                                        ⚡ {{ $skill->name }}
                                    </span>
                                @endforeach
                            </div>
                        </td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 6px;">
                                <span
                                    style="font-weight: 700; color: #0f172a; font-size: 14.5px;">{{ $player->height }}</span>
                                <span class="badge-unit badge-unit-cm">Cm</span>
                            </div>
                        </td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 6px;">
                                <span
                                    style="font-weight: 700; color: #0f172a; font-size: 14.5px;">{{ $player->weight }}</span>
                                <span class="badge-unit badge-unit-kg">Kg</span>
                            </div>
                        </td>
                        <td>
                            <div style="color: #334155; font-size: 13.5px; font-weight: 700;">
                                {{ $player->joined_at ?? '-' }}
                            </div>
                        </td>
                        <td class="sticky-right">
                            <div class="table-actions">
                                <button wire:click="view({{ $player->id }})" class="action-btn action-view"
                                    title="View">👁️</button>
                                <button wire:click="edit({{ $player->id }})" class="action-btn action-edit"
                                    title="Edit">✏️</button>
                                <button wire:click="delete({{ $player->id }})" class="action-btn action-delete"
                                    title="Delete">🗑️</button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center" style="padding: 60px 20px;">
                            <div style="font-size: 48px; margin-bottom: 20px; opacity: 0.8;">📭</div>
                            <h3 style="color: #0f172a; font-weight: 800; font-size: 20px; margin-bottom: 8px;">No
                                Players Found</h3>
                            <p style="color: #64748b; margin-bottom: 24px; font-size: 14px;">Get started by adding a new
                                player to your roster or adjust your filters.</p>
                            <button wire:click="switchScreen('form')" class="btn btn-primary"
                                style="box-shadow: 0 8px 16px rgba(34, 197, 94, 0.25);">➕
                                Add First Player</button>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Scouting Filters Drawer -->
    @include('livewire.tenant.player.partials.filters-drawer')
</div>
</div>
