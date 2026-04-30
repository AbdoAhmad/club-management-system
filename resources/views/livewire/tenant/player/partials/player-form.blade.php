<div>
    <style>
        /* Custom Select Option Styling */
        .input-field option {
            background-color: #ffffff;
            color: #1e293b;
            padding: 12px;
        }

        /* Avatar Circle Styling */
        .avatar-container {
            position: relative;
            width: 100px;
            height: 100px;
            margin: 0 auto 24px;
            animation: zoomIn 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .avatar-circle {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 2px dashed rgba(34, 197, 94, 0.3);
            background: rgba(34, 197, 94, 0.02);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            overflow: hidden;
            transition: all 0.3s ease;
            position: relative;
        }

        .avatar-circle:hover {
            border-color: #22c55e;
            background: rgba(34, 197, 94, 0.08);
            transform: scale(1.02);
        }

        .avatar-circle i,
        .avatar-circle svg {
            color: rgba(34, 197, 94, 0.8);
            margin-bottom: 4px;
        }

        .avatar-circle span {
            font-size: 10px;
            color: #64748b;
            font-weight: 500;
        }

        .text-danger {
            color: #ef4444;
            font-size: 12px;
            margin-top: 5px;
            display: block;
            font-weight: 500;
        }

        .required {
            color: #ef4444;
            margin-left: 4px;
        }

        .avatar-preview-img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        @keyframes zoomIn {
            from {
                opacity: 0;
                transform: scale(0.5);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Custom Scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 5px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(212, 175, 55, 0.3);
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(212, 175, 55, 0.5);
        }

        /* Position Management Styles */
        .position-management-container {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border: 1px solid rgba(34, 197, 94, 0.2);
            border-radius: 16px;
            padding: 24px;
            margin-top: 20px;
            backdrop-filter: blur(10px);
            animation: slideUp 0.5s ease-out;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .positions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }

        .position-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .position-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: #cbd5e1;
            transition: all 0.3s ease;
        }

        .position-card:hover {
            background: #f8fafc;
            transform: translateY(-3px);
            border-color: rgba(34, 197, 94, 0.3);
            box-shadow: 0 8px 16px rgba(34, 197, 94, 0.1);
        }

        .position-card.is-primary {
            background: rgba(34, 197, 94, 0.08);
            border-color: rgba(34, 197, 94, 0.4);
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.15);
        }

        .position-card.is-primary::before {
            background: #22c55e;
            box-shadow: 0 0 12px rgba(34, 197, 94, 0.6);
        }

        .position-info {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .position-name {
            font-size: 14px;
            font-weight: 600;
            color: #0f172a;
            letter-spacing: 0.3px;
        }

        .position-status {
            font-size: 11px;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 500;
        }

        .position-card.is-primary .position-status {
            color: #22c55e;
            font-weight: 600;
        }

        .star-action {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f5f9;
            color: #94a3b8;
            transition: all 0.3s ease;
        }

        .position-card:hover .star-action {
            background: rgba(34, 197, 94, 0.12);
            color: #22c55e;
        }

        .position-card.is-primary .star-action {
            background: rgba(34, 197, 94, 0.15);
            color: #22c55e;
            box-shadow: 0 0 12px rgba(34, 197, 94, 0.3);
        }

        .star-action i {
            font-size: 18px;
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .position-card.is-primary .star-action i {
            transform: scale(1.2);
        }

        .d-none {
            display: none !important;
        }

        /* Position Management Header */
        #position-management .text-gray-300 {
            color: #1e293b !important;
            font-size: 15px !important;
            font-weight: 700 !important;
        }

        #position-management .text-gray-500 {
            color: #64748b !important;
            font-size: 12px !important;
        }

        /* Dark Theme for entire form */
        div {
            color: #1e293b;
        }

        .page-header {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            padding: 32px 24px;
            border-bottom: 1px solid rgba(34, 197, 94, 0.2);
            border-radius: 16px 16px 0 0;
            margin-bottom: 24px;
        }

        .page-title {
            color: #0f172a !important;
            font-size: 28px !important;
            font-weight: 700 !important;
            margin-bottom: 8px !important;
        }

        .page-subtitle {
            color: #64748b !important;
            font-size: 14px !important;
            margin-bottom: 0 !important;
        }

        .form-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border: 1px solid rgba(34, 197, 94, 0.2);
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        .form-card h2 {
            color: #0f172a !important;
            font-weight: 700 !important;
            margin-bottom: 24px !important;
            font-size: 22px !important;
        }

        .form-group label {
            color: #1e293b !important;
            font-weight: 600 !important;
            margin-bottom: 8px !important;
        }

        .input-field {
            background: #ffffff !important;
            border: 1px solid #e2e8f0 !important;
            color: #1e293b !important;
            padding: 12px 16px !important;
            border-radius: 12px !important;
            transition: all 0.3s ease !important;
        }

        .input-field:hover {
            border-color: rgba(34, 197, 94, 0.4) !important;
            background: #f8fafc !important;
        }

        .input-field:focus {
            border-color: #22c55e !important;
            background: #ffffff !important;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1) !important;
        }

        .input-field::placeholder {
            color: #94a3b8 !important;
        }

        .btn {
            border-radius: 12px !important;
            padding: 12px 24px !important;
            font-weight: 600 !important;
            transition: all 0.3s ease !important;
        }

        .btn-primary {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%) !important;
            color: #ffffff !important;
            border: none !important;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(34, 197, 94, 0.3) !important;
        }

        .btn-outline {
            background: #ffffff !important;
            border: 1px solid #e2e8f0 !important;
            color: #1e293b !important;
        }

        .btn-outline:hover {
            background: #f8fafc !important;
            border-color: rgba(34, 197, 94, 0.4) !important;
            color: #22c55e !important;
        }
    </style>
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">Forms & Data Entry</h1>
        <p class="page-subtitle">Professional form layouts for player registration, match scheduling, and settings</p>
    </div>

    <!-- Forms Grid -->
    <div class="forms-grid">
        <!-- Player Registration Form -->
        <div class="form-card">
            <h2>Player Registration</h2>
            <form>

                <div class="form-group three-col">
                    <div>
                        {{-- english name player --}}
                        <label for="en-player-name">Player Name (EN) <span class="required">*</span></label>
                        <input wire:model="name_en" type="text" id="en-player-name" class="input-field"
                            placeholder="Enter player's full name">
                        @error('name_en')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div dir="rtl">
                        {{-- arbic name player --}}

                        <label for="ar-player-name">اسم اللاعب (AR) <span class="required">*</span></label>
                        <input wire:model="name_ar" type="text" id="ar-player-name" class="input-field"
                            placeholder="أدخل اسم اللاعب باللغة العربية">
                        @error('name_ar')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="avatar-section text-center mb-5">
                        <div class="avatar-container" style="margin: 0 auto;">
                            <label for="avatar-input" class="avatar-circle"
                                style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                {{-- <!-- Image Preview --> --}}
                                @if ($image)
                                    <img class="avatar-preview-img" src=" {{ $image->temporaryUrl() }}" alt ="Preview">
                                    {{-- src="{{ $icon instanceof \Illuminate\Http\UploadedFile ? $icon->temporaryUrl() : $edit_skill->getFirstMediaUrl('skills') }}" --}}
                                    {{-- alt="Preview"> --}}
                                @else
                                    {{-- <!-- Upload Placeholder --> --}}
                                    <div class="upload-placeholder text-center">
                                        <svg class="mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            style="width: 28px; height: 28px; color: #22c55e; margin: 0 auto;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <div
                                            style="font-size: 10px;  color: #22c55e; font-weight: 700; letter-spacing: 1px;">
                                            UPLOAD ICON</div>
                                    </div>
                                @endif
                            </label>
                            <input type="file" id="avatar-input" wire:model.live="image" style="display: none;"
                                accept="image/*">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group three-col">
                    <div>
                        <label for="player-dob">Date of Birth <span class="required">*</span></label>
                        <input wire:model="birth_date" type="date" id="player-dob" class="input-field">
                        @error('birth_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div>
                        <label for="player-jersey">Jersey Number <span class="required">*</span></label>
                        <input wire:model="jersey_number" type="number" id="player-jersey" class="input-field"
                            placeholder="e.g., 7">
                        @error('jersey_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div>
                        <label for="player-status">Player Status <span class="required">*</span></label>
                        <select wire:model="status" id="player-status" class="input-field">
                            <option value="">Select a status</option>
                            <option value="active">Active</option>
                            <option value="banned">Banned</option>
                            <option value="injured">Injured</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="form-group">
                    <div wire:ignore>
                        <label>Player Positions</label>
                        <select id="position-select2" class="input-field" multiple="multiple">
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}"
                                    {{ in_array($position->id, $selected_position) ? 'selected' : '' }}>
                                    {{ $position->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('selected_position')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <!-- Position Management UI -->
                    <div id="position-management" class="position-management-container d-none" wire:ignore>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <label class="text-gray-300 font-weight-bold mb-0" style="font-size: 15px;">Manage
                                    Selected Positions</label>
                                <p class="text-gray-500 mb-0" style="font-size: 12px;">Choose one as your primary
                                    position (*)</p>
                            </div>
                        </div>
                        <div class="positions-grid" id="selected-positions-grid">
                            <!-- Dynamically populated by JS -->
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <label class="mb-0">Player Skills</label>
                        <button type="button" wire:click="addSkill" class="btn-add-skill"
                            {{ count($selected_skills) >= count($skills) ? 'disabled' : '' }}>
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path d="M12 5v14M5 12h14" />
                            </svg>
                            Add Skill
                        </button>
                    </div>
                    <br>
                    @if (count($selected_skills) > 0)
                        <div class="skills-repeater">
                            @foreach ($selected_skills as $index => $skill)
                                <div class="skill-row" wire:key="skill-{{ $index }}">

                                    {{-- Skill Select --}}
                                    <div class="skill-field">
                                        <span class="skill-field-label">Skill</span>
                                        <select wire:model.live="selected_skills.{{ $index }}.skill_id"
                                            class="input-field">
                                            <option value="">Select skill</option>
                                            @foreach ($skills as $s)
                                                @if ($skill['skill_id'] == $s->id || !in_array($s->id, collect($selected_skills)->pluck('skill_id')->toArray()))
                                                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error("selected_skills.{$index}.skill_id")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Level Type Toggle --}}
                                    <div class="skill-field">
                                        <span class="skill-field-label">Level type</span>
                                        <div class="type-toggle">
                                            <button type="button"
                                                wire:click="setLevelType({{ $index }}, 'percentage')"
                                                class="type-btn {{ $skill['level_type'] === 'percentage' ? 'active' : '' }}">
                                                <svg width="11" height="11" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2">
                                                    <circle cx="7" cy="7" r="2" />
                                                    <circle cx="17" cy="17" r="2" />
                                                    <line x1="3" y1="21" x2="21"
                                                        y2="3" />
                                                </svg>
                                            </button>
                                            <button type="button"
                                                wire:click="setLevelType({{ $index }}, 'stars')"
                                                class="type-btn {{ $skill['level_type'] === 'stars' ? 'active' : '' }}">
                                                <svg width="11" height="11" viewBox="0 0 24 24">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"
                                                        fill="currentColor" />
                                                </svg> Stars
                                            </button>
                                        </div>
                                    </div>

                                    {{-- Level Input --}}
                                    <div class="skill-field">
                                        <span class="skill-field-label">Level</span>

                                        @if ($skill['level_type'] === 'percentage')
                                            <div class="pct-wrap">
                                                <input type="number"
                                                    wire:model.live="selected_skills.{{ $index }}.level"
                                                    class="input-field" min="0" max="100"
                                                    placeholder="0–100">
                                                <span class="pct-sign">%</span>
                                            </div>
                                            <div class="pct-bar-track">
                                                <div class="pct-bar-fill"
                                                    style="width: {{ min(100, max(0, $skill['level'] ?? 0)) }}%">
                                                </div>
                                            </div>
                                        @else
                                            <div class="stars-wrap">
                                                @for ($star = 1; $star <= 5; $star++)
                                                    <button type="button"
                                                        wire:click="setStarRating({{ $index }}, {{ $star }})"
                                                        class="star-btn {{ ($skill['level'] ?? 0) >= $star ? 'lit' : '' }}">
                                                        <svg width="22" height="22" viewBox="0 0 24 24">
                                                            <polygon
                                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                                        </svg>
                                                    </button>
                                                @endfor
                                            </div>
                                        @endif

                                        @error("selected_skills.{$index}.level")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Delete --}}
                                    <button type="button" wire:click="removeSkill({{ $index }})"
                                        class="skill-del-btn">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="1.5">
                                            <polyline points="3 6 5 6 21 6" />
                                            <path d="M19 6l-1 14H6L5 6" />
                                            <path d="M10 11v6M14 11v6" />
                                        </svg>
                                    </button>

                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="skills-empty">
                            No skills added yet. Click "Add Skill" to get started.
                        </div>
                    @endif
                </div>


                <div class="form-group two-col">
                    <div>
                        <label for="player-height">Height (cm)</label>
                        <input wire:model="height" type="number" id="player-height" class="input-field"
                            placeholder="180">
                        @error('height')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div>
                        <label for="player-weight">Weight (kg)</label>
                        <input wire:model="weight" type="number" id="player-weight" class="input-field"
                            placeholder="75">
                        @error('weight')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="form-actions">
                    <button wire:click="save" type="submit" class="btn btn-primary">Register Player</button>
                    <button wire:click="clear" class="btn btn-outline">Clear</button>
                </div>
            </form>
        </div>

    </div>
</div>

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        /* === Skill Repeater === */
        .btn-add-skill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 14px;
            border: 1px solid rgba(34, 197, 94, .4);
            border-radius: 10px;
            background: rgba(34, 197, 94, .08);
            color: #16a34a;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all .2s;
        }

        .btn-add-skill:hover {
            background: rgba(34, 197, 94, .15);
        }

        .btn-add-skill:disabled {
            opacity: .45;
            cursor: not-allowed;
        }

        .skills-repeater {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .skill-row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr auto;
            gap: 14px;
            align-items: end;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 14px 16px;
            transition: border-color .2s;
        }

        .skill-row:hover {
            border-color: rgba(34, 197, 94, .3);
        }

        .skill-field {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .skill-field-label {
            font-size: 11px;
            font-weight: 600;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        /* Type toggle */
        .type-toggle {
            display: flex;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            overflow: hidden;
            height: 44px;
        }

        .type-btn {
            flex: 1;
            border: none;
            background: #ffffff;
            color: #94a3b8;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all .15s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .type-btn:not(:last-child) {
            border-right: 1px solid #e2e8f0;
        }

        .type-btn.active {
            background: rgba(34, 197, 94, .1);
            color: #16a34a;
        }

        .type-btn:hover:not(.active) {
            background: #f8fafc;
            color: #334155;
        }

        /* Percentage */
        .pct-wrap {
            position: relative;
        }

        .pct-wrap .input-field {
            padding-right: 32px !important;
        }

        .pct-sign {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 12px;
            color: #94a3b8;
            pointer-events: none;
        }

        .pct-bar-track {
            height: 4px;
            border-radius: 2px;
            background: #f1f5f9;
            margin-top: 7px;
            overflow: hidden;
        }

        .pct-bar-fill {
            height: 100%;
            border-radius: 2px;
            background: linear-gradient(90deg, #22c55e, #16a34a);
            transition: width .4s cubic-bezier(.4, 0, .2, 1);
        }

        /* Stars */
        .stars-wrap {
            display: flex;
            gap: 2px;
            height: 44px;
            align-items: center;
        }

        .star-btn {
            width: 32px;
            height: 32px;
            border: none;
            background: none;
            padding: 0;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            transition: transform .15s;
        }

        .star-btn:hover {
            transform: scale(1.2);
        }

        .star-btn svg {
            transition: all .15s;
            fill: none;
            stroke: #cbd5e1;
            stroke-width: 1.5px;
        }

        .star-btn.lit svg {
            fill: #16a34a;
            stroke: #16a34a;
        }

        .star-btn:hover svg {
            fill: #16a34a;
            stroke: #16a34a;
        }

        /* Delete */
        .skill-del-btn {
            width: 38px;
            height: 38px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            background: #ffffff;
            color: #94a3b8;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .2s;
            align-self: center;
        }

        .skill-del-btn:hover {
            border-color: #fca5a5;
            background: #fef2f2;
            color: #ef4444;
        }

        /* Empty */
        .skills-empty {
            padding: 24px;
            text-align: center;
            color: #94a3b8;
            font-size: 13px;
            border: 1px dashed #e2e8f0;
            border-radius: 14px;
            background: #f8fafc;
        }

        /* Premium Select2 Custom Styling */
        .select2-container--default .select2-selection--multiple {
            background: #ffffff !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 12px !important;
            padding: 5px !important;
            min-height: 48px !important;
            transition: all 0.2s ease-in-out;
            display: flex !important;
            align-items: center !important;
            flex-wrap: wrap !important;
        }

        .select2-container--default .select2-selection--multiple:hover {
            border-color: rgba(34, 197, 94, 0.4) !important;
            background: #f8fafc !important;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border-color: #22c55e !important;
            background: #ffffff !important;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1) !important;
        }

        .select2-container--default .select2-selection__rendered {
            display: flex !important;
            flex-wrap: wrap !important;
            gap: 4px !important;
            width: 100% !important;
            padding: 0 5px !important;
            list-style: none !important;
        }

        .select2-container--default .select2-search--inline {
            flex: 1 !important;
            display: flex !important;
            align-items: center !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background: rgba(34, 197, 94, 0.1) !important;
            border: 1px solid rgba(34, 197, 94, 0.2) !important;
            color: #22c55e !important;
            border-radius: 8px !important;
            padding: 4px 12px !important;
            font-size: 12px !important;
            font-weight: 600 !important;
            margin: 0 !important;
            display: flex !important;
            align-items: center !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #22c55e !important;
            margin-right: 8px !important;
            border: none !important;
            transition: color 0.2s;
            position: relative;
            top: auto;
            left: auto;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
            background: transparent !important;
            color: #ef4444 !important;
        }

        .select2-dropdown {
            background: #ffffff !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 12px !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08) !important;
            overflow: hidden !important;
            z-index: 9999 !important;
        }

        .select2-results__option {
            color: #64748b !important;
            padding: 10px 15px !important;
            font-size: 13px !important;
            transition: 0.2s;
        }

        .select2-results__option--highlighted[aria-selected] {
            background: rgba(34, 197, 94, 0.1) !important;
            color: #22c55e !important;
        }

        .select2-results__option[aria-selected=true] {
            background: rgba(34, 197, 94, 0.05) !important;
            color: #22c55e !important;
        }

        .select2-search__field {
            background: transparent !important;
            color: #1e293b !important;
            margin-top: 0 !important;
        }

        .select2-container--default .select2-search--inline .select2-search__field {
            font-family: inherit !important;
            color: #1e293b !important;
            margin-left: 10px !important;
            padding: 4px 8px !important;
            height: auto !important;
        }

        .select2-container--default .select2-search--inline .select2-search__field::placeholder {
            color: #94a3b8 !important;
            opacity: 1 !important;
        }

        /* Hover styling for Select2 choices */
        .select2-container--default .select2-selection--multiple .select2-selection__choice:hover {
            background: rgba(34, 197, 94, 0.2) !important;
            border-color: rgba(34, 197, 94, 0.4) !important;
            color: #22c55e !important;
            box-shadow: 0 4px 8px rgba(34, 197, 94, 0.15) !important;
        }

        /* Style unselected options on hover */
        .select2-results__option:not([aria-selected=true]):hover {
            background: rgba(34, 197, 94, 0.1) !important;
            color: #22c55e !important;
        }

        /* Dropdown results container */
        .select2-results {
            max-height: 200px !important;
            overflow-y: auto !important;
        }

        /* Results list */
        .select2-results__options {
            max-height: none !important;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // Store positions data for JS use
        const availablePositions = @json($positions->pluck('name', 'id'));
        let primaryPositionId = null;

        function renderPositionCards(selectedIds) {
            const grid = $('#selected-positions-grid');
            const container = $('#position-management');

            if (!selectedIds || selectedIds.length === 0) {
                container.addClass('d-none');
                return;
            }

            container.removeClass('d-none');
            grid.empty();

            // Ensure primaryPositionId is still in selected list
            if (primaryPositionId && !selectedIds.includes(primaryPositionId.toString())) {
                primaryPositionId = null;
            }

            // If no primary selected but we have positions, pick the first one by default
            if (!primaryPositionId && selectedIds.length > 0) {
                primaryPositionId = selectedIds[0];
            }

            selectedIds.forEach(id => {
                const name = availablePositions[id] || 'Unknown';
                const isPrimary = id.toString() === primaryPositionId.toString();

                const card = `
                    <div class="position-card ${isPrimary ? 'is-primary' : ''}" data-id="${id}">
                        <div class="position-info">
                            <span class="position-name">${name}</span>
                            <span class="position-status">${isPrimary ? 'Primary Position' : 'Reserve'}</span>
                        </div>
                        <div class="star-action">
                            <i class="${isPrimary ? 'fas' : 'far'} fa-star"></i>
                        </div>
                    </div>
                `;
                grid.append(card);
            });

            // Sync with Livewire if property exists
            if (window.Livewire) {
                @this.set('primary_position_id', primaryPositionId, true);
            }
        }

        $(document).on('click', '.position-card', function() {
            const id = $(this).data('id').toString();
            primaryPositionId = id;

            const selectedIds = $('#position-select2').val() || [];
            renderPositionCards(selectedIds);
        });

        function initSelect() {
            const selectElement = $('#skills-select2');
            const positionElement = $('#position-select2');

            if (positionElement.length) {
                positionElement.select2({
                    placeholder: "Select player position...",
                    allowClear: true,
                    width: '100%',
                }).on('change', function(e) {
                    let data = $(this).val();
                    @this.set('selected_position', data);
                    renderPositionCards(data);
                });

                // Initial render if data exists
                const initialData = positionElement.val();
                if (initialData && initialData.length > 0) {
                    renderPositionCards(initialData);
                }
            }

            if (selectElement.length) {
                selectElement.select2({
                    placeholder: "Select player skills...",
                    allowClear: true,
                    width: '100%',
                }).on('change', function(e) {
                    let data = $(this).val();
                    @this.set('selected_skills', data);
                });
            }
        }

        $(document).ready(function() {
            initSelect();
        });

        document.addEventListener('livewire:navigated', () => {
            initSelect();
        });
    </script>
@endpush
