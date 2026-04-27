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

    <!-- Forms Grid -->
    <div class="forms-grid">
        <!-- Skill Registration Form -->
        <div class="form-card" style="max-width: 600px; margin: 0 auto;">
            <div class="text-center mb-5">
                <h2 class="mb-2">Create New Skill</h2>
                <p style="color: #94a3b8; font-size: 14px;">Define a new ability for your club's training system</p>
            </div>

            <form wire:submit.prevent="save">
                <!-- Avatar Section at the Top -->
                <div class="avatar-section text-center mb-5">
                    <div class="avatar-container" style="margin: 0 auto;">
                        <label for="avatar-input" class="avatar-circle">
                            <!-- Image Preview -->
                            @if ($icon)
                                <img class="avatar-preview-img" src="{{ $icon->temporaryUrl() }}" alt="Preview">
                            @else
                                <!-- Upload Placeholder -->
                                <div class="upload-placeholder text-center">
                                    <svg class="mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        style="width: 28px; height: 28px; color: #22c55e; margin: 0 auto;">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <div
                                        style="font-size: 10px; color: #22c55e; font-weight: 700; letter-spacing: 1px;">
                                        UPLOAD ICON</div>
                                </div>
                            @endif
                        </label>
                        <input type="file" id="avatar-input" wire:model.live="icon" style="display: none;"
                            accept="image/*">
                        @error('icon')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                
                <div class="row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label for="skill-name">Skill Name (EN) <span class="required">*</span></label>
                        <input type="text" id="skill-name" wire:model="skill_name_en" class="input-field"
                            placeholder="e.g. Shooting"
                            style="background: rgba(255,255,255,0.03); border: 1px solid rgba(212, 175, 55, 0.1);">
                        @error('skill_name_en')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="skill-name-ar" style="text-align: right;">اسم المهارة (AR) <span class="required">*</span></label>
                        <input type="text" wire:model="skill_name_ar" id="skill-name-ar" class="input-field"
                            placeholder="مثال: التسديد" dir="rtl"
                            style="background: rgba(255,255,255,0.03); border: 1px solid rgba(212, 175, 55, 0.1);">
                        @error('skill_name_ar')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-actions" style="margin-top: 40px; display: flex; gap: 12px;">
                    <button type="submit" class="btn btn-primary" style="flex: 2; padding: 12px; font-weight: 600;">
                        Create Skill
                    </button>
                    <button wire:click="cancel" type="button" class="btn btn-outline"
                        style="flex: 1; padding: 12px; border-color: rgba(255,255,255,0.1); color: #94a3b8;">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
