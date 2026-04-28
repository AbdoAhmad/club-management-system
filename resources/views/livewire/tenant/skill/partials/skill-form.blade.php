    <div class="modal-overlay">

        <div class="modal-container">

            <!-- Close -->
            <button class="modal-close" wire:click="closeModal">✖</button>

            <div class="text-center mb-5">
                <h2 class="mb-2">
                    {{ $edit_skill ? 'Edit Skill' : 'Create New Skill' }}
                </h2>
                <p style="color: #94a3b8; font-size: 14px;">
                    Define a new ability for your club's training system
                </p>
            </div>

            <form wire:submit.prevent="save">

                <!-- Avatar -->
                <div class="avatar-section text-center mb-5">
                    <div class="avatar-container" style="margin: 0 auto;">
                        <label for="avatar-input" class="avatar-circle">

                            @if ($icon)
                                <img class="avatar-preview-img"
                                    src="{{ $icon instanceof \Illuminate\Http\UploadedFile ? $icon->temporaryUrl() : $edit_skill->getFirstMediaUrl('skills') }}">
                            @elseif($edit_skill && $edit_skill->hasMedia('skills'))
                                <img class="avatar-preview-img" src="{{ $edit_skill->getFirstMediaUrl('skills') }}">
                            @else
                                <div class="upload-placeholder text-center">
                                    <svg class="mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        style="width: 28px; height: 28px; color: #22c55e;">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>

                                    <div style="font-size: 10px; color: #22c55e; font-weight: 700;">
                                        UPLOAD ICON
                                    </div>
                                </div>
                            @endif

                        </label>

                        <input type="file" id="avatar-input" wire:model.live="icon" hidden>

                        @error('icon')
                            <div class="text-danger" style="font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Inputs -->
                <div class="row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label style="display: block; margin-bottom: 8px; font-weight: 600;">Skill Name (EN) <span
                                class="required">*</span></label>
                        <input type="text" wire:model="skill_name_en" class="input-field"
                            placeholder="e.g. Dribbling">
                        @error('skill_name_en')
                            <div class="text-danger" style="font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label style="display: block; margin-bottom: 8px; font-weight: 600;">اسم المهارة (AR) <span
                                class="required">*</span></label>
                        <input type="text" wire:model="skill_name_ar" class="input-field" dir="rtl"
                            placeholder="مثال: المراوغة">
                        @error('skill_name_ar')
                            <div class="text-danger" style="font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Buttons -->
                <div class="form-actions" style="margin-top: 40px; display: flex; gap: 12px;">
                    <button type="submit" class="btn btn-primary" style="flex: 2;">
                        {{ $edit_skill ? 'Update Skill' : 'Create Skill' }}
                    </button>

                    <button type="button" wire:click="closeModal" class="btn btn-outline" style="flex: 1;">
                        Cancel
                    </button>
                </div>

            </form>

        </div>
    </div>
