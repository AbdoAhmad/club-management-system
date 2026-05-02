/* =====================================================
   FOOTBALL CLUB MANAGEMENT UI KIT - SCRIPTS
   ===================================================== */

/* =====================================================
   1. SIDEBAR & NAVIGATION
   ===================================================== */

class Sidebar {
    constructor() {
        this.sidebar = document.querySelector('.sidebar');
        this.toggleBtn = document.querySelector('[data-toggle="sidebar"]');
        this.navItems = document.querySelectorAll('.nav-item');
        this.init();
    }

    init() {
        if (this.toggleBtn) {
            this.toggleBtn.addEventListener('click', () => this.toggle());
        }

        this.navItems.forEach(item => {
            item.addEventListener('click', (e) => this.handleNavClick(e));
        });

        // Close sidebar on mobile when clicking a nav item
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.sidebar') && 
                !e.target.closest('[data-toggle="sidebar"]')) {
                if (window.innerWidth < 768) {
                    this.close();
                }
            }
        });
    }

    toggle() {
        if (this.sidebar.classList.contains('collapsed')) {
            this.open();
        } else {
            this.close();
        }
    }

    open() {
        this.sidebar.classList.remove('collapsed');
        document.body.style.overflow = 'hidden';
    }

    close() {
        this.sidebar.classList.add('collapsed');
        document.body.style.overflow = '';
    }

    handleNavClick(e) {
        if (e.target.closest('.nav-item').hasAttribute('href')) {
            return; // Allow normal link behavior
        }

        e.preventDefault();
        const item = e.currentTarget;
        
        // Remove active class from all items
        this.navItems.forEach(nav => nav.classList.remove('active'));
        
        // Add active class to clicked item
        item.classList.add('active');

        // Close sidebar on mobile
        if (window.innerWidth < 768) {
            this.close();
        }
    }
}

/* =====================================================
   2. FORM VALIDATION & HANDLING
   ===================================================== */

/* FormValidator class removed as requested */

/* Style for error messages */
const errorStyles = document.createElement('style');
errorStyles.textContent = `
    .form-group {
        margin-bottom: 1.5rem;
    }

    .input-field.error {
        border-color: #ef4444;
        background: rgba(239, 68, 68, 0.05);
    }

    .error-message {
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 0.5rem;
        display: block;
    }

    .notification {
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        padding: 1rem 1.5rem;
        border-radius: 0.75rem;
        color: white;
        font-weight: 600;
        z-index: 2000;
        transform: translateY(400px);
        transition: transform 0.3s ease;
    }

    .notification.show {
        transform: translateY(0);
    }

    .notification-success {
        background: #22c55e;
    }

    .notification-error {
        background: #ef4444;
    }

    .notification-warning {
        background: #f59e0b;
    }

    .notification-info {
        background: #3b82f6;
    }
`;
document.head.appendChild(errorStyles);

/* =====================================================
   3. TABLE FILTERING & PAGINATION
   ===================================================== */

class TableManager {
    constructor(tableSelector) {
        this.table = document.querySelector(tableSelector);
        this.rows = Array.from(this.table.querySelectorAll('tbody tr'));
        this.currentPage = 1;
        this.itemsPerPage = 10;
        this.filteredRows = [...this.rows];
        this.init();
    }

    init() {
        this.setupSearch();
        this.setupFilters();
        this.setupPagination();
        this.render();
    }

    setupSearch() {
        const searchInput = document.querySelector('[data-table-search]');
        if (searchInput) {
            searchInput.addEventListener('input', (e) => {
                this.search(e.target.value);
            });
        }
    }

    search(query) {
        const searchTerm = query.toLowerCase();
        this.filteredRows = this.rows.filter(row => {
            const text = row.textContent.toLowerCase();
            return text.includes(searchTerm);
        });
        this.currentPage = 1;
        this.render();
    }

    setupFilters() {
        const filters = document.querySelectorAll('[data-table-filter]');
        filters.forEach(filter => {
            filter.addEventListener('change', (e) => {
                this.applyFilters();
            });
        });
    }

    applyFilters() {
        const filters = document.querySelectorAll('[data-table-filter]');
        let filtered = [...this.rows];

        filters.forEach(filter => {
            const filterValue = filter.value;
            const filterColumn = filter.getAttribute('data-table-filter');

            if (filterValue) {
                filtered = filtered.filter(row => {
                    const cell = row.querySelector(`[data-column="${filterColumn}"]`);
                    return cell && cell.textContent.toLowerCase().includes(filterValue.toLowerCase());
                });
            }
        });

        this.filteredRows = filtered;
        this.currentPage = 1;
        this.render();
    }

    setupPagination() {
        const prevBtn = document.querySelector('[data-pagination="prev"]');
        const nextBtn = document.querySelector('[data-pagination="next"]');

        if (prevBtn) {
            prevBtn.addEventListener('click', () => this.previousPage());
        }
        if (nextBtn) {
            nextBtn.addEventListener('click', () => this.nextPage());
        }
    }

    nextPage() {
        const maxPage = Math.ceil(this.filteredRows.length / this.itemsPerPage);
        if (this.currentPage < maxPage) {
            this.currentPage++;
            this.render();
        }
    }

    previousPage() {
        if (this.currentPage > 1) {
            this.currentPage--;
            this.render();
        }
    }

    render() {
        // Hide all rows
        this.rows.forEach(row => row.style.display = 'none');

        // Show current page rows
        const start = (this.currentPage - 1) * this.itemsPerPage;
        const end = start + this.itemsPerPage;

        for (let i = start; i < end && i < this.filteredRows.length; i++) {
            this.filteredRows[i].style.display = '';
        }

        // Update pagination info
        this.updatePaginationInfo();
    }

    updatePaginationInfo() {
        const infoEl = document.querySelector('[data-pagination="info"]');
        if (infoEl) {
            const maxPage = Math.ceil(this.filteredRows.length / this.itemsPerPage);
            const start = (this.currentPage - 1) * this.itemsPerPage + 1;
            const end = Math.min(this.currentPage * this.itemsPerPage, this.filteredRows.length);
            const total = this.filteredRows.length;

            infoEl.textContent = `Showing ${start} to ${end} of ${total}`;
        }
    }
}

/* =====================================================
   4. DROPDOWN & MENU
   ===================================================== */

class Dropdown {
    constructor(triggerSelector) {
        this.trigger = document.querySelector(triggerSelector);
        this.menu = this.trigger?.nextElementSibling;
        this.isOpen = false;
        this.init();
    }

    init() {
        if (!this.trigger || !this.menu) return;

        this.trigger.addEventListener('click', (e) => {
            e.stopPropagation();
            this.toggle();
        });

        this.menu.querySelectorAll('a, button').forEach(item => {
            item.addEventListener('click', () => this.close());
        });

        document.addEventListener('click', () => this.close());
    }

    toggle() {
        if (this.isOpen) {
            this.close();
        } else {
            this.open();
        }
    }

    open() {
        this.menu.style.display = 'block';
        this.isOpen = true;
        this.menu.classList.add('animate-slide-down');
    }

    close() {
        this.menu.style.display = 'none';
        this.isOpen = false;
    }
}

/* =====================================================
   5. MODAL DIALOG
   ===================================================== */

class Modal {
    constructor(modalSelector) {
        this.modal = document.querySelector(modalSelector);
        this.overlay = this.modal?.parentElement;
        this.closeBtn = this.modal?.querySelector('[data-action="close"]');
        this.init();
    }

    init() {
        if (!this.modal) return;

        if (this.closeBtn) {
            this.closeBtn.addEventListener('click', () => this.close());
        }

        if (this.overlay) {
            this.overlay.addEventListener('click', (e) => {
                if (e.target === this.overlay) {
                    this.close();
                }
            });
        }

        // Close on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && this.overlay?.classList.contains('active')) {
                this.close();
            }
        });
    }

    open() {
        this.overlay?.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    close() {
        this.overlay?.classList.remove('active');
        document.body.style.overflow = '';
    }
}

/* =====================================================
   6. TABS
   ===================================================== */

class Tabs {
    constructor(containerSelector) {
        this.container = document.querySelector(containerSelector);
        this.tabs = this.container?.querySelectorAll('[role="tab"]');
        this.panels = this.container?.querySelectorAll('[role="tabpanel"]');
        this.init();
    }

    init() {
        if (!this.tabs || !this.panels) return;

        this.tabs.forEach((tab, index) => {
            tab.addEventListener('click', () => this.selectTab(index));
            
            // Keyboard navigation
            tab.addEventListener('keydown', (e) => {
                let targetIndex = -1;
                if (e.key === 'ArrowRight') {
                    targetIndex = (index + 1) % this.tabs.length;
                } else if (e.key === 'ArrowLeft') {
                    targetIndex = (index - 1 + this.tabs.length) % this.tabs.length;
                }
                
                if (targetIndex !== -1) {
                    e.preventDefault();
                    this.tabs[targetIndex].focus();
                    this.selectTab(targetIndex);
                }
            });
        });
    }

    selectTab(index) {
        // Deactivate all tabs and panels
        this.tabs.forEach(tab => {
            tab.classList.remove('active');
            tab.setAttribute('aria-selected', 'false');
        });
        this.panels.forEach(panel => panel.hidden = true);

        // Activate selected tab and panel
        this.tabs[index].classList.add('active');
        this.tabs[index].setAttribute('aria-selected', 'true');
        this.panels[index].hidden = false;
    }
}

/* =====================================================
   7. TOOLTIPS
   ===================================================== */

class Tooltip {
    constructor() {
        this.tooltips = document.querySelectorAll('[data-tooltip]');
        this.init();
    }

    init() {
        this.tooltips.forEach(element => {
            element.addEventListener('mouseenter', (e) => this.show(e));
            element.addEventListener('mouseleave', (e) => this.hide(e));
        });
    }

    show(e) {
        const element = e.target;
        const text = element.getAttribute('data-tooltip');
        
        const tooltip = document.createElement('div');
        tooltip.className = 'tooltip';
        tooltip.textContent = text;
        tooltip.style.cssText = `
            position: absolute;
            background: #0f172a;
            color: white;
            padding: 0.5rem 0.75rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            white-space: nowrap;
            z-index: 1000;
            pointer-events: none;
        `;
        
        document.body.appendChild(tooltip);
        
        const rect = element.getBoundingClientRect();
        tooltip.style.left = rect.left + rect.width / 2 - tooltip.offsetWidth / 2 + 'px';
        tooltip.style.top = rect.top - tooltip.offsetHeight - 8 + 'px';
        
        element._tooltip = tooltip;
    }

    hide(e) {
        const element = e.target;
        if (element._tooltip) {
            element._tooltip.remove();
            delete element._tooltip;
        }
    }
}

/* =====================================================
   8. INITIALIZATION
   ===================================================== */

document.addEventListener('DOMContentLoaded', () => {
    // Initialize main components
    new Sidebar();
    new Tooltip();

    // Initialize page-specific components
    // Livewire Notification Listener
    window.addEventListener('notify', event => {
        const data = event.detail[0] || event.detail;
        window.UI.notify(data.message, data.type || 'success');
    });

    if (document.querySelector('table')) {
        new TableManager('table');
    }

    // Initialize all dropdowns
    document.querySelectorAll('[data-dropdown]').forEach(trigger => {
        new Dropdown(`[data-dropdown="${trigger.getAttribute('data-dropdown')}"]`);
    });

    // Initialize all modals
    document.querySelectorAll('.modal-overlay').forEach(overlay => {
        const modal = overlay.querySelector('.modal');
        if (modal) {
            new Modal('.modal');
        }
    });

    // Initialize all tab groups
    document.querySelectorAll('[data-tabs]').forEach(container => {
        new Tabs(`[data-tabs="${container.getAttribute('data-tabs')}"]`);
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener('click', (e) => {
            const target = document.querySelector(link.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
});

/* =====================================================
   9. UTILITY FUNCTIONS
   ===================================================== */

// Add utility functions for common tasks
window.UI = {
    // Show notification
    notify(message, type = 'success') {
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.textContent = message;
        document.body.appendChild(notification);

        setTimeout(() => notification.classList.add('show'), 10);
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    },

    // Toggle loading state
    setLoading(element, loading = true) {
        if (loading) {
            element.classList.add('loading');
            element.disabled = true;
        } else {
            element.classList.remove('loading');
            element.disabled = false;
        }
    },

    // Format date
    formatDate(date, format = 'MMM DD, YYYY') {
        const d = new Date(date);
        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        return format
            .replace('YYYY', d.getFullYear())
            .replace('MMM', months[d.getMonth()])
            .replace('DD', String(d.getDate()).padStart(2, '0'));
    },

    // Copy to clipboard
    copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            this.notify('Copied to clipboard!', 'success');
        }).catch(() => {
            this.notify('Failed to copy', 'error');
        });
    },

    // Debounce function
    debounce(func, delay) {
        let timeoutId;
        return function(...args) {
            clearTimeout(timeoutId);
            timeoutId = setTimeout(() => func.apply(this, args), delay);
        };
    }
};
