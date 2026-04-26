<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Football Club Management</title>
    <link rel="stylesheet" href="{{ asset('tenant-dashbard-files/styles.css') }}" />
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

    @stack("styles")
    @livewireStyles

</head>
