<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Football Club Management</title>
    <link rel="stylesheet" href="{{ global_asset('tenant-dashbard-files/styles.css') }}" />
    <style>
        .content-main {
            margin-left: 280px;
            padding: 2rem;
            min-height: 100vh;
        }

        .page-header {
            margin-bottom: 3rem;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            color: var(--text-secondary);
            font-size: 1.1rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            box-shadow: var(--shadow-sm);
            transition: all var(--transition-base);
        }

        .stat-card:hover {
            box-shadow: var(--shadow-md);
            border-color: var(--accent-green);
            transform: translateY(-4px);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.2), rgba(34, 197, 94, 0.1));
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .stat-label {
            font-size: 0.875rem;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .stat-change {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--success-green);
        }

        .stat-change.negative {
            color: var(--error-red);
        }

        .content-section {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--text-primary);
        }

        .activity-list {
            list-style: none;
        }

        .activity-item {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            gap: 1rem;
            align-items: flex-start;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            background: rgba(34, 197, 94, 0.1);
            flex-shrink: 0;
        }

        .activity-content {
            flex: 1;
        }

        .activity-title {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.25rem;
        }

        .activity-time {
            font-size: 0.85rem;
            color: var(--text-secondary);
        }

        .quick-links {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .quick-link {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.5rem;
            background: white;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            text-decoration: none;
            color: var(--text-primary);
            transition: all var(--transition-fast);
        }

        .quick-link:hover {
            border-color: var(--accent-green);
            box-shadow: var(--shadow-md);
            transform: translateX(4px);
        }

        .quick-link-icon {
            font-size: 1.5rem;
        }

        .quick-link-content {
            flex: 1;
        }

        .quick-link-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .quick-link-desc {
            font-size: 0.85rem;
            color: var(--text-secondary);
        }

        @media (max-width: 1024px) {
            .content-section {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .content-main {
                margin-left: 0;
                padding: 1rem;
            }

            .page-title {
                font-size: 1.75rem;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }

            .stat-value {
                font-size: 1.5rem;
            }
        }
    </style>

    <style>
        .content-main {
            margin-left: 280px;
            padding: 2rem;
            min-height: 100vh;
        }
    
        .page-header {
            margin-bottom: 2rem;
        }
    
        .page-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
    
        .page-subtitle {
            color: var(--text-secondary);
        }
    
        .toolbar {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }
    
        .toolbar-search {
            flex: 1;
            min-width: 250px;
        }
    
        .toolbar-filters {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }
    
        .toolbar-actions {
            display: flex;
            gap: 1rem;
        }
    
        .status-active {
            color: var(--success-green);
        }
    
        .status-injured {
            color: var(--warning-orange);
        }
    
        .status-banned {
            color: var(--error-red);
        }
    
        .pagination-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid var(--border-color);
        }
    
        .pagination-info {
            color: var(--text-secondary);
            font-size: 0.9rem;
        }
    
        .pagination-controls {
            display: flex;
            gap: 0.5rem;
        }
    
        .pagination-btn {
            padding: 0.5rem 1rem;
            background: white;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            color: var(--text-primary);
            cursor: pointer;
            transition: all var(--transition-fast);
        }
    
        .pagination-btn:hover:not(:disabled) {
            background: var(--accent-green);
            color: white;
            border-color: var(--accent-green);
        }
    
        .pagination-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
    
        @media (max-width: 768px) {
            .content-main {
                margin-left: 0;
                padding: 1rem;
            }
    
            .page-title {
                font-size: 1.5rem;
            }
    
            .toolbar {
                flex-direction: column;
            }
    
            .toolbar-search {
                min-width: auto;
            }
    
            .toolbar-filters {
                flex-direction: column;
            }
    
            .toolbar-actions {
                flex-direction: column;
            }
    
            .pagination-wrapper {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
        }
    </style>
<style>
    .content-main {
        margin-left: 280px;
        padding: 2rem;
        min-height: 100vh;
    }

    .page-header {
        margin-bottom: 2rem;
    }

    .page-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .page-subtitle {
        color: var(--text-secondary);
    }

    .forms-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .form-card {
        background: white;
        border: 1px solid var(--border-color);
        border-radius: var(--radius-lg);
        padding: 2rem;
        box-shadow: var(--shadow-sm);
    }

    .form-card h2 {
        font-size: 1.25rem;
        margin-bottom: 1.5rem;
        color: var(--text-primary);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    .form-group.two-col {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .form-group.three-col {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid var(--border-color);
    }

    .checkbox-group,
    .radio-group {
        margin-bottom: 1.5rem;
    }

    .checkbox-item,
    .radio-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 0.75rem;
        cursor: pointer;
    }

    .checkbox-item input,
    .radio-item input {
        width: 20px;
        height: 20px;
        cursor: pointer;
        accent-color: var(--accent-green);
    }

    .checkbox-item label,
    .radio-item label {
        margin: 0;
        cursor: pointer;
        font-weight: 500;
        color: var(--text-primary);
    }

    .full-width-form {
        background: white;
        border: 1px solid var(--border-color);
        border-radius: var(--radius-lg);
        padding: 2rem;
        box-shadow: var(--shadow-sm);
        max-width: 800px;
    }

    .form-section {
        margin-bottom: 2.5rem;
    }

    .form-section:last-child {
        margin-bottom: 0;
    }

    .form-section-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--accent-green);
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid var(--accent-green);
    }

    .form-section-subtitle {
        font-size: 0.9rem;
        color: var(--text-secondary);
        margin-bottom: 1.5rem;
    }

    .textarea-field {
        min-height: 120px;
        resize: vertical;
    }

    .input-hint {
        font-size: 0.85rem;
        color: var(--text-tertiary);
        margin-top: 0.5rem;
        display: block;
    }

    .required {
        color: var(--error-red);
    }

    @media (max-width: 768px) {
        .content-main {
            margin-left: 0;
            padding: 1rem;
        }

        .page-title {
            font-size: 1.5rem;
        }

        .forms-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .form-card {
            padding: 1.5rem;
        }

        .form-group.two-col,
        .form-group.three-col {
            grid-template-columns: 1fr;
            gap: 0.75rem;
        }

        .form-actions {
            flex-direction: column;
        }

        .full-width-form {
            padding: 1.5rem;
        }
    }
</style>
    @stack("styles")
    @livewireStyles

</head>
