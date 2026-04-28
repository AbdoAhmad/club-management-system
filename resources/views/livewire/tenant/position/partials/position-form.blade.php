<div class="modal-overlay">

    <div class="modal-container">

        <!-- Close -->
        <button class="modal-close" wire:click="closeModal">✖</button>

        <div class="text-center mb-5">
            <h2 class="mb-2">
                {{ $edit_position ? 'Edit Position' : 'Create New Position' }}
            </h2>
            <p style="color: #94a3b8; font-size: 14px;">
                Define a new ability for your club's training system
            </p>
        </div>

        <form wire:submit.prevent="save">
            <!-- Inputs -->
            <div class="row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600;">Position Name (EN) <span
                            class="required">*</span></label>
                    <input type="text" wire:model.live="position_name_en" class="input-field"
                        placeholder="e.g. Striker">
                    @error('position_name_en')
                        <div class="text-danger" style="font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600;"> اسم المركز (AR) <span
                            class="required">*</span></label>
                    <input type="text" wire:model="position_name_ar" class="input-field" dir="rtl"
                        placeholder="مثال: مهاجم">
                    @error('position_name_ar')
                        <div class="text-danger" style="font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Generated Position Code Preview -->
                <div class="form-group" style="grid-column: span 2;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #94a3b8;">
                        System Generated Code
                    </label>
                    <div style="position: relative;">
                        <input type="text" value="{{ $this->position_code }}" disabled class="input-field"
                            style="background: rgba(34, 197, 94, 0.05); color: #22c55e; font-weight: 800; letter-spacing: 2px; text-align: center; border: 1px dashed rgba(34, 197, 94, 0.5); cursor: not-allowed;">
                        <span
                            style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); font-size: 10px; color: #22c55e; font-weight: bold; text-transform: uppercase; opacity: 0.8;">
                            ✨ Auto
                        </span>
                    </div>
                    <p style="font-size: 11px; color: #64748b; margin-top: 6px;">
                        The code is automatically generated based on the English name (e.g., Striker → STR, Wing Back →
                        WB).
                    </p>
                </div>



            </div>

            <!-- Buttons -->
            <div class="form-actions" style="margin-top: 40px; display: flex; gap: 12px;">
                <button type="submit" class="btn btn-primary" style="flex: 2;">
                    {{ $edit_position ? 'Update Position' : 'Create Position' }}
                </button>

                <button type="button" wire:click="closeModal" class="btn btn-outline" style="flex: 1;">
                    Cancel
                </button>
            </div>

        </form>

    </div>
</div>
