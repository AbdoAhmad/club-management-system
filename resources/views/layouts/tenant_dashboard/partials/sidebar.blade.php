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
            <a href="{{ route('tenant_dashboard') }}" class="nav-item active">
                <span class="nav-item-icon">📊</span>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('players') }}" class="nav-item">
                <span class="nav-item-icon">👥</span>
                <span>Players</span>
            </a>
            <a href="{{ route('skills') }}" class="nav-item">
                <span class="nav-item-icon">📋</span>
                <span>Skills</span>
            </a>
            <a href="{{ route('positions') }}" class="nav-item">
                <span class="nav-item-icon">⚽</span>
                <span>Positions</span>
            </a>
            <a href="#training" class="nav-item">
                <span class="nav-item-icon">💪</span>
                <span>Training</span>
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
