<div>
    <style>
        /* Custom Select Option Styling */
        .input-field option {
            background-color: #0f172a;
            color: #e2e8f0;
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
            color: #94a3b8;
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
                {{-- image player --}}

                <div class="form-group three-col">
                    <div>
                        {{-- english name player --}}
                        <label for="en-player-name">Player Name (EN) <span class="required">*</span></label>
                        <input wire:model="name_en" type="text" id="en-player-name" class="input-field"
                            placeholder="Enter player's full name">
                    </div>
                    <div dir="rtl">
                        {{-- arbic name player --}}

                        <label for="ar-player-name">اسم اللاعب (AR) <span class="required">*</span></label>
                        <input wire:model="name_ar" type="text" id="ar-player-name" class="input-field"
                            placeholder="أدخل اسم اللاعب باللغة العربية">
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
                            <input type="file" id="avatar-input" wire:model.live="icon" style="display: none;"
                                accept="image/*">
                            {{-- @error('icon')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror --}}
                        </div>
                    </div>
                </div>

                <div class="form-group two-col">
                    <div>
                        <label for="player-dob">Date of Birth <span class="required">*</span></label>
                        <input wire:model="birth_date" type="date" id="player-dob" class="input-field">
                    </div>
                    <div>
                        <label for="player-jersey">Jersey Number <span class="required">*</span></label>
                        <input wire:model="jersey_number" type="number" id="player-jersey" class="input-field"
                            placeholder="e.g., 7">
                    </div>
                </div>

                <div class="form-group">
                    <label for="player-position">Position <span class="required">*</span></label>
                    <select wire:model="postion" id="player-position" class="input-field">
                        <option value="">Select a position</option>
                        @foreach ($positions as $position)
                            <option value="{{ $position->id }}">{{ $position->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Premium Select2 Multi-Select -->
                <div class="form-group" wire:ignore>
                    <label>Player Skills (Expertise)</label>
                    <select id="skills-select2" class="input-field" multiple="multiple">
                        @foreach ($skills as $skill)
                            <option value="{{ $skill->id }}" {{ in_array($skill->id, $selected_skills) ? 'selected' : '' }}>
                                {{ $skill->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                        <div class="form-group two-col">
                            <div>
                                <label for="player-height">Height (cm)</label>
                                <input wire:model="height" type="number" id="player-height" class="input-field"
                                    placeholder="180">
                            </div>
                            <div>
                                <label for="player-weight">Weight (kg)</label>
                                <input wire:model="weight" type="number" id="player-weight" class="input-field"
                                    placeholder="75">
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
    <style>
        /* Premium Select2 Custom Styling */
        .select2-container--default .select2-selection--multiple {
            background: rgba(255, 255, 255, 0.03) !important;
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
            background: rgba(34, 197, 94, 0.02) !important;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border-color: #22c55e !important;
            background: rgba(34, 197, 94, 0.05) !important;
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
            background: #0f172a !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            border-radius: 12px !important;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4) !important;
            overflow: hidden !important;
            z-index: 9999 !important;
        }

        .select2-results__option {
            color: #94a3b8 !important;
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
            color: white !important;
            margin-top: 0 !important;
        }

        .select2-container--default .select2-search--inline .select2-search__field {
            font-family: inherit !important;
            color: #e2e8f0 !important;
            margin-left: 10px !important;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        function initSkillsSelect() {
            const selectElement = $('#skills-select2');
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
            initSkillsSelect();
        });

        document.addEventListener('livewire:navigated', () => {
            initSkillsSelect();
        });
    </script>
@endpush
