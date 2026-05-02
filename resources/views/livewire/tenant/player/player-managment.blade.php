<div>
    @push('styles')
        <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.css" />
        <link rel="stylesheet"
            href="https://cdn.ckeditor.com/ckeditor5-premium-features/43.0.0/ckeditor5-premium-features.css" />
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

            /* Premium CKEditor Integration */
            :root {
                --ck-color-base-border: #e2e8f0;
                --ck-color-base-background: #ffffff;
                --ck-color-focus-border: #22c55e;
                --ck-color-shadow-drop: rgba(34, 197, 94, 0.1);
                --ck-border-radius: 12px;
                --ck-color-toolbar-background: #f8fafc;
                --ck-color-toolbar-border: #e2e8f0;
            }

            .ck-editor {
                margin-top: 8px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
                border-radius: var(--ck-border-radius) !important;
                overflow: hidden;
                transition: all 0.3s ease;
            }

            .ck-editor:hover {
                border-color: rgba(34, 197, 94, 0.4) !important;
            }

            .ck-editor.ck-focused {
                box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1) !important;
            }

            .ck-editor__editable,
            .ck-editor__editable *,
            .ck-content,
            .ck-content * {
                color: #000000 !important;
                opacity: 1 !important;
                -webkit-text-fill-color: #000000 !important;
            }

            .ck-editor__editable {
                min-height: 250px !important;
                background: #ffffff !important;
                padding: 1.25rem 1.5rem !important;
                font-size: 15px !important;
                line-height: 1.7 !important;
                border: none !important;
            }

            #editor_ar+.ck-editor .ck-editor__editable {
                direction: rtl !important;
                text-align: right !important;
            }

            /* Toolbar Styling */
            .ck-toolbar {
                background: var(--ck-color-toolbar-background) !important;
                border-bottom: 1px solid var(--ck-color-toolbar-border) !important;
                padding: 0.5rem !important;
            }

            .ck-toolbar__items {
                gap: 2px !important;
            }

            .ck.ck-button {
                border-radius: 8px !important;
                padding: 4px !important;
                transition: all 0.2s ease !important;
            }

            .ck.ck-button:hover {
                background: rgba(34, 197, 94, 0.08) !important;
                color: #16a34a !important;
            }

            .ck.ck-button.ck-on {
                background: #22c55e !important;
                color: #ffffff !important;
            }

            /* Border removal for seamless look */
            .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
                border: 1px solid #e2e8f0 !important;
                border-top: none !important;
            }

            .ck.ck-editor__main>.ck-editor__editable.ck-focused {
                border: 1px solid #22c55e !important;
                border-top: none !important;
            }

            .top-scrollbar-container {
                width: 100%;
                overflow-x: auto;
                overflow-y: hidden;
                z-index: 10;
                position: relative;
                /* Remove spacing between scrollbar and table */
                margin-bottom: 0;
            }

            .top-scrollbar-container::-webkit-scrollbar {
                height: 8px;
            }

            .top-scrollbar-container::-webkit-scrollbar-track {
                background: #f8fafc;
                border-radius: 16px;
                border: 1px solid rgba(34, 197, 94, 0.2);
            }

            .top-scrollbar-container::-webkit-scrollbar-thumb {
                background: #cbd5e1;
                border-radius: 8px;
            }

            .top-scrollbar-container::-webkit-scrollbar-thumb:hover {
                background: #94a3b8;
            }

            #top-scroll-content {
                height: 1px;
            }

            /* Custom Scrollbar for the table wrapper */
            .table-wrapper::-webkit-scrollbar {
                height: 8px;
                width: 8px;
            }

            .table-wrapper::-webkit-scrollbar-track {
                background: #f8fafc;
                border-radius: 0 0 16px 16px;
            }

            .table-wrapper::-webkit-scrollbar-thumb {
                background: #cbd5e1;
                border-radius: 8px;
            }

            .table-wrapper::-webkit-scrollbar-thumb:hover {
                background: #94a3b8;
            }

            /* --- New Premium Table Styles --- */
            .table-wrapper {
                background: #ffffff;
                border-radius: 16px;
                border: 1px solid rgba(34, 197, 94, 0.2);
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
                overflow-x: auto;
                position: relative;
                margin-top: 0;
            }

            .table {
                width: 100%;
                min-width: 1200px;
                border-collapse: separate;
                border-spacing: 0;
            }

            .table th {
                background: #f8fafc;
                padding: 16px;
                font-size: 13px;
                font-weight: 700;
                color: #0f172a;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                border-bottom: 2px solid #e2e8f0;
                white-space: nowrap;
                position: sticky;
                top: 0;
                z-index: 20;
            }

            .table td {
                padding: 16px;
                vertical-align: middle;
                border-bottom: 1px solid #f1f5f9;
                color: #475569;
                font-size: 14px;
                white-space: nowrap;
                transition: background-color 0.2s;
            }

            /* Sticky Columns */
            .sticky-left {
                position: sticky !important;
                left: 0 !important;
                background-color: #ffffff !important;
                z-index: 50 !important;
                border-right: 1px solid #e2e8f0 !important;
                background-clip: padding-box !important;
            }

            .sticky-right {
                position: sticky !important;
                right: 0 !important;
                background-color: #ffffff !important;
                z-index: 50 !important;
                border-left: 1px solid #e2e8f0 !important;
                background-clip: padding-box !important;
            }

            /* Prevent header overlap issues */
            .table th.sticky-left,
            .table th.sticky-right {
                background-color: #f8fafc !important;
                z-index: 60 !important;
                /* Higher than normal th (20) and sticky td (50) */
            }

            /* Solid background on hover to prevent transparency showing scrolling data */
            .table tbody tr:hover td {
                background-color: #f8fafc;
            }

            .table tbody tr:hover td.sticky-left,
            .table tbody tr:hover td.sticky-right {
                background-color: #f8fafc !important;
            }

            /* Premium Badges */
            .badge-premium {
                padding: 6px 12px;
                border-radius: 8px;
                font-size: 12px;
                font-weight: 600;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 4px;
                white-space: nowrap;
                border: 1px solid rgba(255, 255, 255, 0.5);
                box-shadow: inset 0 1px 2px rgba(255, 255, 255, 0.3), 0 2px 4px rgba(0, 0, 0, 0.05);
            }

            .badge-status-active {
                background: rgba(34, 197, 94, 0.15);
                color: #16a34a;
                border-color: rgba(34, 197, 94, 0.3);
            }

            .badge-status-banned {
                background: rgba(239, 68, 68, 0.15);
                color: #dc2626;
                border-color: rgba(239, 68, 68, 0.3);
            }

            .badge-status-injured {
                background: rgba(245, 158, 11, 0.15);
                color: #d97706;
                border-color: rgba(245, 158, 11, 0.3);
            }

            .badge-pos-primary {
                background: linear-gradient(135deg, rgba(212, 175, 55, 0.2) 0%, rgba(212, 175, 55, 0.1) 100%);
                color: #b48608;
                border: 1px solid rgba(212, 175, 55, 0.4);
            }

            .badge-pos-secondary {
                background: rgba(59, 130, 246, 0.1);
                color: #2563eb;
                border-color: rgba(59, 130, 246, 0.2);
            }

            .badge-skill {
                background: rgba(139, 92, 246, 0.1);
                color: #7c3aed;
                border-color: rgba(139, 92, 246, 0.2);
            }

            /* Unit Badges (kg, cm, yrs) */
            .badge-unit {
                padding: 2px 8px;
                border-radius: 6px;
                font-size: 13px;
                font-weight: 700;
                margin-left: 4px;
                vertical-align: middle;
                border: 1px solid transparent;
            }

            .badge-unit-cm {
                background: rgba(34, 197, 94, 0.1);
                color: #16a34a;
                border-color: rgba(34, 197, 94, 0.2);
            }

            .badge-unit-kg {
                background: rgba(245, 158, 11, 0.1);
                color: #d97706;
                border-color: rgba(245, 158, 11, 0.2);
            }

            .badge-unit-yrs {
                background: rgba(139, 92, 246, 0.1);
                color: #7c3aed;
                border-color: rgba(139, 92, 246, 0.2);
            }

            .player-info-block {
                display: flex;
                align-items: center;
                gap: 12px;
            }

            .player-avatar-wrap {
                position: relative;
            }

            .player-avatar {
                width: 45px;
                height: 45px;
                border-radius: 12px;
                object-fit: cover;
                border: 2px solid #ffffff;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.08);
            }

            .player-avatar-placeholder {
                width: 45px;
                height: 45px;
                border-radius: 12px;
                background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 20px;
                border: 2px solid #ffffff;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.08);
            }

            .table-actions {
                display: flex;
                gap: 8px;
                justify-content: center;
            }

            .action-btn {
                width: 32px;
                height: 32px;
                border-radius: 8px;
                font-size: 13px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border: 1px solid rgba(255, 255, 255, 0.5);
                box-shadow: inset 0 1px 2px rgba(255, 255, 255, 0.3), 0 2px 4px rgba(0, 0, 0, 0.05);
                transition: all 0.2s ease;
                cursor: pointer;
            }

            .action-view {
                background: rgba(59, 130, 246, 0.1);
                color: #2563eb;
                border-color: rgba(59, 130, 246, 0.2);
            }

            .action-view:hover {
                background: rgba(59, 130, 246, 0.2);
                transform: translateY(-2px);
            }

            .action-edit {
                background: rgba(245, 158, 11, 0.1);
                color: #d97706;
                border-color: rgba(245, 158, 11, 0.2);
            }

            .action-edit:hover {
                background: rgba(245, 158, 11, 0.2);
                transform: translateY(-2px);
            }

            .action-delete {
                background: rgba(239, 68, 68, 0.1);
                color: #dc2626;
                border-color: rgba(239, 68, 68, 0.2);
            }

            .action-delete:hover {
                background: rgba(239, 68, 68, 0.2);
                transform: translateY(-2px);
            }
        </style>
    @endpush

    @if ($screen == 'list')
        @include('livewire.tenant.player.partials.list-players')
    @elseif($screen == 'form')
        @include('livewire.tenant.player.partials.player-form')

    @endif

    @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.umd.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5-premium-features.umd.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            // 1. دالة تظبيط الاسكرول العلوي ليتماشى مع عرض الجدول
            function initTopScroll() {
                const topScroll = document.getElementById('top-scrollbar');
                const tableWrapper = document.getElementById('main-table-wrapper');
                const topScrollContent = document.getElementById('top-scroll-content');

                if (topScroll && tableWrapper && topScrollContent) {
                    const table = tableWrapper.querySelector('.table');
                    if (table) {
                        // تحديث عرض المحتوى العلوي ليكون مطابق لعرض الجدول الفعلي
                        topScrollContent.style.width = table.offsetWidth + 'px';
                    }

                    // ربط حركة السكرول بين الجزء العلوي والجدول (مرة واحدة فقط)
                    if (!topScroll.hasAttribute('data-synced')) {
                        topScroll.addEventListener('scroll', () => {
                            tableWrapper.scrollLeft = topScroll.scrollLeft;
                        });

                        tableWrapper.addEventListener('scroll', () => {
                            topScroll.scrollLeft = tableWrapper.scrollLeft;
                        });

                        // تحديث العرض عند تغيير حجم الشاشة
                        window.addEventListener('resize', () => {
                            const currentTable = tableWrapper.querySelector('.table');
                            if (currentTable) {
                                topScrollContent.style.width = currentTable.offsetWidth + 'px';
                            }
                        });
                        topScroll.setAttribute('data-synced', 'true');
                    }
                }
            }

            // 2. دالة تشغيل Select2 ونظام بطاقات المراكز (Primary/Reserve)
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

                // التأكد إن المركز الأساسي المختار لسه موجود في القائمة المحددة
                if (primaryPositionId && !selectedIds.includes(primaryPositionId.toString())) {
                    primaryPositionId = null;
                }
                // اختيار أول مركز تلقائياً لو مفيش مركز أساسي محدد
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
                        </div>`;
                    grid.append(card);
                });

                // مزامنة المركز الأساسي مع Livewire
                if (window.Livewire) {
                    @this.set('primary_position_id', primaryPositionId, true);
                }
            }

            // تهيئة مكتبة Select2 وربطها بـ Livewire
            function initSelect() {
                const selectElement = $('#skills-select2');
                const positionElement = $('#position-select2');

                if (positionElement.length) {
                    positionElement.select2({
                        placeholder: "Select player position...",
                        allowClear: true,
                        width: '100%',
                    }).on('change', function() {
                        let data = $(this).val();
                        @this.set('selected_position', data);
                        renderPositionCards(data);
                    });
                    renderPositionCards(positionElement.val());
                }

                if (selectElement.length) {
                    selectElement.select2({
                        placeholder: "Select player skills...",
                        allowClear: true,
                        width: '100%',
                    }).on('change', function() {
                        let data = $(this).val();
                        @this.set('selected_skills', data);
                    });
                }
            }

            // 3. دالة تشغيل محرر النصوص CKEditor للمحتوى العربي والإنجليزي
            function initCKEditor() {
                if (typeof CKEDITOR === 'undefined') return;
                // التأكد من عدم إنشاء نسخة مكررة لنفس العنصر
                if (document.querySelector('.ck-editor')) return;

                const { ClassicEditor, Essentials, Paragraph, Bold, Italic, Underline, Strikethrough, FontSize, FontFamily, FontColor, FontBackgroundColor, Link, List, BlockQuote, Alignment, Table, TableToolbar, MediaEmbed, Undo, Heading, RemoveFormat, HorizontalLine, SpecialCharacters, SourceEditing, Highlight, FindAndReplace, Base64UploadAdapter, Image, ImageToolbar, ImageCaption, ImageStyle, ImageResize, LinkImage, ImageUpload, ListProperties, TodoList } = CKEDITOR;

                const commonConfig = {
                    plugins: [ Essentials, Paragraph, Bold, Italic, Underline, Strikethrough, FontSize, FontFamily, FontColor, FontBackgroundColor, Link, List, ListProperties, TodoList, BlockQuote, Alignment, Table, TableToolbar, MediaEmbed, Undo, Heading, RemoveFormat, HorizontalLine, SpecialCharacters, SourceEditing, Highlight, FindAndReplace, Base64UploadAdapter, Image, ImageToolbar, ImageCaption, ImageStyle, ImageResize, LinkImage, ImageUpload ],
                    toolbar: {
                        items: [ 'undo', 'redo', '|', 'sourceEditing', 'findAndReplace', '|', 'heading', '|', 'bold', 'italic', 'underline', 'strikethrough', 'highlight', '|', 'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|', 'link', 'uploadImage', 'insertTable', 'mediaEmbed', 'horizontalLine', 'specialCharacters', '|', 'bulletedList', 'numberedList', 'todoList', '|', 'alignment', 'outdent', 'indent', '|', 'removeFormat' ],
                        shouldNotGroupWhenFull: true
                    },
                    image: {
                        toolbar: [ 'imageStyle:inline', 'imageStyle:block', 'imageStyle:side', '|', 'toggleImageCaption', 'imageTextAlternative', '|', 'linkImage' ]
                    },
                    table: {
                        contentToolbar: [ 'tableColumn', 'tableRow', 'mergeTableCells', '|', 'tableProperties', 'tableCellProperties' ]
                    }
                };

                ['#editor_ar', '#editor_en'].forEach(selector => {
                    const el = document.querySelector(selector);
                    if (el) {
                        ClassicEditor.create(el, {
                            ...commonConfig,
                            language: selector.includes('ar') ? 'ar' : 'en',
                            placeholder: selector.includes('ar') ? 'اكتب وصف اللاعب باللغة العربية...' : 'Enter player description in English...',
                        }).then(editor => {
                            // تحديث قيمة Livewire فوراً عند تغيير النص
                            editor.model.document.on('change:data', () => {
                                const field = selector.includes('ar') ? 'description_ar' : 'description_en';
                                @this.set(field, editor.getData(), true);
                            });
                        });
                    }
                });
            }

            // تشغيل جميع الدوال عند أول تحميل للصفحة
            document.addEventListener('DOMContentLoaded', () => {
                initTopScroll();
                initSelect();
                initCKEditor();
            });

            /**
             * خاص بـ Livewire 3:
             * هذا الجزء يضمن بقاء جميع الأدوات (Select2, CKEditor, Scroll) تعمل بكفاءة حتى بعد تحديث الصفحة برمجياً.
             * 
             * livewire:initialized: يتم استدعاؤه بمجرد أن ينتهي Livewire من تحميل نفسه في المتصفح.
             * Livewire.hook('morph.updated'): هذا هو "السر"؛ فعندما يقوم Livewire بتغيير أي جزء من الـ DOM (مثلاً عند البحث أو التبديل بين الشاشات)،
             * تفقد المكتبات مثل Select2 و CKEditor اتصالها بالعناصر القديمة. هذا الهوك يعيد تشغيلهم فوراً على العناصر الجديدة.
             */
            document.addEventListener('livewire:initialized', () => {
                initTopScroll();
                initSelect();
                initCKEditor();

                Livewire.hook('morph.updated', () => {
                    // استخدام setTimeout بسيط للتأكد من استقرار الـ DOM قبل إعادة التهيئة
                    setTimeout(() => {
                        initTopScroll();
                        initSelect();
                        initCKEditor();
                    }, 50);
                });
            });

            // مراقبة النقر على بطاقات المراكز لتحديد المركز الأساسي (Primary)
            $(document).on('click', '.position-card', function() {
                primaryPositionId = $(this).data('id').toString();
                renderPositionCards($('#position-select2').val() || []);
            });
        </script>
    @endpush
</div>
