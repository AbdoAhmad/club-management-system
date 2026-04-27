<style>
    .nav-submenu {
        display: none;
        padding-left: 2rem;
        background: rgba(0,0,0,0.2);
        border-radius: 0 0 12px 12px;
        margin-bottom: 8px;
        border-left: 2px solid rgba(34, 197, 94, 0.3);
        margin-left: 1.2rem;
    }
    .nav-submenu.show {
        display: block;
    }
    .nav-submenu-item {
        display: flex;
        align-items: center;
        padding: 0.7rem 1rem;
        color: rgba(255,255,255,0.6);
        text-decoration: none;
        font-size: 0.85rem;
        transition: all 0.2s ease;
        border-radius: 8px;
        margin: 2px 5px;
    }
    .nav-submenu-item:hover, .nav-submenu-item.active-sub {
        color: #fff;
        background: rgba(34, 197, 94, 0.1);
    }
    .nav-submenu-item.active-sub {
        color: #22c55e;
        font-weight: 600;
    }
    .nav-header {
        color: #fff !important;
        background: rgba(255,255,255,0.03);
        border-bottom: 1px solid rgba(255,255,255,0.05);
        margin-top: 10px;
    }
    .nav-header.active {
        border-left: 4px solid #22c55e;
        background: rgba(34, 197, 94, 0.05);
    }
    .nav-item {
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .fw-bold { font-weight: 700; }
    
    /* Custom Table & Cards Styles */
    .section-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: #fff;
        margin-bottom: 1.5rem;
    }
    .custom-table {
        color: rgba(255,255,255,0.8);
        border-collapse: separate;
        border-spacing: 0 8px;
    }
    .custom-table thead th {
        border: none;
        color: rgba(255,255,255,0.5);
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1px;
        padding: 1rem;
    }
    .custom-table tbody tr {
        background: rgba(255,255,255,0.03);
        transition: all 0.3s ease;
    }
    .custom-table tbody tr:hover {
        background: rgba(255,255,255,0.06);
        transform: translateY(-2px);
    }
    .custom-table td {
        padding: 1.2rem 1rem;
        border: none;
        vertical-align: middle;
    }
    .custom-table td:first-child { border-radius: 12px 0 0 12px; }
    .custom-table td:last-child { border-radius: 0 12px 12px 0; }
    
    .form-control, .form-select {
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.1);
        color: #fff;
        border-radius: 10px;
        padding: 0.7rem 1rem;
    }
    .form-control:focus, .form-select:focus {
        background: rgba(255,255,255,0.08);
        border-color: #22c55e;
        color: #fff;
        box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.1);
    }
</style>
<aside class="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <div class="sidebar-logo-icon">⚽</div>
                <div>
                    <div>Football Club</div>
                    <div style="font-size: 0.75rem; color: rgba(255,255,255,0.7);">Management</div>
                </div>
            </div>
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('tenant_dashboard') }}" class="nav-item {{ request()->routeIs('tenant_dashboard') ? 'active' : '' }}">
                <span class="nav-item-icon">🏠</span>
                <span>Dashboard</span>
            </a>

            <!-- Players Dropdown -->
            <div class="nav-dropdown">
                <div class="nav-item nav-header {{ request()->routeIs('players*') ? 'active' : '' }}">
                    <span class="nav-item-icon">👟</span>
                    <span class="fw-bold">Players Management</span>
                </div>
                <div class="nav-submenu {{ request()->routeIs('players') ? 'show' : '' }}">
                    <a href="{{ route('players',['screan' => 'list']) }}"  class="nav-submenu-item {{ request()->routeIs('players') && request('screan') == 'list' ? 'active-sub' : '' }}">
                        <span class="me-2">📁</span>
                        <span>Show All Players</span>
                    </a>
                    <a href="{{ route('players',['screan' => 'form']) }}" class="nav-submenu-item {{ request()->routeIs('players') && request('screan') == 'form' ? 'active-sub' : '' }}">
                        <span class="me-2">➕</span>
                        <span>Register New Player</span>
                    </a>
                </div>
            </div>

            <!-- Skills Dropdown -->
            <div class="nav-dropdown">
                <div class="nav-item nav-header {{ request()->routeIs('skills') ? 'active' : '' }}">
                    <span class="nav-item-icon">⚡</span>
                    <span class="fw-bold">Skills & Abilities</span>
                </div>
                <div class="nav-submenu {{ request()->routeIs('skills') ? 'show' : '' }}">
                    <a href="{{ route('skills', ['screan' => 'list']) }}" class="nav-submenu-item {{ request()->routeIs('skills') && request('screan') == 'list' ? 'active-sub' : '' }}">
                        <span class="me-2">📊</span>
                        <span>Skill Registry</span>
                    </a>
                    <a href="{{ route('skills', ['screan' => 'form']) }}" class="nav-submenu-item {{ request()->routeIs('skills') && request('screan') == 'form' ? 'active-sub' : '' }}">
                        <span class="me-2">✨</span>
                        <span>Create New Skill</span>
                    </a>
                </div>
            </div>

            <!-- Positions Dropdown -->
            <div class="nav-dropdown">
                <div class="nav-item nav-header {{ request()->routeIs('positions') ? 'active' : '' }}">
                    <span class="nav-item-icon">📍</span>
                    <span class="fw-bold">Field Positions</span>
                </div>
                <div class="nav-submenu {{ request()->routeIs('positions') ? 'show' : '' }}">
                    <a href="{{ route('positions', ['screan' => 'list']) }}" class="nav-submenu-item {{ request()->routeIs('positions') && request('screan') == 'list' ? 'active-sub' : '' }}">
                        <span class="me-2">🛡️</span>
                        <span>Positions List</span>
                    </a>
                    <a href="{{ route('positions', ['screan' => 'form']) }}" class="nav-submenu-item {{ request()->routeIs('positions') && request('screan') == 'form' ? 'active-sub' : '' }}">
                        <span class="me-2">🚩</span>
                        <span>Define Position</span>
                    </a>
                </div>
            </div>

            <a href="#training" class="nav-item">
                <span class="nav-item-icon">💪</span>
                <span>Training Sessions</span>
            </a>
            <a href="#settings" class="nav-item">
                <span class="nav-item-icon">⚙️</span>
                <span>Settings</span>
            </a>

            <a href="{{ route('tenant.logout') }}" class="nav-item">
                <span class="nav-item-icon">🚪</span>
                <span>Logout</span>
            </a>
        </nav>
    </aside>

    <script>
        document.querySelectorAll('.nav-dropdown .nav-item').forEach(item => {
            item.addEventListener('click', function() {
                const submenu = this.nextElementSibling;
                const arrow = this.querySelector('.dropdown-arrow');
                
                // Toggle current submenu
                submenu.classList.toggle('show');
                
                // Optional: Rotate arrow
                if(arrow) {
                    arrow.style.transform = submenu.classList.contains('show') ? 'rotate(180deg)' : 'rotate(0deg)';
                }
            });
        });
    </script>
