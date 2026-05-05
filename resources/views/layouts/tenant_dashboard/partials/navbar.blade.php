<!-- Top Navbar -->
<nav class="app-navbar">
    <div class="navbar-container">
        <!-- Start Links & Toggle -->
        <div class="navbar-start">
            <button class="navbar-btn" id="sidebar-toggle" title="Toggle Sidebar">
                <i class="bi bi-list fs-4"></i>
            </button>
            
            <div class="navbar-search">
                <div class="input-with-icon">
                    <i class="bi bi-search icon"></i>
                    <input type="text" class="input-field" placeholder="Search analytics, players..." style="background: rgba(255,255,255,0.05); border-color: rgba(255,255,255,0.1); color: white;">
                </div>
            </div>
        </div>

        <!-- End Links & User Profile -->
        <div class="navbar-end">
            <!-- Notifications -->
            <div style="position: relative;">
                <button class="navbar-btn" title="Notifications">
                    <i class="bi bi-bell-fill fs-5"></i>
                    <span class="navbar-badge">3</span>
                </button>
            </div>

            <!-- Fullscreen -->
            <button class="navbar-btn d-none d-md-flex" id="fullscreen-toggle" title="Toggle Fullscreen">
                <i class="bi bi-arrows-fullscreen fs-5"></i>
            </button>

            <!-- Theme Toggle -->
            <button class="navbar-btn" id="theme-toggle" title="Toggle Theme">
                <i class="bi bi-moon-stars-fill fs-5"></i>
            </button>

            <!-- Vertical Divider -->
            <div style="width: 1px; height: 30px; background: rgba(255, 255, 255, 0.1); margin: 0 var(--spacing-sm);"></div>

            <!-- User Profile -->
            <div class="navbar-user dropdown">
                <div class="navbar-user-info text-end me-2">
                    <div class="navbar-user-name">Abdo Ahmad</div>
                    <div class="navbar-user-role">Club Manager</div>
                </div>
                <!-- Initials Placeholder instead of image -->
                <div class="avatar-initials" title="Abdo Ahmad">
                    A
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    // Initialize Theme
    function initTheme() {
        const body = document.body;
        const icon = document.querySelector('#theme-toggle i');
        const searchInput = document.querySelector('.navbar-search .input-field');
        
        if (body.getAttribute('data-bs-theme') === 'dark') {
            icon.classList.replace('bi-moon-stars-fill', 'bi-sun-fill');
            if (searchInput) {
                searchInput.style.background = 'rgba(255,255,255,0.05)';
                searchInput.style.color = 'white';
            }
        } else {
            icon.classList.replace('bi-sun-fill', 'bi-moon-stars-fill');
            if (searchInput) {
                searchInput.style.background = 'var(--bg-light)';
                searchInput.style.color = 'var(--text-primary)';
            }
        }
    }

    // Sidebar Toggle Logic
    const sidebarToggle = document.getElementById('sidebar-toggle');
    const sidebar = document.querySelector('.sidebar');
    const appNavbar = document.querySelector('.app-navbar');
    const contentMain = document.querySelector('.content-main');

    sidebarToggle.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
        
        if (sidebar.classList.contains('collapsed')) {
            appNavbar.style.left = '0';
            contentMain.style.marginLeft = '0';
        } else {
            appNavbar.style.left = '280px';
            contentMain.style.marginLeft = '280px';
        }
    });

    // Fullscreen Logic
    const fullscreenToggle = document.getElementById('fullscreen-toggle');
    fullscreenToggle.addEventListener('click', () => {
        if (!document.fullscreenElement) {
            document.documentElement.requestFullscreen();
            fullscreenToggle.innerHTML = '<i class="bi bi-fullscreen-exit fs-5"></i>';
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
                fullscreenToggle.innerHTML = '<i class="bi bi-arrows-fullscreen fs-5"></i>';
            }
        }
    });

    // Theme Toggle Logic
    const themeToggle = document.getElementById('theme-toggle');
    themeToggle.addEventListener('click', () => {
        const body = document.body;
        
        if (body.getAttribute('data-bs-theme') === 'dark') {
            body.setAttribute('data-bs-theme', 'light');
        } else {
            body.setAttribute('data-bs-theme', 'dark');
        }
        initTheme();
    });

    // Run init on load
    initTheme();
</script>
