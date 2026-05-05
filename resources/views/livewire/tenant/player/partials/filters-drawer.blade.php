<!-- Advanced Filters Drawer -->
<div class="filters-drawer" id="filters-drawer">
    <div class="drawer-header">
        <h5 class="drawer-title">Scouting Filters</h5>
        <button type="button" class="btn-close-drawer" id="close-filters">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <div class="drawer-body">
        <!-- Age Range (Dual Pointer) -->
        <div class="filter-section">
            <label class="filter-label">Age Interval (Years)</label>
            <div class="dual-range-slider" data-min="5" data-max="50">
                <div class="slider-track"></div>
                <input type="range" wire:model.live.debounce.300ms="filters.age_min" class="min-range" min="5" max="50"
                    oninput="updateDualRange(this)">
                <input type="range" wire:model.live.debounce.300ms="filters.age_max" class="max-range" min="5" max="50"
                    oninput="updateDualRange(this)">
                <div class="range-tooltips">
                    <span class="min-tooltip">{{ $filters['age_min'] }}</span>
                    <span class="max-tooltip">{{ $filters['age_max'] }}</span>
                </div>
            </div>
            <div class="range-labels-fixed">
                <span>5 yrs</span>
                <span>50 yrs</span>
            </div>
        </div>

        <div class="filter-divider"></div>

        <!-- Joined Date Interval -->
        <div class="filter-section">
            <label class="filter-label">Joined Date Interval</label>
            <div class="date-range-grid">
                <div class="date-input-wrap">
                    <span class="sub-label">From</span>
                    <input type="date" wire:model.live="filters.joined_date_from" class="form-control-dark">
                </div>
                <div class="date-input-wrap">
                    <span class="sub-label">To</span>
                    <input type="date" wire:model.live="filters.joined_date_to" class="form-control-dark">
                </div>
            </div>
        </div>

        <div class="filter-divider"></div>

        <!-- Position Strategy -->
        <div class="filter-section">
            <div style="display: table; width: 100%; margin-bottom: 25px;">
                <div style="display: table-cell; vertical-align: middle;">
                    <label class="filter-label mb-0">Position Strategy</label>
                </div>
                <div style="display: table-cell; text-align: right; vertical-align: middle;">
                    <div class="custom-switch-wrap" style="display: inline-flex; align-items: center;">
                        <i class="bi bi-star-fill text-warning me-1" style="font-size: 0.8rem;"></i>
                        <span class="switch-text">Primary Only</span>
                        <label class="switch" style="margin-left: 10px; margin-bottom: 0;">
                            <input wire:model.live="filters.primary_position_only" type="checkbox" checked>
                            <span class="slider-round"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="scrollable-filter-list">
                <div class="position-tag-grid">
                    {{-- <div class="pos-tag">
                        <input type="checkbox" id="pos-gk-scout">
                        <label for="pos-gk-scout">GK</label>
                    </div> --}}
                    @foreach ($positions as $position)
                        <div class="pos-tag">
                            <input wire:model.live="filters.positions" type="checkbox"
                                id="pos-{{ $position->id }}-scout" value="{{ $position->id }}">
                            <label for="pos-{{ $position->id }}-scout">{{ $position->code }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="filter-divider"></div>

        <!-- Advanced Skills Selection -->
        <div class="filter-section">
            <label class="filter-label">Performance Metrics (Skills)</label>
            <div class="scrollable-filter-list">
                <div class="skills-scouting-grid">
                    <!-- Skill Item -->
                    {{-- <div class="skill-scout-item">
                        <div class="skill-tag-check">
                            <input type="checkbox" id="sk-shooting" onchange="toggleSkillSlider(this)">
                            <label for="sk-shooting">Shooting</label>
                        </div>
                        <div class="skill-slider-container" id="slider-sk-shooting">
                            <span class="sub-label mb-2">Value Range</span>
                            <div class="dual-range-slider" data-min="0" data-max="100">
                                <div class="slider-track"></div>
                                <input type="range" class="min-range" min="0" max="100" value="70"
                                    oninput="updateDualRange(this)">
                                <input type="range" class="max-range" min="0" max="100" value="95"
                                    oninput="updateDualRange(this)">
                                <div class="range-tooltips">
                                    <span class="min-tooltip">70</span>
                                    <span class="max-tooltip">95</span>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    @foreach ($skills as $skill)
                        <div class="skill-scout-item">
                            <div class="skill-tag-check">
                                <input type="checkbox" id="sk-{{ $skill->id }}" onchange="toggleSkillSlider(this)">
                                <label for="sk-{{ $skill->id }}">{{ $skill->name }}</label>
                            </div>
                            <div class="skill-slider-container" id="slider-sk-{{ $skill->id }}">
                                <span class="sub-label mb-2">Value Range</span>
                                <div class="dual-range-slider" data-min="0" data-max="100">
                                    <div class="slider-track"></div>
                                    <input wire:model.live.debounce.300ms="filters.skills.{{ $skill->id }}.min_value" type="range"
                                        class="min-range" min="0" max="100" oninput="updateDualRange(this)">
                                    <input wire:model.live.debounce.300ms="filters.skills.{{ $skill->id }}.max_value" type="range"
                                        class="max-range" min="0" max="100" oninput="updateDualRange(this)">
                                    <div class="range-tooltips">
                                        <span class="min-tooltip">{{ $filters['skills'][$skill->id]['min_value'] ?? 0 }}</span>
                                        <span class="max-tooltip">{{ $filters['skills'][$skill->id]['max_value'] ?? 100 }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="filter-divider"></div>

        <!-- Physical Profile (Dual Pointer) -->
        <div class="filter-section">
            <label class="filter-label">Physical Profile</label>
            <div class="physical-scouting-wrap">
                <div style="margin-bottom: 60px;">
                    <span class="sub-label mb-2">Height Range (cm)</span>
                    <div class="dual-range-slider" data-min="150" data-max="220">
                        <div class="slider-track"></div>
                        <input wire:model.live.debounce.300ms="filters.height_min" type="range" class="min-range" min="150"
                            max="220" oninput="updateDualRange(this)">
                        <input wire:model.live.debounce.300ms="filters.height_max" type="range" class="max-range" min="150"
                            max="220" oninput="updateDualRange(this)">
                        <div class="range-tooltips">
                            <span class="min-tooltip">{{ $filters['height_min'] }}</span>
                            <span class="max-tooltip">{{ $filters['height_max'] }}</span>
                        </div>
                    </div>
                </div>
                <div>
                    <span class="sub-label mb-2">Weight Range (kg)</span>
                    <div class="dual-range-slider" data-min="50" data-max="120">
                        <div class="slider-track"></div>
                        <input wire:model.live.debounce.300ms="filters.weight_min" type="range" class="min-range" min="50"
                            max="120" oninput="updateDualRange(this)">
                        <input wire:model.live.debounce.300ms="filters.weight_max" type="range" class="max-range" min="50"
                            max="120" oninput="updateDualRange(this)">
                        <div class="range-tooltips">
                            <span class="min-tooltip">{{ $filters['weight_min'] }}</span>
                            <span class="max-tooltip">{{ $filters['weight_max'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="filter-divider"></div>

        <!-- Availability -->
        <div class="filter-section">
            <label class="filter-label">Availability</label>
            <div class="status-grid">
                <div class="status-item active">
                    <input wire:model.live="filters.status.active" type="checkbox" id="sc-active" checked>
                    <label for="sc-active">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Active</span>
                    </label>
                </div>
                <div class="status-item injured">
                    <input wire:model.live="filters.status.injured" type="checkbox" id="sc-injured">
                    <label for="sc-injured">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        <span>Injured</span>
                    </label>
                </div>
                <div class="status-item suspended">
                    <input wire:model.live="filters.status.banned" type="checkbox" id="sc-suspended">
                    <label for="sc-suspended">
                        <i class="bi bi-slash-circle-fill"></i>
                        <span>Suspended</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="drawer-footer">

        <button type="button" wire:click="applyFilters" class="btn btn-primary flex-grow-2"
            style="background-color: var(--accent-green); border-color: var(--accent-green); font-weight: 700;">Apply
            Filters</button>
        <button type="button" wire:click="clearFilters" class="btn btn-danger flex-grow-1">Clear All</button>
    </div>
</div>

<!-- Overlay backdrop -->
<div class="drawer-overlay" id="drawer-overlay"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const openBtn = document.getElementById('open-filters');
        const closeBtn = document.getElementById('close-filters');
        const drawer = document.getElementById('filters-drawer');
        const overlay = document.getElementById('drawer-overlay');

        function toggleDrawer() {
            drawer.classList.toggle('active');
            overlay.classList.toggle('active');
            document.body.style.overflow = drawer.classList.contains('active') ? 'hidden' : '';

            // Trigger re-initialization of sliders when drawer opens to sync with Livewire values
            if (drawer.classList.contains('active')) {
                setTimeout(() => {
                    document.querySelectorAll('.dual-range-slider').forEach(container => {
                        const minInput = container.querySelector('.min-range');
                        if (minInput) updateDualRange(minInput);
                    });
                }, 300);
            }
        }

        if (openBtn) openBtn.addEventListener('click', toggleDrawer);
        if (closeBtn) closeBtn.addEventListener('click', toggleDrawer);
        if (overlay) overlay.addEventListener('click', toggleDrawer);

        // Initialize Dual Sliders
        document.querySelectorAll('.dual-range-slider').forEach(container => {
            const minInput = container.querySelector('.min-range');
            const maxInput = container.querySelector('.max-range');
            if (minInput && maxInput) {
                updateDualRange(minInput);
                updateDualRange(maxInput);
            }
        });
    });

    function toggleSkillSlider(checkbox) {
        const container = checkbox.closest('.skill-scout-item').querySelector('.skill-slider-container');
        if (checkbox.checked) {
            container.classList.add('active');
            const minInput = container.querySelector('.min-range');
            updateDualRange(minInput);
        } else {
            container.classList.remove('active');
        }
    }

    function updateDualRange(input) {
        if (!input) return;
        const container = input.parentElement;
        const minInput = container.querySelector('.min-range');
        const maxInput = container.querySelector('.max-range');
        const minTooltip = container.querySelector('.min-tooltip');
        const maxTooltip = container.querySelector('.max-tooltip');
        const track = container.querySelector('.slider-track');

        if (!minInput || !maxInput || !minTooltip || !maxTooltip || !track) return;

        const min = parseInt(minInput.min);
        const max = parseInt(minInput.max);

        if (parseInt(maxInput.value) - parseInt(minInput.value) < 1) {
            if (input.classList.contains('min-range')) {
                minInput.value = parseInt(maxInput.value) - 1;
            } else {
                maxInput.value = parseInt(minInput.value) + 1;
            }
        }

        const percent1 = ((minInput.value - min) / (max - min)) * 100;
        const percent2 = ((maxInput.value - min) / (max - min)) * 100;

        let offset1 = 8 - percent1 * 0.15;
        let offset2 = 8 - percent2 * 0.15;

        // Prevent tooltip overlap when values are very close
        if (percent2 - percent1 < 6) {
            offset1 -= 12;
            offset2 += 12;
        }

        track.style.background =
            `linear-gradient(to right, rgba(255,255,255,0.1) ${percent1}% , var(--accent-green) ${percent1}% , var(--accent-green) ${percent2}%, rgba(255,255,255,0.1) ${percent2}%)`;

        minTooltip.innerHTML = minInput.value;
        maxTooltip.innerHTML = maxInput.value;

        minTooltip.style.left = `calc(${percent1}% + (${offset1}px))`;
        maxTooltip.style.left = `calc(${percent2}% + (${offset2}px))`;
    }
</script>
