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
                        <input type="text" id="en-player-name" class="input-field"
                            placeholder="Enter player's full name" required>
                    </div>
                    <div dir="rtl">
                        {{-- arbic name player --}}

                        <label for="ar-player-name">اسم اللاعب (AR) <span class="required">*</span></label>
                        <input type="text" id="ar-player-name" class="input-field"
                            placeholder="أدخل اسم اللاعب باللغة العربية" required>
                    </div>
                    <div class="avatar-section text-center mb-5">
                        <div class="avatar-container" style="margin: 0 auto;">
                            <label for="avatar-input" class="avatar-circle"
                                style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                {{-- <!-- Image Preview --> --}}
                                {{-- @if ($icon) --}}
                                {{-- <img class="avatar-preview-img" src="" alt ="Preview"> --}}
                                {{-- src="{{ $icon instanceof \Illuminate\Http\UploadedFile ? $icon->temporaryUrl() : $edit_skill->getFirstMediaUrl('skills') }}" --}}
                                {{-- alt="Preview"> --}}
                                {{-- @else --}}
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
                                {{-- @endif --}}
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
                        <input type="date" id="player-dob" class="input-field" required>
                    </div>
                    <div>
                        <label for="player-jersey">Jersey Number <span class="required">*</span></label>
                        <input type="number" id="player-jersey" class="input-field" placeholder="e.g., 7" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="player-position">Position <span class="required">*</span></label>
                    <select id="player-position" class="input-field" required>
                        <option value="">Select a position</option>
                        <option value="goalkeeper">Goalkeeper</option>
                        <option value="defender">Defender</option>
                        <option value="midfielder">Midfielder</option>
                        <option value="forward">Forward</option>
                    </select>
                </div>

                <!-- Interactive Multi-Select Tags (JS Only) -->
                <div class="form-group" style="position: relative;" id="skills-multi-select">
                    <label>Player Skills (Expertise)</label>
                    <div class="static-multi-select input-field" id="tags-container"
                        onclick="document.getElementById('skills-dropdown').classList.toggle('show'); this.classList.toggle('focused')"
                        style="min-height: 48px; height: auto; background: rgba(255,255,255,0.03); border-radius: 12px; padding: 6px 12px; cursor: pointer; display: flex; flex-wrap: wrap; gap: 8px; align-items: center; transition: all 0.2s ease-in-out;">
                        
                        <span id="placeholder-text" style="color: #94a3b8; font-size: 14px; margin-left: 5px; user-select: none;">Select player skills...</span>

                        <div style="margin-left: auto; color: rgba(255,255,255,0.2);">
                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Dropdown List -->
                    <div class="ui-dropdown custom-scrollbar" id="skills-dropdown"
                        style="position: absolute; top: 100%; left: 0; right: 0; z-index: 100; background: #0f172a; border: 1px solid rgba(255,255,255,0.1); border-radius: 12px; margin-top: 8px; max-height: 220px; overflow-y: auto; display: none; box-shadow: 0 15px 35px rgba(0,0,0,0.4); padding: 8px;">
                        
                        <div class="ui-item" onclick="toggleSkillUI(this, 'SPEED')" style="padding: 10px 12px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: space-between; margin-bottom: 4px; transition: 0.2s;">
                            <span style="font-size: 13px; color: #94a3b8;">Speed</span>
                            <span class="check-mark" style="color: #22c55e; display: none;">✓</span>
                        </div>
                        <div class="ui-item" onclick="toggleSkillUI(this, 'AGILITY')" style="padding: 10px 12px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: space-between; margin-bottom: 4px; transition: 0.2s;">
                            <span style="font-size: 13px; color: #94a3b8;">Agility</span>
                            <span class="check-mark" style="color: #22c55e; display: none;">✓</span>
                        </div>
                        <div class="ui-item" onclick="toggleSkillUI(this, 'ENDURANCE')" style="padding: 10px 12px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: space-between; margin-bottom: 4px; transition: 0.2s;">
                            <span style="font-size: 13px; color: #94a3b8;">Endurance</span>
                            <span class="check-mark" style="color: #22c55e; display: none;">✓</span>
                        </div>
                        <div class="ui-item" onclick="toggleSkillUI(this, 'STRENGTH')" style="padding: 10px 12px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: space-between; margin-bottom: 4px; transition: 0.2s;">
                            <span style="font-size: 13px; color: #94a3b8;">Strength</span>
                            <span class="check-mark" style="color: #22c55e; display: none;">✓</span>
                        </div>
                    </div>
                </div>

                <style>
                    .static-multi-select:hover { border-color: rgba(34, 197, 94, 0.4) !important; background: rgba(34, 197, 94, 0.05) !important; }
                    .static-multi-select.focused { border-color: #22c55e !important; background: rgba(34, 197, 94, 0.05) !important; box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1); }
                    .ui-dropdown.show { display: block !important; animation: slideDown 0.2s ease; }
                    .ui-item:hover { background: rgba(255, 255, 255, 0.03); }
                    .ui-item.selected { background: rgba(34, 197, 94, 0.05); }
                    .ui-item.selected span:first-child { color: #22c55e !important; font-weight: 600; }
                    @keyframes slideDown { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }
                    .ui-badge { animation: badgeIn 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
                    @keyframes badgeIn { from { transform: scale(0.5); opacity: 0; } to { transform: scale(1); opacity: 1; } }
                </style>

                <script>
                    function toggleSkillUI(element, skillName) {
                        const container = document.getElementById('tags-container');
                        const placeholder = document.getElementById('placeholder-text');
                        const isSelected = element.classList.toggle('selected');
                        const checkMark = element.querySelector('.check-mark');
                        
                        if (isSelected) {
                            checkMark.style.display = 'block';
                            placeholder.style.display = 'none';
                            
                            // Create Badge
                            const badge = document.createElement('div');
                            badge.className = 'ui-badge';
                            badge.id = 'badge-' + skillName;
                            badge.style = "background: rgba(34, 197, 94, 0.1); color: #22c55e; padding: 4px 12px; border-radius: 8px; font-size: 11px; font-weight: 700; display: flex; align-items: center; gap: 6px; border: 1px solid rgba(34, 197, 94, 0.2);";
                            badge.innerHTML = `${skillName} <span onclick="removeBadgeUI(event, '${skillName}')" style="cursor: pointer; opacity: 0.5; font-size: 14px; margin-left: 4px;">×</span>`;
                            
                            // Insert before the arrow
                            container.insertBefore(badge, container.lastElementChild);
                        } else {
                            checkMark.style.display = 'none';
                            const badgeToRemove = document.getElementById('badge-' + skillName);
                            if (badgeToRemove) badgeToRemove.remove();
                            
                            if (container.querySelectorAll('.ui-badge').length === 0) {
                                placeholder.style.display = 'block';
                            }
                        }
                    }

                    function removeBadgeUI(event, skillName) {
                        event.stopPropagation();
                        const badge = document.getElementById('badge-' + skillName);
                        if (badge) badge.remove();
                        
                        // Find and unselect in dropdown
                        const items = document.querySelectorAll('.ui-item');
                        items.forEach(item => {
                            if (item.textContent.trim().toUpperCase().includes(skillName)) {
                                item.classList.remove('selected');
                                item.querySelector('.check-mark').style.display = 'none';
                            }
                        });

                        const container = document.getElementById('tags-container');
                        if (container.querySelectorAll('.ui-badge').length === 0) {
                            document.getElementById('placeholder-text').style.display = 'block';
                        }
                    }

                    window.addEventListener('click', function(e) {
                        if (!e.target.closest('#skills-multi-select')) {
                            document.getElementById('skills-dropdown').classList.remove('show');
                            document.getElementById('tags-container').classList.remove('focused');
                        }
                    });
                </script>
                <div class="form-group two-col">
                    <div>
                        <label for="player-height">Height (cm)</label>
                        <input type="number" id="player-height" class="input-field" placeholder="180">
                    </div>
                    <div>
                        <label for="player-weight">Weight (kg)</label>
                        <input type="number" id="player-weight" class="input-field" placeholder="75">
                    </div>
                </div>



                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Register Player</button>
                    <button type="reset" class="btn btn-outline">Clear</button>
                </div>
            </form>
        </div>

    </div>
